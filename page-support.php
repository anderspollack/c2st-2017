<?php
/*
 * Template Name: Support
 */

get_header(); ?>

<?php 
/* 
Support Page Primary Features
*/
$primary_featured_post = get_field( 'primary_featured_post' );
if ( $primary_featured_post ) : ?>

    <?php
    global $post;
    $post = $primary_featured_post;
    setup_postdata( $post );
    get_template_part( 'template-parts/content', 'primary-feature' );
    wp_reset_postdata(); ?>

<?php endif; ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <header class="entry-header">
                            <h1 class="page-title" id="support"><?php the_title(); ?></h1>
                        </header><!-- .entry-header -->
                    </div>
                </div>        

<?php
while ( have_posts() ) : the_post(); ?>

                <!-- <article id="post-<?php //the_ID(); ?>" <?php //post_class(); ?>> -->

                <div class="entry-content">
                    <div class="row">
                        <div class="col-sm-6">

    <?php the_content(); ?>

                        </div>
                        <div class="col-sm-6">

    <?php the_field( 'second_column' ); ?>

                        </div>
                    </div><!-- .row -->
                </div><!-- .entry-content -->
            </div><!-- .container -->
        </div><!-- .page-section -->
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="section-title" id="donate">Donate</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">

    <?php the_field( 'donate_section' ); ?>

                        <p>
                            <a href="/give-now/" class="btn btn-primary">Give now</a>
                        </p>
                    </div>
                </div>

<?php endwhile; // End of the loop. ?>

            </div><!-- .container -->
        </div><!-- .page-section -->
    </main><!-- #main -->
</div><!-- #primary -->

<!-- <script type="text/javascript">
    // adds column break CSS to the parent 'p' of 'span.column-break'
    // jQuery(".column-break").parents('p').css("break-after", "column");
</script> -->

<?php
// get_sidebar();
get_footer(); ?>