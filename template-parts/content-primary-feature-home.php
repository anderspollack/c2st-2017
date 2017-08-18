<?php 
if ( get_post_type() === 'event' ) {
    $featured_glyphicon = 'glyphicon-fire';
} else if ( get_post_type() === 'post' ) {
    $featured_glyphicon = 'glyphicon-text-background';
} else {
    $featured_glyphicon = 'glyphicon-bullhorn';
}

$featured_item_type = get_post_type_object( get_post_type() ); ?>

<section class="primary-feature home-page-primary-feature">
    <div class="row">
        <div class="col-sm-12">
            <span class="feature-label">

                <span class="glyphicon <?php echo $featured_glyphicon; ?>"></span>
                <?php echo 'Featured ' . $featured_item_type -> labels -> singular_name; ?>
                
            </span><!-- .feature-label -->
            <h2 class="content-title">
                
                <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo the_title(); ?></a> 

            </h2><!-- .content-title -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">

    <?php 
    // Post Thumbnail
    if ( has_post_thumbnail() ) : ?>
        
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="content-image" 
            style="background-image: url('<?php esc_url( the_post_thumbnail_url() ); ?>');">
            </a>

    <?php 
    endif; ?>

        </div><!-- .col- -->
        <div class="col-sm-4">
            
    <?php 
    if ( get_post_type() === 'event' ) {
        get_template_part( 'template-parts/content' , 'event-details' ); 
    } ?>
                   
            <!-- <p class="content-subheading"> -->
                <!-- Program Series -->
            <!-- </p> -->

        </div><!-- .col- -->
        <div class="col-sm-6">

    <?php the_content( 'Read more…' ); ?>

        </div><!-- .col- -->
    </div><!-- .row -->
</section><!-- .primary-feature -->