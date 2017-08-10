<?php
/*
 * Template Name: About
 */

$post_types = array( 'post', 'event' );

$featured_on_about_page = new WP_Query( array(
	'post_type' => $post_types,
	'category_name' => 'featured-on-about-page'
) );

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="page-section">
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

        

<?php
while ( have_posts() ) : the_post(); ?>

                <!-- <article id="post-<?php //the_ID(); ?>" <?php //post_class(); ?>> -->

                <div class="entry-content">
                    <div class="row">
                        <div class="col-sm-8 col-lg-6">
                            <h2 class="section-title">Mission</h2>

    <?php
    the_content();

    wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'c2st-2017' ),
        'after'  => '</div>',
    ) ); ?>

                        </div>
                    </div><!-- .row -->
                </div><!-- .entry-content -->
            </div><!-- .container -->
        </div><!-- .page-section -->
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="section-title">Board of Directors</h2>
                        <section class="columns">

    <?php the_field( 'board_of_directors' ); ?>

                        </section>
                        <h2 class="section-title">Auxiliary Board</h2>
                        <section class="columns">

    <?php the_field( 'auxiliary_board' ); ?>

                        </section>
                        <section class="columns c2st-collaborators">

    <?php the_field( 'c2st_collaborators' ); ?>

                        </section>
                        <h2 class="section-title">C2ST Staff</h2>
                        <section class="columns">

    <?php the_field( 'c2st_staff' ); ?>

                        </section>
                    </div>
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

                <!-- </article> --><!-- #post-<?php //the_ID(); ?> -->
    
    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();

    endif;

endwhile; // End of the loop. ?>

            </div><!-- .container -->
        </div><!-- .page-section -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php
// get_sidebar();
get_footer(); ?>