<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package C2ST_2017
 */

// include JQuery datepicker in template
wp_enqueue_script('jquery');
wp_enqueue_script('jquery-ui-core');
wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css');

get_header(); ?>

<?php 
/* 
Library Page Primary Features
*/
$featured_post_toggle = get_field( 'featured_post_toggle', get_option('page_for_posts') );
$primary_featured_post = get_field( 'primary_featured_post', get_option('page_for_posts') );
// $has_featured_post = false;
if ( $primary_featured_post && $featured_post_toggle ) : ?>

    <?php
    $has_featured_post = true;
    global $post;
    $post = $primary_featured_post;
    setup_postdata( $post );
    get_template_part( 'template-parts/content', 'primary-feature' );
    wp_reset_postdata(); ?>

<?php endif; ?>

<div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <header class="entry-header">

                    <h1 class="page-title" style="<?php 
                    if ( $has_featured_post ) {
                        echo 'margin-top: -60px; display: inline-block;';
                    } ?>"><?php single_post_title(); ?></h1>

                </header><!-- .entry-header -->
            </div>
            <div class="col-lg-12">
                <!-- <p>This is the repository for all things C2ST. You can learn with videos of our past events, read commentaries on our blog, check out C2ST in the news, and more! Use the Filter Media options below to browse C2ST’s content and discover something new!</p> -->
                <?php the_field( 'intro_content', get_option('page_for_posts') ); ?>

            </div>
            <div class="col-sm-12 filter">
                <h3 class="section-subtitle filter-label">Filter Media</h3>

                <?php echo do_shortcode('[searchandfilter id="2154"]'); ?>

            </div>
        </div><!-- .row -->

        <!-- <div class="row"><div class="col-sm-12"><hr></div></div> -->

        <main id="main" class="site-main main-index" role="main">
            <div class="row">
                <div class="col-sm-12">

                    <?php the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => __( 'Newer', 'textdomain' ),
                        'next_text' => __( 'Older', 'textdomain' ),
                    ) ); ?>

                </div>
                <div class="col-sm-12"><hr></div>
            </div><!-- .row -->


                <?php
                while ( have_posts() ) : 
                    the_post(); ?>

                    <?php if ($wp_query->current_post % 2 == 0 && $wp_query->current_post < $wp_query->post_count): ?>

                        <div class="row">

                            <?php get_template_part( 'template-parts/content', 'library' ); ?>

                    <?php elseif ($wp_query->current_post % 2 == 0 && $wp_query->current_post < $wp_query->post_count): ?>

                        <div class="row">

                            <?php get_template_part( 'template-parts/content', 'library' ); ?>

                        </div>

                    <?php else: ?>

                            <?php get_template_part( 'template-parts/content', 'library' ); ?>

                        </div>
                        
                    <?php endif; ?>

                <?php endwhile; ?>

            <div class="row">
                <div class="col-sm-12"><hr></div>
                <div class="col-sm-12">

                    <?php the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => __( 'Newer', 'textdomain' ),
                        'next_text' => __( 'Older', 'textdomain' ),
                    ) ); ?>

                </div>
            </div><!-- .row -->
        </main><!-- #main -->
    </div><!-- .container -->
</div><!-- .page-section -->

<?php
get_footer();