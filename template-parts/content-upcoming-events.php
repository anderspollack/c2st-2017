<?php
$today = date( 'yymmdd' );
$other_events = new WP_Query( array(
	// 'cat' => '-195,-196',
	'category__not_in' => array( -195, -196 ),
	'post_type' => 'event',
	'posts_per_page' => get_field( 'upcoming_events_count' ),
	'orderby' => 'post_id', 
	'order' => 'ASC',
	/*
	'meta_query' => array(
		array(
			'key' => 'start_date',
			'compare' => '<=',
			'value' => $today,
		),
		array(
			'key' => 'start_date',
			'compare' => '>=',
			'value' => $today,
		),
	),
	*/
) );
if ( $other_events -> have_posts() ) :
	$event_date = get_field('event_date', false, false);
	$event_date = new DateTime( $event_date );
	while ( $other_events -> have_posts() ) :
		$other_events -> the_post(); ?>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h2 class="content-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title() ?></a></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<?php 
				if ( has_post_thumbnail() ): ?>
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="content-image" style="background-image: url(<?php echo esc_url( the_post_thumbnail_url() ); ?>);"></a>
				<?php endif; ?>
			</div>
			<div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">
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
				<p class="content-subtitle event-location">
					<?php 
					if ( get_field( 'event_location_address' ) ): 
						the_field( 'event_location_name' );
					else: echo 'Location TBD';
					endif; ?>
				</p>
				<?php if ( get_field( 'event_location_address' ) ) : ?>
					<p class="content-subtitle event-address">
						<?php 
						$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
						$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
						$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android"); 
						if ( $iPad || $iPhone ): ?>
							<a href="http://maps.apple.com/?q=<?php the_field( 'event_location_address' ); ?>" target="_blank"><?php the_field( 'event_location_address' ); ?></a>
						<?php 
						else: ?>
							<a href="#" target="_blank"><?php the_field( 'event_location_address' ); ?></a>
						<?php endif; ?>
					</p>
				<?php endif; ?>
				<?php if ( get_field( 'program_series' ) ) : ?>
					<p class="program-series"><a href="#">
						<?php the_field( 'program_series' ) ?>
					</a></p>
				<?php endif; ?>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 content-excerpt">
				<?php the_content( 'Read more…' ); ?>
			</div>
		</div>
<?php endwhile; endif; wp_reset_query(); ?>
<div class="row">
	<div class="col-xs-4 col-xs-offset-4">
		<a href="http://c2st.dev/events/" id="see-all-events" class="btn btn-primary"><span class="glyphicon glyphicon-info-sign"></span>See All Events</a>
	</div>
</div>