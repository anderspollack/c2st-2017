<?php
// Template Name: Home

get_header(); ?>
    
<div id="featured-section" class="page-section featured-section">

    <?php 
    /* 
    Home Page Primary Features
    */
    $primary_featured_post = get_field( 'primary_featured_post' );
    if ( $primary_featured_post ) :
    	global $post;
		$post = $primary_featured_post;
    	setup_postdata( $post );
		get_template_part( 'template-parts/content', 'primary-feature' );
		wp_reset_postdata();
    endif; ?>

	<div class="container">
        <div class="row secondary-features">

        <?php 
        /* 
	    Home Page Secondary Features
	    */
        $secondary_featured_posts = get_field( 'secondary_featured_posts' );
        $secondary_featured_post_1 = $secondary_featured_posts['secondary_featured_post_1'];
        $secondary_featured_post_2 = $secondary_featured_posts['secondary_featured_post_2'];
	    if ( $secondary_featured_post_1 ) :

	    	global $post;
			$post = $secondary_featured_post_1;
	    	setup_postdata( $post );
			get_template_part( 'template-parts/content', 'secondary-feature' );
			wp_reset_postdata();
	    
	    endif;
	    if ( $secondary_featured_post_2 ) :

	    	global $post;
			$post = $secondary_featured_post_2;
	    	setup_postdata( $post );
			get_template_part( 'template-parts/content', 'secondary-feature' );
			wp_reset_postdata();

	    endif; ?>

        </div><!-- .row -->
        <!-- <div class="row"><div class="col-sm-12"><hr></div></div> -->
    </div><!-- .container -->
</div><!-- .featured-section -->

<!-- <div id="upcoming-events" class="page-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="section-title">Upcoming Events</h1>
			</div>
		</div> -->

<?php
// $today = date( 'yymmdd' );
// $upcoming_events = new WP_Query( array(
// 	// 'cat' => '-195,-196',
// 	// 'category__not_in' => array( -195, -196 ),
// 	'post_type' => 'event',
// 	// 'posts_per_page' => get_field( 'upcoming_events_count' ),
// 	'posts_per_page' => get_field( 'upcoming_events_count' ),
// 	'orderby' => 'post_id', 
// 	'order' => 'ASC',
// ) );

// find date time now
$date_now = date('Y-m-d H:i:s');
$time_now = strtotime($date_now);


// find date time in 7 days
$time_next_week = strtotime('+300 day', $time_now);
$date_next_week = date('Y-m-d H:i:s', $time_next_week);

global $post;

$upcoming_events = get_posts( array(
	'posts_per_page'	=> -1,
	'post_type'			=> 'event',
	'meta_query' 		=> array(
		array(
	        'key'			=> 'event_date_time',
	        'compare'		=> 'BETWEEN',
	        'value'			=> array( $date_now, $date_next_week ),
	        'type'			=> 'DATETIME'
	    )
    ),
	'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'event_date_time',
	'meta_type'			=> 'DATETIME'
) );

// if ( $upcoming_events -> have_posts() ) :
// 	while ( $upcoming_events -> have_posts() ) : 
// 		$upcoming_events -> the_post();
// 		$event_ID = get_the_id(); ?>

		<?php 
		// if ( 
		// 	$event_ID !== $primary_featured_post && $event_ID !== $secondary_featured_post_1 && $event_ID !== $secondary_featured_post_2
		// ) : ?>
	
			<?php // get_template_part( 'template-parts/content', 'event-listing' ); ?>

		<?php // endif; ?>

	<?php 
	// endwhile;
// endif; ?>

<?php 
if ( $upcoming_events ) : ?>
	
	<div id="upcoming-events" class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="section-title">Upcoming Events</h1>
				</div>
			</div>

			<?php
			foreach ( $upcoming_events as $post ) : 
				setup_postdata( $post );
				$event_ID = get_the_id();
				if ( 
					$event_ID !== $primary_featured_post && 
					$event_ID !== $secondary_featured_post_1 && 
					$event_ID !== $secondary_featured_post_2 ) : 
					get_template_part( 'template-parts/content', 'event-listing' );
				endif;
			endforeach;
			wp_reset_postdata(); ?>

			<div class="row see-all-events">
				<div class="col-lg-2 col-lg-offset-5">
					<a href="http://c2st.dev/events/" id="see-all-events" class="btn btn-primary"><span class="glyphicon glyphicon-info-sign"></span>See All Events</a>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>

		<!-- <div class="row see-all-events">
			<div class="col-lg-2 col-lg-offset-5">
				<a href="http://c2st.dev/events/" id="see-all-events" class="btn btn-primary"><span class="glyphicon glyphicon-info-sign"></span>See All Events</a>
			</div>
		</div>
	</div>
</div> -->

