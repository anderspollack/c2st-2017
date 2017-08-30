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

		<?php 
	    // Post Thumbnail
	    if ( has_post_thumbnail() &&  'Video' !== get_field( 'content_type' ) ) : ?>
	    
		    <a href="<?php echo esc_url( get_permalink() ); ?>" class="content-image" 
		    style="background-image: url('<?php esc_url( the_post_thumbnail_url() ); ?>');">
		    </a>

    	<?php 
    	// Embedded Video Player
    	elseif ( 'Video' === get_field( 'content_type' ) ) : 
	    	$video_url = get_field( 'youtube_video_url' );
	    	$code_pos = strrpos( $video_url, 'watch?v=' );
	    	$embed_video_url = substr_replace( $video_url, 'embed/', $code_pos, 8 )
    	 ?>

		    <div class="video-container">

		    	<iframe class="video" src="<?php echo $embed_video_url; ?>" frameborder="0" allowfullscreen></iframe>

		    </div>

	    <?php 
	    endif; ?>

    	<?php if ( get_field( 'author' ) ) : ?>

    		<p class="bold">By <?php the_field( 'author' ); ?></p>

    	<?php endif; ?>

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
		
	</article><!-- #post-<?php the_ID(); ?> -->
</div>