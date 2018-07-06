<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package C2ST_2017
 */

get_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="container">
                <div class="row">

                    <?php
                    while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content', get_post_format() );
                    ?>

                        <div class="col-sm-12">
                            <?php comments_template(); ?>
                        </div>

                    <?php endwhile; ?>

                </div><!-- .row -->
            </div><!-- .container -->
        </main><!-- #main -->
    </div><!-- #primary -->
</article>
<?php
// get_sidebar();
get_footer();
