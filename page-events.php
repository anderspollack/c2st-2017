<?php
// Template Name: Events

// include JQuery datepicker in template
wp_enqueue_script('jquery');
wp_enqueue_script('jquery-ui-core');
wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css');

get_header(); ?>

<?php 
/* 
Events Page Primary Features
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

<div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <header class="entry-header">

                    <h1 class="page-title" style="<?php 
                    if ( get_field( 'featured_post_toggle' ) ) {
                        echo 'margin-top: -60px; display: inline-block;';
                    } ?>"><?php the_title(); ?></h1>

                </header><!-- .entry-header -->
            </div>
            <div class="col-lg-12">

                <?php 
                global $post;
                setup_postdata( $post );
                the_content(); ?>

            </div>
            <div class="col-lg-12 filter">
                <h3 class="section-subtitle filter-label">Filter Events</h3>

                <?php echo do_shortcode('[searchandfilter id="2131"]'); ?>

            </div>
            <div class="col-sm-12"><hr></div>
        </div><!-- .row -->

        <!-- <div class="row">
            <div class="col-lg-12">
                <h1 class="section-title">Upcoming Events</h1>
            </div>
        </div> -->
        

            <?php
            $today = date('Ymd');

            $upcoming_events = get_posts( array(
                'fields'             => 'ids',
                'posts_per_page'     => -1,
                'post_type'            => 'event',
                'meta_query'         => array(
                    array(
                        'key'            => 'event_date',
                        'compare'        => '>=',
                        'value'            => $today,
                        'type'            => 'DATE'
                    )
                ),
                'meta_key'            => 'event_date',
                'order'                => 'ASC',
                'orderby'            => 'meta_value_num',
            ) );

            // foreach ( $upcoming_events as $event ) {
            //     echo '<p>' . get_the_title( $event ) . ' ' . get_post_field( 'event_date', $event ) . '</p>';
            // }

            // $listed_first = array();
            // if ( $upcoming_events -> have_posts() ) {
            //     while ( $upcoming_events -> have_posts() ) {
            //         $upcoming_events -> the_post();
            //         $listed_first[] = get_the_id();
            //     }
            // }

            $past_events = get_posts( array(
                'fields' => 'ids',
                'posts_per_page' => -1,
                'post_type' => 'event',
                'meta_query'         => array(
                    array(
                        'key'            => 'event_date',
                        'compare'        => '<',
                        'value'            => $today,
                        'type'            => 'DATE'
                    )
                ),
                'meta_key' => 'event_date', // name of custom field
                'orderby' => 'meta_value_num',
                'order' => 'DSC' 
            ) );


            // $listed_next = array();
            // if ( $all_events -> have_posts() ) {
            //     while ( $all_events -> have_posts() ) {
            //         $all_events -> the_post();
            //         $listed_next[] = get_the_id();
            //     }
            // }

            $master_events_list = array_merge( $upcoming_events, $past_events );
            // $master_events_list = array_unique( $master_events_list );

            // foreach ( $master_events_list as $event ) {
            //     echo '<p>' . get_the_title( $event ) . ' ' . get_post_field( 'event_date', $event ) . '</p>';
            // }

            global $wp_query;
            $wp_query = new WP_Query( array(
                'post_type' => 'event',
                'paged' => $paged,
                // 'posts_per_page' => '6',
                'meta_key' => 'event_date', // name of custom field
                'orderby' => 'meta_value',
                'search_filter_id' => '2131',
                // 'order' => 'ASC',
            ) ); ?>

            <?php 
            if ( $wp_query -> have_posts() ) : ?>

                <main id="main" class="site-main main-index" role="main">
                    <div class="row">
                        <div class="col-sm-12">

                            <?php 
                            the_posts_pagination( array(
                                'mid_size'  => 2,
                                'prev_text' => __( 'Newer', 'textdomain' ),
                                'next_text' => __( 'Older', 'textdomain' ),
                            ) );
                            ?>

                        </div><!-- .col -->
                        <div class="col-sm-12"><hr></div>
                    </div><!-- .row -->

                    <?php 
                    while ( $wp_query -> have_posts() ) :
                        $wp_query -> the_post();
                        $event_ID = get_the_id(); ?>

                        <?php if ( $event_ID !== $primary_featured_post || !$featured_post_toggle ) : ?>
                    
                            <?php get_template_part( 'template-parts/content', 'event-listing' ); ?>

                        <?php endif; ?>

                    <?php endwhile; ?>

                    <div class="row">
                        <div class="col-sm-12"><hr></div>
                        <div class="col-sm-12">

                            <?php 
                            the_posts_pagination( array(
                                'mid_size'  => 2,
                                'prev_text' => __( 'Newer', 'textdomain' ),
                                'next_text' => __( 'Older', 'textdomain' ),
                            ) );
                            ?>

                        </div><!-- .col -->
                    </div><!-- .row -->
                </main><!-- .site-main -->

            <?php 
            endif; ?>

    </div><!-- .container -->
</div><!-- .page-section -->

<?php get_footer(); ?>