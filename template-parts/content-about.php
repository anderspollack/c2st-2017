<?php
/**
 * Template part for displaying page content in page-about.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package C2ST_2017
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <div id="about" class="page-section">
        <div class="entry-content">
            <div class="row">
                <div class="col-sm-8">
                    <?php
                    the_content();

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'c2st-2017' ),
                        'after'  => '</div>',
                    ) ); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h2>Board of Directors</h2>
                </div>
                <div class="col-sm-12 board">
                    <?php the_field( 'board_of_directors' ); ?>
                </div>
                <div class="col-sm-12">
                    <h2>Auxiliary Board</h2>
                </div>
                <div class="col-sm-12 board">
                    <?php the_field( 'auxiliary_board' ); ?>
                </div>
            </div>
        </div><!-- .entry-content -->
    </div>

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
</article><!-- #post-<?php the_ID(); ?> -->
