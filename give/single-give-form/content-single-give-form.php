<?php

do_action( 'give_before_single_form' );

// if ( has_post_thumbnail() ) {

// 	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'donate-header' );
// 	$headerbkgrnd = "url('" . $image[0] . "');";
// } else {
// 	$headerbkgrnd = '#777;';
// }

?>

<div class="col-sm-12">

	<h1 itemprop="name" class="give-form-title entry-title"><?php the_title(); ?></h1>

</div>
<div class="col-sm-6">
	
	<?php 
    // Post Thumbnail
    if ( has_post_thumbnail() &&  'Video' !== get_field( 'content_type' ) ) : ?>
    
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="content-image" 
        style="background-image: url('<?php esc_url( the_post_thumbnail_url() ); ?>');">
        </a>

    <?php endif; ?>

</div>
<div class="col-sm-6">

	<?php the_excerpt(); ?>

</div>

<div id="give-form-<?php the_ID(); ?>-content" class="give-form">

	<div class="<?php echo apply_filters( 'give_forms_single_summary_classes', 'summary entry-summary' ); ?>">


		<?php give_get_donation_form( $args = array() ); ?>

	</div>

	<!-- .summary -->

	<?php	do_action( 'give_after_single_form_summary' );	?>

</div><!-- #give-form-<?php the_ID(); ?> -->

<?php do_action( 'give_after_single_form' ); ?>