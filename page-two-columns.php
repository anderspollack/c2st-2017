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
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="row">
                    <div class="col-sm-12">
                        <header class="entry-header">
                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        </header><!-- .entry-header -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="entry-content">
                            <?php
                            the_content();

                            wp_link_pages( array(
                              'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'c2st-2017' ),
                              'after'  => '</div>',
                            ) );
                            ?>
                        </div><!-- .entry-content -->

                        <?php if ( get_edit_post_link() ) : ?>
                            <footer class="entry-footer">
                                <?php
                                edit_post_link(
                                  sprintf(
                                    wp_kses(
                                      /* translators: %s: Name of current post. Only visible to screen readers */
                                      __( 'Edit <span class="screen-reader-text">%s</span>', 'c2st-2017' ),
                                      array(
                                        'span' => array(
                                          'class' => array(),
                                        ),
                                      )
                                    ),
                                    get_the_title()
                                  ),
                                  '<span class="edit-link">',
                                  '</span>'
                                );
                                ?>
                            </footer><!-- .entry-footer -->
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-6">
                        <?php if (get_field( 'second_column' )) : ?>
                            <?php the_field( 'second_column' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </article><!-- #post-<?php the_ID(); ?> -->
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
