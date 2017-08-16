<?php
// Template Name: Events

// include JQuery datepicker in template
wp_enqueue_script('jquery');
wp_enqueue_script('jquery-ui-core');
wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css');

get_header(); ?>

<div class="page-section events-heading">
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
 * Events Page Primary Features
 */
$post_types = array( 'post', 'event' );

$featured_on_events_page = new WP_Query( array(
	'post_type' => $post_types,
	'category_name' => 'featured-on-events-page'
) );

if ( $featured_on_events_page -> have_posts() ) : 
    while ( $featured_on_events_page -> have_posts() ) : 
        $featured_on_events_page -> the_post();

        get_template_part( 'template-parts/content', 'primary-feature' );

    endwhile;
endif;
wp_reset_query(); ?>

		<h1 class="section-title">Filter Events</h1>

		<?php echo do_shortcode('[searchandfilter fields="search,program_series,event_types" submit_label="Filter" post_types="event"]'); ?>

	</div>
</div>

<div id="events-list" class="page-section">
	<div class="container">
		<!-- <div class="row">
			<div class="col-lg-12">
				<h1 class="section-title">Upcoming Events</h1>
			</div>
		</div> -->

<?php
$today = date( 'yymmdd' );
$events = new WP_Query( array(
	// 'cat' => '-197',
	'category__not_in' => array( '-197' ),
	'post_type' => 'event',
	// 'posts_per_page' => '10',
	// 'orderby' => 'post_id', 
	// 'order' => 'ASC',
) );
if ( $events -> have_posts() ) :
	while ( $events -> have_posts() ) :
		$events -> the_post(); ?>
		
		<?php get_template_part( 'template-parts/content', 'event-listing' ); ?>

	<?php endwhile;
endif; ?>

<?php get_footer(); ?>