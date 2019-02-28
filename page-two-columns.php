<?php
/*
 * Template Name: Two Columns
 */
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package C2ST_2017
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">

            <div class="row">
                <div class="col-sm-6">
                    <?php
                    while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content', 'page' );

                    endwhile; // End of the loop.
                    ?>
                </div>
                <?php if (get_field( 'second_column' )) : ?>
                    <div class="col-sm-6">
                        <?php the_field( 'second_column' ); ?>
                        ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
