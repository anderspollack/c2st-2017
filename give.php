<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package C2ST_2017
 */

// get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
				<div class="row give-row">

					<?php
					// do_action( 'give_before_main_content' );

					while ( have_posts() ) : the_post();

						// get_template_part( 'template-parts/content', get_post_type() );
						give_get_template_part( 'single-give-form/content', 'single-give-form' );

						// Previous and Next Links for Posts
						// the_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						/*
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						*/

					endwhile; // End of the loop.

					// do_action( 'give_after_main_content' );
					?>

				</div><!-- .row -->
			</div><!-- .container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
