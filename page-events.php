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
            <div class="col-lg-12">
            	<h3 class="section-subtitle filter-label">Filter Events</h3>

				<?php echo do_shortcode('[searchandfilter id="2131"]'); ?>

        	</div>
        	<div class="col-sm-12"><hr></div>
        </div>

		<!-- <div class="row">
			<div class="col-lg-12">
				<h1 class="section-title">Upcoming Events</h1>
			</div>
		</div> -->
		<main id="main" class="site-main main-index" role="main">

			<?php
			global $wp_query;
			// $today = date( 'yymmdd' );
			$wp_query = new WP_Query( array(
				'post_type' => 'event',
				'paged' => $paged,
				'posts_per_page' => '6',
				'meta_key' => 'event_date', // name of custom field
				'orderby' => 'meta_value_num',
				'search_filter_id' => '2131'
				// 'orderby' => 'post_id', 
				// 'order' => 'ASC',
			) );
			if ( $wp_query -> have_posts() ) :
				while ( $wp_query -> have_posts() ) :
					$wp_query -> the_post();
					$event_ID = get_the_id(); ?>

					<?php if ( $event_ID !== $primary_featured_post ) : ?>
				
						<?php get_template_part( 'template-parts/content', 'event-listing' ); ?>

					<?php endif; ?>

				<?php endwhile; ?>

				<?php 
				the_posts_pagination( array(
				    'mid_size'  => 2,
				    'prev_text' => __( 'Newer', 'textdomain' ),
				    'next_text' => __( 'Older', 'textdomain' ),
				) );

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