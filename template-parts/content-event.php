<?php
/**
 * Template part for displaying Events
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package C2ST_2017
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="page-section">
        <div class="container">
            <header class="entry-header">
                <div class="row">
                    <div class="col-lg-12">
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
                </div>
                <div class="row">
                    <?php if ( has_post_thumbnail() ): ?>
                        <div class="col-sm-6">
                            <a href="<?php echo esc_url( the_post_thumbnail_url() ); ?>" class="event-image-single">
                                <img src="<?php echo esc_url( the_post_thumbnail_url() ); ?>">
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="col-sm-6">

                        <?php get_template_part( 'template-parts/content' , 'event-details' ); ?>

                        <h3 class="event-share-heading">Share</h3>

                        <!-- FB Share Button -->
                        <div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
                        <!-- End FB Share Button -->

                        <!-- Tweet Button -->
                        <a class="twitter-share-button"
                            href="https://twitter.com/intent/tweet"
                            data-size="large"
                            data-text="<?php get_the_title(); ?>"
                            data-url="<?php get_the_permalink(); ?>">
                            Tweet
                        </a>
                        <!-- End Tweet Button -->

                        <!-- Linkedin Button -->
                        <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
                        <script type="IN/Share" data-url="<?php get_the_permalink(); ?>"></script>
                        <!-- End Linkedin Button -->

                    </div>
                    <div class="col-sm-12"><hr></div>
                </div>
            </header><!-- .entry-header -->
            <div class="entry-content">
                <div class="row top-margin">
                    <div class="col-md-6 col-sm-12">
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

                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'c2st-2017' ),
                                'after'  => '</div>',
                            ) );
                        ?>
                    </div>
                    <div class="col-md-6 col-sm-12">

                        <?php if ( get_field( 'event_details' ) ) : ?>

                            <?php if ( get_field( 'event_details_label' ) ) : ?>

                                <h3 class="details"><?php the_field( 'event_details_label' ); ?></h3>

                            <?php endif; ?>                            

                            <?php the_field( 'event_details' ); ?>

                        <?php endif; ?>

                    </div>
                </div>
            </div><!-- .entry-content -->
        </div><!-- .container -->    
    </div><!-- .page-section -->

    <?php
    // check if the repeater field has rows of data
    if( have_rows('featured_guests') ): ?>

        <div id="featured-guests" class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12"><hr></div>
                    <div class="col-sm-12">
                        <h2 class="section-title"><?php the_field('featured_guests_label'); ?></h2>
                    </div>
                </div><!-- .row -->
                    
                    <?php 
                    // loop through the rows of data
                    $guest_counter = 0;
                    while ( have_rows('featured_guests') ) : the_row();
                        $guest_counter ++;
                        if ( get_row_index() % 2 === 1 ) : ?>

                            <div class="row">

                        <?php endif; ?>

                        <div class="col-md-6 col-sm-12 guest-bio">
                            <h3 class="section-subtitle"><?php the_sub_field('name'); ?></h3>

                            <?php if ( get_sub_field('photo') ) :?>

                                <img src="<?php the_sub_field('photo'); ?>" align="left">

                            <?php endif; ?>

                            <?php the_sub_field('bio'); ?>

                            <a href="mailto:<?php the_sub_field('email_address'); ?>" title="Email C2ST"><?php the_sub_field('email_address'); ?></a>

                        </div>

                        <?php if ( get_row_index() % 2 === 0 ) : ?>

                            </div><!-- .row -->

                        <?php endif; ?>

                    <?php endwhile;
                    if ( $guest_counter % 2 === 1) : ?>

                        </div><!-- .row -->

                    <?php endif;?>

                </div>
            </div><!-- .container -->
        </div><!-- .page-section -->

    <?php endif; ?>

    <?php
    // check if the repeater field has rows of data
    if( have_rows('partnership') ): ?>

        <div id="partnership" class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12"><hr></div>
                    <div class="col-sm-12">
                        <h2 class="section-title"><?php the_field('partnership_section_label'); ?></h2>
                    </div>
                </div><!-- .row -->
                    
                <?php 
                // loop through the rows of data
                $partner_counter = 0;
                while ( have_rows('partnership') ) : the_row(); ?>

                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="section-subtitle"><?php the_sub_field( 'partner_group_label' ); ?></h3>
                        </div>
                    </div><!-- .row -->

                    <?php 
                    if( have_rows('partners') ):
                        $row_counter = 0; 
                        while ( have_rows('partners') ) : the_row();
                            $partner_counter ++;
                            $row_counter ++;
                            if ( get_row_index() % 2 === 1 ) : ?>

                                <div class="row">

                            <?php endif;  ?>

                            <div class="col-sm-6">

                                <?php if ( get_sub_field('partner_logo') ): ?>

                                    <img src="<?php the_sub_field('partner_logo'); ?>" align="center" class="img-thumbnail">

                                <?php else : ?>

                                    <p><?php the_sub_field('partner_name'); ?></p>

                                <?php endif; ?>

                            </div>

                            <?php if ( get_row_index() % 2 === 0 ) : ?>

                                </div><!-- .row -->

                            <?php endif;
                        endwhile;
                        if ( $row_counter % 2 === 1) : ?>

                            </div><!-- .row -->

                        <?php 
                        endif; ?>

                        <div class="row">
                            <div class="col-sm-12"><hr></div>
                        </div><!-- .row -->

                    <?php 
                    endif;
                endwhile; ?>

            </div><!-- .container -->
        </div><!-- .page-section -->

    <?php endif; ?>
                    


                
        
</article><!-- #post-<?php the_ID(); ?> -->
