<?php 
if ( get_post_type() === 'event' ) {
    $featured_glyphicon = 'glyphicon-fire';
    $featured_item_type = get_post_type_object( get_post_type() );
    $featured_item_type = $featured_item_type -> labels -> singular_name;
} else if ( get_field( 'content_type' ) === 'Blog Post' ) {
    $featured_glyphicon = 'glyphicon-text-background';
    $featured_item_type = get_field( 'content_type' );
} else if ( get_field( 'content_type' ) === 'Video' ) {
    $featured_glyphicon = 'glyphicon-film';
    $featured_item_type = get_field( 'content_type' );
} else if ( get_post_type() === 'give_forms' ) {
    $featured_glyphicon = 'glyphicon-gift';
    $featured_item_type = 'Donation Initiative';
} else {
    $featured_glyphicon = 'glyphicon-bullhorn';
    $featured_item_type = get_field( 'content_type' );
} ?>
        
<div class="col-sm-6 col-md-6 col-lg-6">

    <span class="feature-label">

        <span class="glyphicon <?php echo $featured_glyphicon; ?>"></span>
        <?php echo 'Featured ' . $featured_item_type; ?>
        
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

<?php endif; ?>

<?php 
    if ( get_post_type() === 'event' ) {
        get_template_part( 'template-parts/content' , 'event-details' ); 
    } ?>
                   

    <?php 
    if ( get_post_type() === 'give_forms' ) {
        the_excerpt(); ?>

        <?php if ( get_queried_object_id() !== 1795 ) : ?>

            <a href="<?php echo get_permalink( 1795 ); ?>" class="btn btn-primary">Give Now</a>

        <?php endif; ?>

    <?php
    } else {
        the_content( 'Read more…' );
    } ?>

</div><!-- .row -->