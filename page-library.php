<?php
/*
 * Template Name: Library
 */

// include JQuery datepicker in template
wp_enqueue_script('jquery');
wp_enqueue_script('jquery-ui-core');
wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css');

get_header(); ?>

<?php 
/* 
Library Page Primary Features
*/
$primary_featured_post = get_field( 'primary_featured_post' );
if ( $primary_featured_post ) : ?>

    <div id="static-page-featured-section" class="page-section featured-section">

    <?php
    global $post;
    $post = $primary_featured_post;
    setup_postdata( $post );
    get_template_part( 'template-parts/content', 'primary-feature' );
    wp_reset_postdata(); ?>

    </div>

<?php endif; ?>

<div class="page-section events-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <header class="entry-header">
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </header><!-- .entry-header -->
            </div>
            <!-- <div class="col-sm-12"><hr></div> -->
        </div>

		<h1 class="section-title">Filter Media</h1>

		<?php echo do_shortcode('[searchandfilter fields="search" submit_label="Filter" post_types="post"]'); ?>

	</div>
</div>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="page-section posts">
            <div class="container">
                <div class="row">

	                <?php
					// $today = date( 'yymmdd' );
					$other_posts = new WP_Query( array(
						// 'cat' => '-195,-196',
						// 'category__not_in' => array( -195, -196 ),
						'post_type' => 'post',
						// 'posts_per_page' => get_field( 'upcoming_events_count' ),
						// 'posts_per_page' => get_field( 'upcoming_events_count' ),
						'orderby' => 'post_id', 
						'order' => 'DSC',
					) );

					if ( $other_posts -> have_posts() ) :
						while ( $other_posts -> have_posts() ) : 
							$other_posts -> the_post(); ?>
						
							<?php get_template_part( 'template-parts/content', 'library' ); ?>


						<?php 
						endwhile;
					endif; ?>

				</div><!-- .row -->
			</div><!-- .container -->
        </div><!-- .page-section -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();