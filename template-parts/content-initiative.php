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
    <div class="row">
        <div class="col-sm-12">
            <header class="entry-header">
                <?php
                the_title( '<h1 class="entry-title">', '</h1>' );
                if ( 'post' === get_post_type() ) : ?>
                    <div class="entry-meta">
                        <?php c2st_2017_posted_on(); ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->
        </div>
        <div class="col-sm-6">
            <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="content-image" 
                  style="background-image: url('<?php esc_url( the_post_thumbnail_url() ); ?>');">
                </a>
            <?php endif; ?>
        </div>
        <div class="col-sm-6">
            <div class="share-block">
                <h3>Share</h3>

                <div class="share-block__buttons">
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
            </div>
            
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
            
        </div>
    </div>
    <?php if( have_rows('initiative_extra') ): ?>
        <div class="row initiative__extra">
            <?php while( have_rows('initiative_extra') ): the_row(); ?>
                <div class="col-sm-12 initiative__column">
                    <?php the_sub_field('column_1'); ?>
                </div>
                <div class="col-sm-12 initiative__column">
                    <?php the_sub_field('column_2'); ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
