<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package C2ST_2017
 */

get_header(); ?>

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

            <div class="col-sm-12"><hr></div>
        </div><!-- .row -->

        <main id="main" class="site-main" role="main">

            <?php
            if ( have_posts() ) : ?>

                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post(); ?>

                    <?php if ($wp_query->current_post % 2 == 0): ?>

                        <div class="row">

                            <?php get_template_part( 'template-parts/content', 'library' ); ?>

                    <?php else: ?>

                            <?php get_template_part( 'template-parts/content', 'library' ); ?>

                        </div>
                    
                    <?php endif; ?>

                <?php endwhile; ?>

                <div class="row">
                    <div class="col-sm-12">

                        <?php the_posts_pagination( array(
                            'mid_size'  => 2,
                            'prev_text' => __( 'Newer', 'textdomain' ),
                            'next_text' => __( 'Older', 'textdomain' ),
                        ) ); ?>

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
