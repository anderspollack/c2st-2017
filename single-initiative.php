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

                        get_template_part( 'template-parts/content' );

                        // If comments are open or we have at least one comment, load up the comment template.

                        // if ( comments_open() || get_comments_number() ) :
                        //     comments_template();
                        // endif;                        

                    endwhile; // End of the loop.
                    ?>

                </div><!-- .row -->
                
                <?php 
                global $post;
                $linked_posts = get_field('linked_posts');
                $count = 0;

                if ($linked_posts): ?>

                    <div class="row">
                    
                        <div class="col-sm-12">
                            <hr>
                            <h2 class="section-title"><?php echo get_field('related_content_section_title'); ?></h3>
                        </div>

                    </div><!-- .row -->

                    <?php 
                    foreach (array_reverse($linked_posts) as $post):
                        setup_postdata($post);
                        if ( $count % 2 === 0 ) { echo '<div class="row">'; }
                        get_template_part( 'template-parts/content', 'library' );
                        if ( $count % 2 === 1 ) { echo '</div><!-- .row -->'; }
                        $count++;
                    endforeach;
                    wp_reset_postdata();
                endif;
                ?>

            </div><!-- .container -->
        </main><!-- #main -->
    </div><!-- #primary -->
</article>
<?php
// get_sidebar();
get_footer();
