<?php
// Template Name: Home

get_header();

$post_types = array( 'post', 'event' );

$home_page_primary_features = new WP_Query( array(
	'post_type' => $post_types,
	'category_name' => 'home-page-primary-feature'
) );

$home_page_secondary_features = new WP_Query( array(
	'post_type' => $post_types,
	'category_name' => 'home-page-secondary-feature'
) );

if ( $home_page_primary_features -> have_posts() || $home_page_secondary_features -> have_posts() ) : ?>
    
<div id="featured-section" class="page-section featured-section featured-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-title">Featured</h1>
            </div>
        </div>

    <?php 
    /* 
    Home Page Primary Features
    */
    if ( $home_page_primary_features -> have_posts() ) : 
        while ( $home_page_primary_features -> have_posts() ) : 
            $home_page_primary_features -> the_post();

			get_template_part( 'template-parts/content', 'primary-feature' ); ?>

        <?php 
        endwhile;       
    endif; 
    wp_reset_query();

    /* 
    Home Page Secondary Features
    */
    if ( $home_page_secondary_features -> have_posts() ) : ?>

        <div class="row">

        <?php 
        while ( $home_page_secondary_features -> have_posts() ) : 
            $home_page_secondary_features -> the_post();
                
            if ( get_post_type() === 'event' ) {
                $featured_glyphicon = 'glyphicon-fire';
            } else if ( get_post_type() === 'post' ) {
                $featured_glyphicon = 'glyphicon-text-background';
            } else {
                $featured_glyphicon = 'glyphicon-bullhorn';
            }

            $featured_item_type = get_post_type_object( get_post_type() ); ?>
                
            <section class="homepage-secondary-feature">
                <div class="col-sm-6 col-md-6 col-lg-6">

                    <span class="feature-label">

                        <span class="glyphicon <?php echo $featured_glyphicon; ?>"></span>
                        <?php echo 'Featured ' . $featured_item_type -> labels -> singular_name; ?>
                        
                    </span><!-- .feature-label -->
                    <h2 class="content-title">
                        
                        <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo the_title(); ?></a> 

                    </h2><!-- .content-title -->

            <?php 
            // Post Thumbnail
            if ( has_post_thumbnail() ) : ?>
                
                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="content-image" 
                    style="background-image: url('<?php esc_url( the_post_thumbnail_url() ); ?>');">
                    </a>

            <?php 
            endif; ?>

            <?php 
			if ( get_post_type() === 'event' ) {
				get_template_part( 'template-parts/content' , 'event-details' ); 
			} ?>

            <?php the_content( 'Read more…' ); ?>

                </div><!-- .row -->
            </section>

        <?php endwhile; ?>

        </div><!-- .row -->
        
    <?php 
    endif; 
    wp_reset_query(); ?>

    </div><!-- .container -->
</div><!-- .featured-section -->

<?php endif;?>

<div id="upcoming-events" class="page-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="section-title">Upcoming Events</h1>
			</div>
		</div>

		<?php get_template_part( 'template-parts/content', 'event-listing' ); ?>

	</div>
</div>

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

<!-- <section class="main-content"> -->
	<?php 
	// while ( have_posts() ) : the_post(); ?>

		<!-- <div class="container"> -->
			<?php 
			// the_content(); ?>
		<!-- </div> -->
	
	<?php 
	// endwhile; // end of the loop ?>
<!-- </section> -->

<?php get_footer(); ?>