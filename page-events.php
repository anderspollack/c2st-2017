<?php
// Template Name: Events

// include JQuery datepicker in template
wp_enqueue_script('jquery');
wp_enqueue_script('jquery-ui-core');
wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css');

get_header(); ?>

<section id="featured-section" class="featured-section event-features">
	<div class="container">
		<h1 class="page-title">Featured</h1>

		<?php 
		$events_page_features = new WP_Query( array(
			'post_type' => array( 'post', 'event' ),
			'category_name' => 'featured-on-events-page'
		) );
		if ( $events_page_features -> have_posts() ) : while ( $events_page_features -> have_posts() ) : 
			$events_page_features -> the_post();
			$featured_glyphicon = get_field('featured_glyphicon');
			$featured_item_type = get_field('featured_item_type');
			$event_date = get_field('event_date', false, false);
			$event_date = new DateTime( $event_date ); ?>

			<p class="feature-label">
				<span class="glyphicon <?php echo $featured_glyphicon; ?>"></span> Featured <?php echo $featured_item_type; ?>
			</p>
			<h2 class="content-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo the_title(); ?></a></h2>
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-6">
					<?php 
					if ( has_post_thumbnail() ): ?>
						<a href="<?php echo esc_url( get_permalink() ); ?>" class="content-image" style="background-image: url(<?php echo esc_url( the_post_thumbnail_url() ); ?>);"></a>
					<?php endif; ?>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6">
					<p class="content-subtitle event-date">
						<?php 
						if ( get_field( 'event_date' ) ) :
							echo $event_date -> format( 'l, F j, Y' );
						else: echo 'Date TBD';
						endif; ?>
					</p>
					<?php if ( get_field( 'start_time' ) ) : ?>
						<p class="content-subtitle event-time">
						<?php 
						the_field( 'start_time' );
						if ( get_field( 'end_time' ) ): 
							echo' – ' .  the_field( 'end_time' );
						endif; ?>
						</p>
					<?php endif; ?>
					<?php if ( get_field( 'event_location_address' ) ) : ?>
						<p class="content-subtitle event-address">
							<?php the_field( 'event_location_address' ); ?>
						</p>
					<?php endif; ?>
					<?php if ( get_field( 'program_series' ) ) : ?>
						<p class="program-series"><a href="#">
							<?php the_field( 'program_series' ) ?>
						</a></p>
					<?php endif; ?>
					<p class="content-excerpt"><?php the_content( 'Read more…' ); ?></p>
				</div>
			</div>

		<?php endwhile; endif; wp_reset_query(); ?>

	</div>
</section>

<section class="filters">
	<div class="container">
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
</section>

<section id="upcoming-events">
	<div class="container">
		<h1 class="section-title">Recent &amp; Upcoming Events</h1>

		<?php get_template_part( 'template-parts/content', 'upcoming-events' ); ?>

	</div>
</section>

<?php get_footer(); ?>