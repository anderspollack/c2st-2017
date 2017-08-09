<?php
$today = date( 'yymmdd' );
$other_events = new WP_Query( array(
	// 'cat' => '-195,-196',
	'category__not_in' => array( -195, -196 ),
	'post_type' => 'event',
	'posts_per_page' => get_field( 'upcoming_events_count' ),
	'orderby' => 'post_id', 
	'order' => 'ASC',
) );
if ( $other_events -> have_posts() ) :
	while ( $other_events -> have_posts() ) :
		$other_events -> the_post(); ?>

<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12">

		<h2 class="content-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title() ?></a></h2>

	</div>
</div>
<div class="row">
	<div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">

		<?php 
		if ( has_post_thumbnail() ): ?>

		<a href="<?php echo esc_url( get_permalink() ); ?>" class="content-image" style="background-image: url(<?php echo esc_url( the_post_thumbnail_url() ); ?>);"></a>

		<?php endif; ?>
		
	</div>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

		<?php get_template_part( 'template-parts/content' , 'event-details' ); ?>

	</div>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 content-excerpt">

		<?php the_content( 'Read more…' ); ?>

	</div>
</div><!-- .row -->

	<?php 
	endwhile; 
endif; 
wp_reset_query(); ?>

<div class="row">
	<div class="col-xs-8 col-sm-4 col-sm-offset-4">
		<a href="http://c2st.dev/events/" id="see-all-events" class="btn btn-primary"><span class="glyphicon glyphicon-info-sign"></span>See All Events</a>
	</div>
</div>