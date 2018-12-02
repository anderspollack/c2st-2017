<?php
/*
 * Template Name: About
 */

get_header(); ?>

<?php 
/* 
About Page Primary Features
*/
$featured_post_toggle = get_field( 'featured_post_toggle' );
$primary_featured_post = get_field( 'primary_featured_post' );
if ( $featured_post_toggle && $primary_featured_post) : ?>

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

                                    <h1 class="page-title" style="<?php 
                                    if ( get_field( 'featured_post_toggle' ) ) {
                                        echo 'margin-top: -60px; display: inline-block;';
                                    } ?>"><?php the_title(); ?></h1>

                                </header><!-- .entry-header -->
                            </div>
                            <div class="col-sm-12"><hr></div>
                            <div class="col-sm-12">
                                <h2 class="section-title" id="mission">Mission</h2>
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
                    <div class="col-sm-12"><hr></div>
                    <div class="col-sm-12">
                        <h2 class="section-title" id="board-of-directors">Board of Directors</h2>
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

                    <?php if ( get_field( 'board_photo' ) ): ?>
                        <div class="col-sm-12">
                            <img src="<?php echo get_field( 'board_photo' ); ?>" class="board-photo">
                        </div>
                    <?php endif; ?>

                    <div class="col-sm-12"><hr></div>
                    <div class="col-sm-12">
                        <h2 class="section-title" id="auxiliary-board">Auxiliary Board</h2>
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

                    <?php if ( get_field( 'auxiliary_board_photo' ) ): ?>
                        <div class="col-sm-12">
                            <img src="<?php echo get_field( 'auxiliary_board_photo' ); ?>" class="board-photo">
                        </div>
                    <?php endif; ?>

                    <div class="col-sm-12"><hr></div>
                    <div class="col-sm-12 c2st-collaborators" id="c2st-collaborators">
                        
                    <?php the_field( 'c2st_collaborators' ); ?>

                    </div>
                    <div class="col-sm-12"><hr></div>
                    <div class="col-sm-12">
                        <h2 class="section-title" id="c2st-staff">C2ST Staff</h2>
                    </div>

                    <?php
                    // check if the repeater field has rows of data
                    if( have_rows('c2st_staff') ): ?>
                                    
                        <?php 
                        // loop through the rows of data
                        while ( have_rows('c2st_staff') ) : the_row(); ?>

                            <div class="col-sm-4 c2st-staff">
                                <?php if ( get_sub_field('photo') ): ?>

                                    <img src="<?php the_sub_field('photo'); ?>" align="left">

                                <?php endif; ?>

                                <h3 class="section-subtitle"><?php the_sub_field('name'); ?></h3>

                                <?php the_sub_field('title'); ?>

                                <a href="mailto:<?php get_sub_field('email_address'); ?>"><?php the_sub_field('email_address'); ?></a>

                                <?php
                                $person = get_sub_field('person'); 
                                if ( $person ) {
                                    $post = $person;
                                    setup_postdata( $post );
                                    echo get_field( 'photo' ) ? '<img alt="' . get_the_title() . '" src="' . get_field( 'photo' ) . '" align="left" />' : '';
                                    echo '<a href="' . get_permalink() . '"><h3 class="section-subtitle">' . get_the_title() . '</h3></a>';
                                    echo get_field( 'title' ) ? get_field( 'title' ) . '<br/>' : '';
                                    echo get_field( 'email_address' ) ? '<a href="mailto:' . get_field( 'email_address' ) . '" class="email-link">' . get_field( 'email_address' ) . '</a>' : '';
                                    echo get_field('phone') ? '<a href="tel:' . get_field( 'phone' ) . '" class="email-link">' . get_field( 'email_address' ) . '</a>' : '';
                                    wp_reset_postdata();
                                }
                                ?>

                            </div>

                        <?php endwhile; ?>

                    <?php endif; ?>
                    

                </div><!-- .row -->

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
