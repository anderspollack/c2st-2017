<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package C2ST_2017
 */

get_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
				<div class="row">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'initiative' );

						// Previous and Next Links for Posts
						// the_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						/*
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						*/

					endwhile; // End of the loop.
					?>

				</div><!-- .row -->
			</div><!-- .container -->
		</main><!-- #main -->
	</div><!-- #primary -->
</article>
<?php
// get_sidebar();
get_footer();
