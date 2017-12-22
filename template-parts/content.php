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
    <header class="entry-header">
        <div class="col-sm-12">

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
    </header><!-- .entry-header -->

    <div class="col-sm-9 col-md-7 col-lg-6">

        <?php 
        // Post Thumbnail
        if ( has_post_thumbnail() && 'Video' !== get_field( 'content_type' ) ) : ?>
        
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="content-image" 
            style="background-image: url('<?php esc_url( the_post_thumbnail_url() ); ?>');">
            </a>

        <?php elseif ( 'Video' === get_field( 'content_type' ) ) : 
            $video_url = get_field( 'youtube_video_url' );
            $code_pos = strrpos( $video_url, 'watch?v=' );
            $embed_video_url = substr_replace( $video_url, 'embed/', $code_pos, 8 ); ?>

            <div class="video-container">

                <iframe class="video" src="<?php echo $embed_video_url; ?>" frameborder="0" allowfullscreen></iframe>

            </div>

        <?php endif; ?>

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

        <?php 
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'c2st-2017' ),
            'after'  => '</div>',
        ) ); ?>

    </div>
    <div class="col-sm-3 col-md-5 col-lg-6 post-sidebar">

        <h3>Share</h3>

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

        <?php 
        if ( 'Blog Post' === get_field( 'content_type' ) ) :

            $other_blog_posts = new WP_Query( array(
                'post_type' => array( 'post' ),
                'posts_per_page' => 3,
                'orderby' => 'post_id', 
                'order' => 'DSC',
            ) );

            if ( $other_blog_posts -> have_posts() ) : ?>

                <h2 class="section-title">Recent Blog Posts:</h2>

                <?php
                while ( $other_blog_posts -> have_posts() ) : 
                    $other_blog_posts -> the_post(); ?>

                    <h3 class="content-title">
                
                        <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo the_title(); ?></a> 

                    </h3><!-- .content-title -->

                <?php 
                endwhile;
            endif; ?>


        <?php 
        endif;
        wp_reset_query(); ?>

    </div>

</article><!-- #post-<?php the_ID(); ?> -->