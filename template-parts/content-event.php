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
                    <p class="content-subheading event-date">
						<?php 
						if ( get_field( 'event_date_time' ) ) :
                            $event_date_time = get_field('event_date_time', false, false);
                            $event_date_time = new DateTime( $event_date_time );
							echo $event_date_time -> format( 'l, F j, Y' );
						else: echo 'Date TBD';
						endif; ?>
					</p>
					<?php if ( get_field( 'start_time' ) ) : ?>
						<p class="content-subheading event-time">
						<?php 
						the_field( 'start_time' );
						if ( get_field( 'end_time' ) ): 
							echo' – ' .  the_field( 'end_time' );
						endif; ?>
						</p>
					<?php endif; ?>
					<p class="content-subheading event-location">
						<?php 
						if ( get_field( 'event_location_address' ) ): 
							the_field( 'event_location_name' );
						else: echo 'Location TBD';
						endif; ?>
					</p>
					<?php if ( get_field( 'event_location_address' ) ) : ?>
						<p class="content-subheading event-address">
							<?php the_field( 'event_location_address' ); ?>
						</p>
					<?php endif; ?>
					<?php if ( get_field( 'program_series' ) ) : ?>
						<p class="program-series"><a href="#">
							<?php the_field( 'program_series' ) ?>
						</a></p>
					<?php endif; ?>
                </div>
            </div>
        </header><!-- .entry-header -->
        <div class="row">
            <div class="col-sm-6">
                <div class="entry-content">
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
                </div><!-- .entry-content -->
            </div>
        </div>

        <footer class="entry-footer">
            <?php c2st_2017_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </div><!-- .container -->
</article><!-- #post-<?php the_ID(); ?> -->
