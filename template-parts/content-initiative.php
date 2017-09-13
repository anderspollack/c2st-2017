<?php
/**
* Template part for displaying posts
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package C2ST_2017
*/

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="col-sm-12">

			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) : ?>

				<div class="entry-meta">

					<?php c2st_2017_posted_on(); ?>

				</div><!-- .entry-meta -->

			<?php
			endif; ?>

		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<div class="col-sm-6">

			<?php 
		    // Post Thumbnail
		    if ( has_post_thumbnail() && 'Video' !== get_field( 'content_type' ) ) : ?>
	        
		        <a href="<?php echo esc_url( get_permalink() ); ?>" class="content-image" 
		        style="background-image: url('<?php esc_url( the_post_thumbnail_url() ); ?>');">
		        </a>

		    <?php endif; ?>

		</div>
		<div class="col-sm-6">		

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
			) ); ?>

			<?php 
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'c2st-2017' ),
				'after'  => '</div>',
			) ); ?>

		</div>
	</div><!-- .entry-content -->

	<?php
    // check if the repeater field has rows of data
    if( have_rows( 'related_content' ) ) : ?>

    	<div class="col-sm-12"><hr></div>

    	<?php while ( have_rows( 'related_content' ) ) : the_row(); ?>
	    		
	    		<?php 
	    		// global $post;
	    		$related_post = get_sub_field( 'related_post' );
	    		if ( $related_post ) :

	    			$post = $related_post;
	    			setup_postdata( $post );
		    		get_template_part( 'template-parts/content', 'library' );
		    		wp_reset_postdata();

	    		endif; ?>

		<?php endwhile;
	endif; ?>

	<!-- </div> --><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->