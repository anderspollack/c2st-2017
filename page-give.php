<?php
/*
 * Template Name: Give Now
 */

get_header();
$page_title = get_the_title(); ?>

<?php 
/* 
   Give Page Primary Features
 */
$primary_featured_post = get_field( 'primary_featured_post' );
if ( $primary_featured_post ) : ?>

    <?php
    global $post;
    $post = $primary_featured_post;
    setup_postdata( $post );
    // get_template_part( 'template-parts/content', 'primary-feature' );
    // wp_reset_postdata(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main give-now" role="main">
            <div class="page-section">
                <div class="container">

                    <h1 class="entry-title"><?php echo $page_title; ?></h1>

                    <?php
                    echo do_shortcode( '[give_form id="' . $post . '"]' ); ?>

                </div><!-- .container -->
            </div><!-- .page-section -->
        </main><!-- #main -->
    </div><!-- #primary -->

<?php endif; ?>

<!-- <script type="text/javascript">
     // adds column break CSS to the parent 'p' of 'span.column-break'
     // jQuery(".column-break").parents('p').css("break-after", "column");
     </script> -->

<?php
// get_sidebar();
get_footer(); ?>
