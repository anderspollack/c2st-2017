<?php
/**
 * The template for displaying all single events
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package C2ST_2017
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();
            $address = get_field( 'address' );
            if( !empty( $address ) ):
				// echo '<span class="address">' . $address . '</span>';  ?>
				<!-- <div class="acf-map">
					<div class="marker" data-lat="<?php 
					// echo $address['lat']; ?>" data-lng="<?php 
					// echo $address['lng']; ?>"></div>
				</div> -->
            <?php 
			endif;

			

			get_template_part( 'template-parts/content', 'event' );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();