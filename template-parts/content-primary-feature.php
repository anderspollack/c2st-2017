<?php 
$featured_item_type = 'Post';
if ( 'post' === get_post_type() ) {
    $terms = get_the_terms($post, 'content_type');
    foreach ($terms as $term) {
       $content_type = $term; 
    }
    if ('blog-post' === $content_type->slug) { $featured_glyphicon = 'glyphicon-text-background'; } 
    else if ('video' === $content_type->slug) { $featured_glyphicon = 'glyphicon-film'; }
    else if ('press-release' === $content_type->slug) { $featured_glyphicon = 'glyphicon-file'; }
    else if ('c2st-in-the-news' === $content_type->slug) { $featured_glyphicon = 'glyphicon-paperclip'; }
    else { $featured_glyphicon = 'glyphicon-star'; }
    $featured_item_type = $content_type->name;
} else if ( 'event' === get_post_type() ) {
    $featured_glyphicon = 'glyphicon-fire';
    $featured_item_type = get_post_type_object( get_post_type() ) -> labels -> singular_name;
} else if ( 'initiative' === get_post_type() ) {
    $featured_glyphicon = 'glyphicon-bullhorn';
    $featured_item_type = get_post_type_object( get_post_type() ) -> labels -> singular_name;
} else if ( 'give_forms' === get_post_type() ) {
    $featured_glyphicon = 'glyphicon-bullhorn';
    // $featured_item_type = get_post_type_object( get_post_type() ) -> labels -> singular_name;
    $featured_item_type = 'Donation Initiative';
}

$is_youtube_video = false;
?>

<section class="primary-feature">
    <div class="container" data-type="foreground" data-speed="12">
        <div class="row">
            <div class="col-sm-12">

                <?php echo '<span class="feature-label"><span class="glyphicon ' . $featured_glyphicon . '"></span>Featured ' . $featured_item_type . '</span>'; ?>

                <h2 class="content-title">
                    
                    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo the_title(); ?></a> 

                </h2><!-- .content-title -->
            </div>
        </div>
        <div class="row">

            <?php 
	    if (get_field('content_type_taxonomy')):
                if ('Video' === get_field( 'content_type_taxonomy') -> name): 
                    if (get_field('youtube_video_url')): 
                      $is_youtube_video = true;
                      $video_url = get_field( 'youtube_video_url' );
                      $code_pos = strrpos( $video_url, 'watch?v=' );
                      $embed_video_url = substr_replace( $video_url, 'embed/', $code_pos, 8 ); ?>

                        <div class="col-sm-6">
                            <div class="video-container">
                                <iframe class="video" src="<?php echo $embed_video_url; ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div><!-- .col- -->

                    <?php
                    endif; ?>

                <?php 
                // Post Thumbnail for non-Video posts
                elseif (has_post_thumbnail()): ?>

                        <div class="col-sm-6">
			    <a href="<?php echo esc_url( the_post_thumbnail_url() ); ?>" class="primary-featured-image">
			        <img src="<?php echo esc_url( the_post_thumbnail_url() ); ?>">
			    </a>
                        </div><!-- .col- -->

			<!-- <a href="<?php //echo esc_url( get_permalink() ); ?>" class="content-image" style="background-image: url('<?php //esc_url( the_post_thumbnail_url() ); ?>');"></a> -->

		<?php 
		endif;
            // Post Thumbnail for Events
            elseif (has_post_thumbnail()) : ?>

                <div class="col-sm-6">
                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="primary-featured-image">
                        <img src="<?php echo esc_url( the_post_thumbnail_url() ); ?>">
                    </a>
                </div><!-- .col- -->

                <!-- <a href="<?php //echo esc_url( get_permalink() ); ?>" class="content-image" style="background-image: url('<?php //esc_url( the_post_thumbnail_url() ); ?>');"></a> -->

            <?php 
            endif; ?>

            <?php if (!$is_youtube_video): ?>
                <div class="col-sm-6">
                    <?php 
                    if ( get_post_type() === 'event' ) {
                      get_template_part( 'template-parts/content' , 'event-details' ); 
                    } ?>
                </div><!-- .col- -->
            <?php endif; ?>


            <?php if ($is_youtube_video): ?>
                <div class="col-sm-6">
            <?php else: ?>
                <?php if (has_post_thumbnail()): ?>
                    <div class="col-sm-6 primary-featured-excerpt">
                <?php else: ?>
                    <div class="col-lg-12 primary-featured-excerpt text-2-cols">
                <?php endif; ?>
            <?php endif; ?>

                <?php 
                if ( get_post_type() === 'give_forms' ) {
                    the_excerpt(); ?>

                    <?php if ( get_queried_object_id() !== 1795 ) : ?>

                        <a href="<?php echo get_permalink(); ?>" class="btn btn-primary">Give Now</a>

                    <?php endif; ?>

                <?php
                } else {
                    the_content( 'Read more…' );
                } ?>

            </div><!-- .col- -->
        </div><!-- .row -->
    </div><!-- .container -->
</section><!-- .primary-feature -->
