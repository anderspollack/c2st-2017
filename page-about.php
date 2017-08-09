<?php
/*
 * Template Name: About
 */
get_header();

$post_types = array( 'post', 'event' );

$featured_on_about_page = new WP_Query( array(
	'post_type' => $post_types,
	'category_name' => 'featured-on-about-page'
) ); ?>

<div id="featured-section" class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <header class="entry-header">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->
            </div>
        </div>

<?php 
/* 
 * About Page Primary Features
 */
if ( $featured_on_about_page -> have_posts() ) : 
    while ( $featured_on_about_page -> have_posts() ) : 
        $featured_on_about_page -> the_post();

        get_template_part( 'template-parts/content', 'primary-feature' );

    endwhile;
endif; 
wp_reset_query(); ?>

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

<?php
while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div id="about" class="page-section">
                        <div class="entry-content">
                            <div class="row">
                                <div class="col-sm-8">

    <?php
    the_content();
    wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'c2st-2017' ),
        'after'  => '</div>',
    ) ); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2>Board of Directors</h2>
                                </div>
                                <div class="col-sm-12 board">

    <?php the_field( 'board_of_directors' ); ?>

                                </div>
                                <div class="col-sm-12">
                                    <h2>Auxiliary Board</h2>
                                </div>
                                <div class="col-sm-12 board">

    <?php the_field( 'auxiliary_board' ); ?>

                                </div>
                            </div>
                        </div><!-- .entry-content -->
                    </div>

    <?php if ( get_edit_post_link() ) : ?>

                    <footer class="entry-footer">
                        
        <?php
        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Edit <span class="screen-reader-text">%s</span>', 'c2st-2017' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        ); ?>

                    </footer><!-- .entry-footer -->

    <?php endif; ?>

                </article><!-- #post-<?php the_ID(); ?> -->
    
    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();

    endif;

endwhile; // End of the loop. ?>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .container -->
</div><!-- .page-section -->

<?php
// get_sidebar();
get_footer(); ?>