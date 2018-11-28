<?php
/**
 * The template for displaying Single Person pages
 *
 * @package C2ST_2017
 */

get_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="container">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </div><!-- .container -->
        </main><!-- #main -->
    </div><!-- #primary -->
</article>
<?php
// get_sidebar();
get_footer();
