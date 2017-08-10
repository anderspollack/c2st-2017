<?php
// Template Name: Events

// include JQuery datepicker in template
wp_enqueue_script('jquery');
wp_enqueue_script('jquery-ui-core');
wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css');

$post_types = array( 'post', 'event' );

$featured_on_events_page = new WP_Query( array(
	'post_type' => $post_types,
	'category_name' => 'featured-on-events-page'
) );

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
if ( $featured_on_events_page -> have_posts() ) : 
    while ( $featured_on_events_page -> have_posts() ) : 
        $featured_on_events_page -> the_post();

        get_template_part( 'template-parts/content', 'primary-feature' );

    endwhile;
endif;
wp_reset_query(); ?>

		<h1 class="section-title">Filter Events</h1>

		<form action="">
			<div class="row">
				<div class="col-sm-4 col-md-4 col-lg-4 form-group">
					<label for="search" class="sr-only">Search</label>
					<input type="text" class="form-control" id="search" placeholder="Search&#8230;">
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4 form-group">
					<label for="search" class="sr-only">Program Series</label>
					<select class="form-control" id="program-series">
						<option selected="selected">Filter by Program Series&#8230;</option>
						<?php 
						$program_series = get_terms( array( 
							'taxonomy' => 'program_series',
							'hide_empty' => false,
						 ) );

						if ( ! empty( $program_series ) && ! is_wp_error( $program_series ) ) {
							foreach ( $program_series as $series ) {
								echo '<option>' . $series -> name . '</option>';
							}
						} ?>
					</select>
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4 form-group">
					<label for="search" class="sr-only">Event Type</label>
					<select class="form-control" id="event-type">
						<option selected="selected">Filter by Event Type&#8230;</option>
						<?php 
						$event_types = get_terms( array( 
							'taxonomy' => 'event_types',
							'hide_empty' => false,
						 ) );

						if ( ! empty( $event_types ) && ! is_wp_error( $event_types ) ) {
							foreach ( $event_types as $event_type ) {
									echo '<option>' . $event_type -> name . '</option>';
							}
						} ?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-3 col-sm-1 col-md-1 col-lg-1">
					<label for="search" class="control-label custom-form-group">From:</label>
				</div>
				<div class="col-xs-9 col-sm-3 col-md-3 col-lg-3">
					<!-- When HTML5 datepickers are implemented natively in all major browsers, remove JQuery UI datepicker, and replace input type="text" with type="date" -->
					<input type="text" class="form-control custom-form-group date" id="from-date" placeholder="From Date">
				</div>
				<div class="col-xs-3 col-sm-1 col-md-1 col-lg-1">
					<label for="search" class="control-label custom-form-group">To:</label>
				</div>
				<div class="col-xs-9 col-sm-3 col-md-3 col-lg-3">
					<!-- See above -->
					<input type="text" class="form-control custom-form-group date" id="to-date" placeholder="To Date">
				</div>
				<div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 col-xs-offset-3 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
					<button class="btn btn-primary form-control custom-form-group" id="filter-button">Filter</button>
				</div>
			</div>
		</form>

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