<!-- <section id="supporters">
	<div class="container">
		<h1 class="section-title">C2ST Supporters</h1> -->
		
		<!-- The Slideshow with the kitties that seems to be working somewhat -->
		<!-- <div class="CSS_slideshow"
		data-show-indicators="true"
		data-indicators-position="in"
		data-show-buttons="true"
		data-show-wrap-buttons="true"
		data-animation-style="slide"
		style="-moz-transition-duration: 0.3s; -webkit-transition-duration: 0.3s; transition-duration: 0.3s;">
			<div class="CSS_slideshow_wrapper">
				<input type="radio" name="css3slideshow" id="slide1" checked />
				<label for="slide1"><img src="https://placekitten.com/g/602/400" /></label>
				<input type="radio" name="css3slideshow" id="slide2" />
				<label for="slide2"><img src="https://placekitten.com/g/605/400" /></label>
				<input type="radio" name="css3slideshow" id="slide3" />
				<label for="slide3"><img src="https://placekitten.com/g/600/400" /></label>
				<input type="radio" name="css3slideshow" id="slide4" />
				<label for="slide4"><img src="https://placekitten.com/g/603/400" /></label>
				<input type="radio" name="css3slideshow" id="slide5" />
				<label for="slide5"><img src="https://placekitten.com/g/604/400" /></label> 
			</div>
		</div> -->

		<!-- first from here: https://stackoverflow.com/questions/30295085/how-can-i-make-an-image-carousel-with-only-css -->
		<!--<div class="wrap">
			<div class="wrap2">
				<div class="group">
					<input type="radio" name="test" id="0" value="0" checked>
					<label for="4" class="previous">
						<span class="glyphicon glyphicon-chevron-left"></span></label>
					<label for="1" class="next">
						<span class="glyphicon glyphicon-chevron-right"></span></label>
					<div class="content">
						<p>panel #0</p>
						<img src="http://i.stack.imgur.com/R5yzx.jpg" alt="" width="200" height="286">
					</div>
				</div>
				<div class="group">
					<input type="radio" name="test" id="1" value="1">
					<label for="0" class="previous">
						<span class="glyphicon glyphicon-chevron-left"></span></label>
					<label for="2" class="next">
						<span class="glyphicon glyphicon-chevron-right"></span></label>
					<div class="content">
						<p>panel #1</p>
						<img src="http://i.stack.imgur.com/k0Hsd.jpg" alt="" width="200" height="286">
					</div>
				</div>
				<div class="group">
					<input type="radio" name="test" id="2" value="2">
					<label for="1" class="previous">
						<span class="glyphicon glyphicon-chevron-left"></span></label>
					<label for="3" class="next">
						<span class="glyphicon glyphicon-chevron-right"></span></label>
					<div class="content">
						<p>panel #2</p>
						<img src="http://i.stack.imgur.com/Hhl9H.jpg" alt="" width="200" height="286">
					</div>
				</div>
				<div class="group">
					<input type="radio" name="test" id="3" value="3">
					<label for="2" class="previous">
						<span class="glyphicon glyphicon-chevron-left"></span></label>
					<label for="4" class="next">
						<span class="glyphicon glyphicon-chevron-right"></span></label>
					<div class="content">
						<p>panel #3</p>
						<img src="http://i.stack.imgur.com/r1AyN.jpg" alt="" width="200" height="286">
					</div>
				</div>
				<div class="group">
					<input type="radio" name="test" id="4" value="4">
					<label for="3" class="previous">
						<span class="glyphicon glyphicon-chevron-left"></span></label>
					<label for="0" class="next">
						<span class="glyphicon glyphicon-chevron-right"></span></label>
					<div class="content">
						<p>panel #4</p>
						<img src="http://i.stack.imgur.com/EHHsa.jpg" alt="" width="200" height="286">
					</div>
				</div>
			</div>
		</div>-->

		<!-- original nonfunctional bootstrap attempt: -->
		<!--<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
				<a href="#" class="previous-supporters"><span class="glyphicon glyphicon-chevron-left"></span></a>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
				<a href="#" class="supporter" style="background-image: url(./wp-content/themes/c2st-2017/img/test-images/horizon-pharma.jpg);"></a>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<a href="#" class="supporter" style="background-image: url(./wp-content/themes/c2st-2017/img/test-images/argonne.jpg);"></a>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<a href="#" class="supporter" style="background-image: url(./wp-content/themes/c2st-2017/img/test-images/adler.jpg);"></a>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<a href="#" class="supporter" style="background-image: url(./wp-content/themes/c2st-2017/img/test-images/field-museum.jpg);"></a>
			</div>
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
				<a href="#" class="next-supporters"><span class="glyphicon glyphicon-chevron-right"></span></a>				
			</div>
		</div>-->

	<!-- </div>
</section> -->

<?php get_footer(); ?>