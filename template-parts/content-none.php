<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package C2ST_2017
 */

?>

<section class="no-results not-found">
    <header>
        <h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'c2st-2017' ); ?></h2>
    </header><!-- .page-header -->

    <div class="page-content">
        <?php
        if ( is_search() ) : ?>

            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'c2st-2017' ); ?></p>
            <?php
                // get_search_form();

        else : ?>

            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'c2st-2017' ); ?></p>
            <?php
                // get_search_form();

        endif; ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->
