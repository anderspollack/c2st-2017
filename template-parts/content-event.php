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
                    <div class="col-sm-6">
                        <?php
                        if ( has_post_thumbnail() ): ?>
                          <a href="<?php echo esc_url( the_post_thumbnail_url() ); ?>" class="content-image" style="background-image: url(<?php echo esc_url( the_post_thumbnail_url() ); ?>);"></a>
    					<?php endif; ?>
                    </div>
                    <div class="col-sm-6">

                        <?php get_template_part( 'template-parts/content' , 'event-details' ); ?>

                        <h3>Share</h3>

                        <!-- FB Share Button -->
                        <div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
                        <!-- End FB Share Button -->

                    </div>
                    <div class="col-sm-12"><hr></div>
                </div>
            </header><!-- .entry-header -->
            <div class="entry-content">
                <div class="row">
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
                            ) );

                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'c2st-2017' ),
                                'after'  => '</div>',
                            ) );
                        ?>
                    </div>
                    <div class="col-sm-6">

                        <?php if ( get_field( 'event_details' ) ) : ?>

                            <h3><?php the_field( 'event_details_label' ); ?></h3>

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
                    <div class="col-sm-12">
                        <h2 class="section-title"><?php the_field('featured_guests_label'); ?></h2>
                    </div>
                    
                    <?php 
                    // loop through the rows of data
                    while ( have_rows('featured_guests') ) : the_row(); ?>

                        <div class="col-sm-6">
                            <h3 class="section-subtitle"><?php the_sub_field('name'); ?></h3>

                            <img src="<?php the_sub_field('photo'); ?>" align="left">

                            <?php the_sub_field('bio'); ?>

                        </div>

                    <?php endwhile; ?>

                </div>
            </div><!-- .container -->
        </div><!-- .page-section -->

    <?php endif; ?>

    <?php
    $partnership_section_label = get_field('partnership_section_label');
    // check if the repeater field has rows of data
    if( have_rows('partnership') ): ?>

        <div id="partnership" class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="section-title"><?php echo $partnership_section_label; ?></h2>
                    </div>
                    
                    <?php 
                    // loop through the rows of data
                    while ( have_rows('partnership') ) : the_row();
                        // $partner_group_label = get_field('partner_group_label'); ?>

                        <div class="col-sm-12">
                            <h3 class="section-subtitle"><?php the_sub_field( 'partner_group_label' ); ?></h3>
                        </div>

                        <?php 
                        if( have_rows('partners') ): 
                            while ( have_rows('partners') ) : the_row(); ?>

                                <div class="col-sm-6">

                                    <?php 
                                    if ( get_sub_field('partner_logo') ): ?>

                                        <img src="<?php the_sub_field('partner_logo'); ?>" align="center">

                                    <?php else : ?>

                                        <p><?php the_sub_field('partner_name'); ?></p>

                                <?php endif; ?>

                                </div>

                            <?php 
                            endwhile;
                        endif; ?>

                        <div class="col-sm-12"><hr></div>

                    <?php endwhile; ?>

                </div>
            </div><!-- .container -->
        </div><!-- .page-section -->

    <?php endif; ?>
                    


                
        
</article><!-- #post-<?php the_ID(); ?> -->
