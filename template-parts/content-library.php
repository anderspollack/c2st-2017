<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package C2ST_2017
 */

?>
<div class="col-sm-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php
			// if ( is_singular() ) :
				// the_title( '<h1 class="entry-title">', '</h1>' );
			// else :
				the_title( '<h3 class="content-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			// endif;

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php c2st_2017_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

<?php if ( has_post_thumbnail() ): ?>

		<a href="<?php echo esc_url( get_permalink() ); ?>" class="content-image" style="background-image: url(<?php echo esc_url( the_post_thumbnail_url() ); ?>);"></a>

<?php endif; ?>

		<!-- <div class="entry-content"> -->
			<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'c2st-2017' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				// wp_link_pages( array(
				// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'c2st-2017' ),
				// 	'after'  => '</div>',
				// ) );
			?>
		<!-- </div> --><!-- .entry-content -->

		<!-- <footer class="entry-footer">
			<?php 
			// c2st_2017_entry_footer(); ?>
		</footer>--><!-- .entry-footer -->
	</article><!-- #post-<?php the_ID(); ?> -->
</div>