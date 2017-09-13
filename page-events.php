<?php
// Template Name: Events

// include JQuery datepicker in template
wp_enqueue_script('jquery');
wp_enqueue_script('jquery-ui-core');
wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css');

get_header(); ?>

<?php 
/* 
Events Page Primary Features
*/
$primary_featured_post = get_field( 'primary_featured_post' );
if ( $primary_featured_post ) : ?>

    <?php
    global $post;
    $post = $primary_featured_post;
    setup_postdata( $post );
    get_template_part( 'template-parts/content', 'primary-feature' );
    wp_reset_postdata(); ?>

<?php endif; ?>

<div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <header class="entry-header">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->
            </div>
        </div>

		<h3 class="section-subtitle filter-label">Filter Events</h3>

		<?php echo do_shortcode('[searchandfilter fields="search,program_series,event_types" submit_label="Filter" post_types="event"]'); ?>

        <div class="row"><div class="col-sm-12"><hr></div></div>

		<!-- <div class="row">
			<div class="col-lg-12">
				<h1 class="section-title">Upcoming Events</h1>
			</div>
		</div> -->
		<main id="main" class="site-main main-index" role="main">

			<?php
			$today = date( 'yymmdd' );
			$events = new WP_Query( array(
				// 'cat' => '-197',
				// 'category__not_in' => array( '-197' ),
				'post_type' => 'event',
				'paged' => $paged,
				// 'posts_per_page' => '10',
				// 'orderby' => 'post_id', 
				// 'order' => 'ASC',
			) );
			if ( $events -> have_posts() ) :
				while ( $events -> have_posts() ) :
					$events -> the_post();
					$event_ID = get_the_id(); ?>

					<?php if ( $event_ID !== $primary_featured_post ) : ?>
				
						<?php get_template_part( 'template-parts/content', 'event-listing' ); ?>

					<?php endif; ?>

				<?php endwhile; ?>
				
				<?php
				the_posts_navigation();

				// global $wp_query;

				// $big = 999999999; // need an unlikely integer

				// echo paginate_links( array(
				// 	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				// 	'format' => '?paged=%#%',
				// 	'current' => max( 1, get_query_var('paged') ),
				// 	'total' => $wp_query->max_num_pages
				// ) );
				?>

			<?php endif; ?>

		</main><!-- .site-main -->
	</div><!-- .container -->
</div><!-- .page-section -->

	<?php get_footer(); ?>