<div class="event-listing">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">

            <h3 class="content-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title() ?></a></h3>

        </div>
    </div>
    <div class="row event-row">
        <div class="col-sm-4">

            <?php if ( has_post_thumbnail() ): ?>

                <!-- <a href="<?php //echo esc_url( get_permalink() ); ?>" class="content-image" style="background-image: url(<?php //echo esc_url( the_post_thumbnail_url() ); ?>);"></a> -->

                <a href="<?php echo esc_url( get_permalink() ); ?>" class="event-image">
                    <img src="<?php echo esc_url( the_post_thumbnail_url() ); ?>">
                </a>

            <?php else: ?>

                <a href="<?php echo esc_url( get_permalink() ); ?>" class="event-image-single">
                    <img src="<?php echo esc_url( wp_get_attachment_url( 10286 ) ); ?>" height="100%">
                </a>

            <?php endif; ?>
            
        </div>
        <div class="col-xs-12 col-sm-8 col-md-4">

<?php get_template_part( 'template-parts/content' , 'event-details' ); ?>

        </div>
        <div class="col-xs-12 col-sm-8 col-sm-offset-4 col-md-4 col-md-offset-0 content-excerpt">

<?php the_content( 'Read more…' ); ?>

        </div>
    </div><!-- .row -->
</div><!-- .event-listing -->
