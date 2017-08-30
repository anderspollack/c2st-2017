<?php
/*
 * Template Name: About
 */

get_header(); ?>

<?php 
/* 
About Page Primary Features
*/
$primary_featured_post = get_field( 'primary_featured_post' );
if ( $primary_featured_post ) : ?>

    <div id="static-page-featured-section" class="page-section featured-section">

    <?php
    global $post;
    $post = $primary_featured_post;
    setup_postdata( $post );
    get_template_part( 'template-parts/content', 'primary-feature' );
    wp_reset_postdata(); ?>

    </div>

<?php endif; ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="page-section">
            <div class="container">

<?php 
/* 
 * About Page Primary Features
 */
// if ( $featured_on_about_page -> have_posts() ) : 
//     while ( $featured_on_about_page -> have_posts() ) : 
//         $featured_on_about_page -> the_post();

//         get_template_part( 'template-parts/content', 'primary-feature' );

//     endwhile;
// endif; 
// wp_reset_query(); ?>

        

<?php
while ( have_posts() ) : the_post(); ?>

                <!-- <article id="post-<?php //the_ID(); ?>" <?php //post_class(); ?>> -->

                <div class="entry-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <header class="entry-header">
                                <h1 class="page-title"><?php the_title(); ?></h1>
                            </header><!-- .entry-header -->
                        </div>
                        <div class="col-sm-12"><hr></div>
                        <div class="col-sm-12">
                            <h2 class="section-title">Mission</h2>
                        </div>
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
                        <h2 class="section-title">Board of Directors</h2>
                    </div>
                            
    <?php 
    $board = get_field( 'board_of_directors_columns' ); 
    echo '<div class="col-sm-4">' . 
    $board['column_1'] . 
    '</div><div class="col-sm-4">' . 
    $board['column_2'] . 
    '</div><div class="col-sm-4">' . 
    $board['column_3'] . 
    '</div>';?>

                    <div class="col-sm-12"><hr></div>
                    <div class="col-sm-12">
                        <h2 class="section-title">Auxiliary Board</h2>
                    </div>

    <?php 
    $auxiliary_board = get_field( 'auxiliary_board_columns' ); 
    echo '<div class="col-sm-4">' . 
    $auxiliary_board['auxiliary_board_column_1'] . 
    '</div><div class="col-sm-4">' . 
    $auxiliary_board['auxiliary_board_column_2'] . 
    '</div><div class="col-sm-4">' . 
    $auxiliary_board['auxiliary_board_column_3'] . 
    '</div>';?>

                    <div class="col-sm-12"><hr></div>
                    <div class="col-sm-12 c2st-collaborators">
                        
    <?php the_field( 'c2st_collaborators' ); ?>

                    </div>
                    <div class="col-sm-12"><hr></div>
                    <div class="col-sm-12">
                        <h2 class="section-title">C2ST Staff</h2>
                    </div>

    <?php 
    $staff = get_field( 'c2st_staff_columns' ); 
    echo '<div class="col-sm-4">' . 
    $staff['column_1'] . 
    '</div><div class="col-sm-4">' . 
    $staff['column_2'] . 
    '</div><div class="col-sm-4">' . 
    $staff['column_3'] . 
    '</div>';?>

                    

                </div><!-- .row -->

    <?php if ( get_edit_post_link() ) : ?>

                <!-- <footer class="entry-footer"> -->
                        
        <?php
        // edit_post_link(
        //     sprintf(
        //         wp_kses(
        //             /* translators: %s: Name of current post. Only visible to screen readers */
        //             __( 'Edit <span class="screen-reader-text">%s</span>', 'c2st-2017' ),
        //             array(
        //                 'span' => array(
        //                     'class' => array(),
        //                 ),
        //             )
        //         ),
        //         get_the_title()
        //     ),
        //     '<span class="edit-link">',
        //     '</span>'
        // ); ?>

                <!-- </footer> --><!-- .entry-footer -->

    <?php endif; ?>

                <!-- </article> --><!-- #post-<?php //the_ID(); ?> -->
    
    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();

    endif;

endwhile; // End of the loop. ?>

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