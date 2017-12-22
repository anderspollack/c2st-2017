<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package C2ST_2017
 */

get_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="container">
                <div class="row">

                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', get_post_format() );

                        // Previous and Next Links for Posts
                        // the_post_navigation();

                        // If comments are open or we have at least one comment, load up the comment template.
                        /*
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                        */

                    endwhile; // End of the loop.
                    ?>

                </div><!-- .row -->
                
                <?php
                $counter = 0;
                // check if the repeater field has rows of data
                if( have_rows('related_content') ): ?>

                    <div class="row">
                    
                        <div class="col-sm-12">
                            <hr>
                            <h2 class="section-title">Related Content</h3>
                        </div>

                    </div><!-- .row -->

                    <?php
                    // loop through the rows of data
                    while ( have_rows('related_content') ) : 
                        the_row();

                        if ( $counter % 2 === 0 ) { echo '<div class="row">'; }
                            global $post;
                            $post = get_sub_field('related_post');
                            setup_postdata( get_sub_field('related_post') );
                            get_template_part( 'template-parts/content', 'library' );
                            wp_reset_postdata();
                        if ( $counter % 2 === 1 ) { echo '</div><!-- .row -->'; }

                        $counter++;

                    endwhile;
                    if ( $counter % 2 === 0 ) { echo '</div><!-- .row -->'; }
                endif; ?>

            </div><!-- .container -->
        </main><!-- #main -->
    </div><!-- #primary -->
</article>
<?php
// get_sidebar();
get_footer();
