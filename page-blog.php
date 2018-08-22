<?php
// Template Name: Blog
/**
 * The template for displaying Blog Posts, separate from the Library page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package C2ST_2017
 */

get_header();

/* 
   Blog Page Primary Feature
 */
$featured_post_toggle = get_field( 'featured_post_toggle' );
$primary_featured_post = get_field( 'primary_featured_post' );
if ( $featured_post_toggle && $primary_featured_post) {
  /* global $post;
   * $post = $primary_featured_post;
   * setup_postdata( $post ); */
  get_template_part( 'template-parts/content', 'primary-feature' );
  /*   wp_reset_postdata(); */
}

$args =  array(
  'tax_query' => array(
    array(
      'taxonomy' => 'content_type',
      'field' => 'slug',
      'terms' => 'blog-post',
    ),
  ),
  'posts_per_page' => 6,
  'paged' => 'paged',
  /*   'post__not_in' => $primary_featured_post, */
);
$blog_posts = new WP_Query( $args );
?>

<div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <header>
                    <h1 class="page-title">
			C2ST Blog
		    </h1>
                </header><!-- .page-header -->
            </div>
            <div class="col-sm-12">
                <?php the_content(); ?>
            </div>

            <div class="col-sm-12"><hr></div>
        </div><!-- .row -->

        <main id="main" class="site-main" role="main">

            <?php
            if ( $blog_posts -> have_posts() ) : ?>

                <?php
                /* Start the Loop */
                while ( $blog_posts -> have_posts() ) : $blog_posts -> the_post(); ?>

                    <?php if ($blog_posts -> current_post % 2 == 0): ?>

                        <div class="row">

                            <?php get_template_part( 'template-parts/content', 'library' ); ?>

                    <?php else: ?>

                            <?php get_template_part( 'template-parts/content', 'library' ); ?>

                        </div>
                        
                    <?php endif; ?>

                <?php endwhile; ?>

                <div class="row">
                    <div class="col-sm-12">
                        <hr/>
                    </div>
                    <div class="col-sm-12">

                        <div class="nav-links">

                            <?php 
                            echo paginate_links( array(
                              'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                              'total'        => $blog_posts ->max_num_pages,
                              'current'      => max( 1, get_query_var( 'paged' ) ),
                              'format'       => '?paged=%#%',
                              'show_all'     => false,
                              'type'         => 'plain',
                              'end_size'     => 2,
                              'mid_size'     => 1,
                              'prev_next'    => true,
                              'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer', 'text-domain' ) ),
                              'next_text'    => sprintf( '%1$s <i></i>', __( 'Older', 'text-domain' ) ),
                              'add_args'     => false,
                              'add_fragment' => '',
                            ) );
                            ?>
                            
                        </div>

                    </div>
                </div>

            <?php 
            else : ?>

                <div class="row">
                    <div class="col-sm-12">

                        <?php get_template_part( 'template-parts/content', 'none' ); ?>

                    </div>
                </div>

            <?php 
            endif; ?>

        </main><!-- #main -->
    </div><!-- .container -->
</div><!-- .page-section -->

<?php
get_footer();
