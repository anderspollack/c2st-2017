<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package C2ST_2017
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <div class="container">
                <div class="col-sm-12">
                    <section class="error-404 not-found">
                        <header class="page-header">
                            <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'c2st-2017' ); ?></h1>
                        </header><!-- .page-header -->
                    </section><!-- .error-404 -->
                </div>
            </div>
            
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
