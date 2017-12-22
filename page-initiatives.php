<?php
// Template Name: Initiatives

get_header(); ?>

<div id="initiatives" class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <header class="entry-header">
                    <h1 class="page-title">C2ST Initiatives</h1>
                </header><!-- .entry-header -->
            </div>
        </div>

        <?php
        $initiatives = new WP_Query( array(
            'post_type' => 'initiative',
        ) );
        if ( $initiatives -> have_posts() ) :
            while ( $initiatives -> have_posts() ) :
                $initiatives -> the_post();
                if ($initiatives->current_post % 2 == 0 && $initiatives->current_post < $initiatives->post_count): ?>

                    <div class="row">
                    
                        <?php get_template_part( 'template-parts/content', 'initiative' ); ?>


                <?php elseif ($initiatives->current_post % 2 == 1 && $initiatives->current_post == $initiatives->post_count): ?>

                    <div class="row">
                    
                        <?php get_template_part( 'template-parts/content', 'initiative' ); ?>

                    </div>


                <?php else: ?>

                        <?php get_template_part( 'template-parts/content', 'initiative' ); ?>

                    </div>

                <?php endif; ?>

            <?php endwhile;
        endif; ?>

    </div><!-- .container -->
</div><!-- .page-section -->

<?php get_footer(); ?>