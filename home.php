<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package C2ST_2017
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
$primary_featured_post = get_field( 'primary_featured_post', get_option('page_for_posts') );
if ( $primary_featured_post ) : ?>

    <!-- <div id="featured-section" class="page-section featured-section"> -->

    <?php
    global $post;
    $post = $primary_featured_post;
    setup_postdata( $post );
    get_template_part( 'template-parts/content', 'primary-feature' );
    wp_reset_postdata(); ?>

    <!-- </div> -->

<?php endif; ?>

<div class="page-section events-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <header class="entry-header">
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </header><!-- .entry-header -->
            </div>
        </div>

		<h3 class="section-subtitle filter-label">Filter Media</h3>

		<?php echo do_shortcode('[searchandfilter fields="search" submit_label="Filter" post_types="post"]'); ?>

		<div class="row"><div class="col-sm-12"><hr></div></div>

		<main id="main" class="site-main main-index" role="main">
            <div class="row">

				<?php 
				// $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				// $args = array(
				//   'posts_per_page' => 3,
				//   'paged'          => $paged
				// ); ?>

				<?php
				while ( have_posts() ) : 
					// $posts -> the_post();
					the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'library' );

				endwhile; ?>

				<div class="col-sm-12">

					<?php the_posts_pagination( array(
					    'mid_size'  => 2,
					    'prev_text' => __( 'Newer', 'textdomain' ),
					    'next_text' => __( 'Older', 'textdomain' ),
					) ); ?>

				</div>
			</div><!-- .row -->
		</main><!-- #main -->
	</div><!-- .container -->
</div><!-- .page-section -->

<?php
// get_sidebar();
get_footer();