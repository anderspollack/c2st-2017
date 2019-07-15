<?php
// Template Name: Home

get_header();
$excluded_posts = array();
?>
    
<div id="featured-section" class="page-section featured-section">

    <?php 
    /* 
    Home Page Primary Features
    */
    $primary_featured_post = get_field( 'primary_featured_post' );
    $excluded_posts[] = $primary_featured_post;
    if ( $primary_featured_post ) :
        global $post;
        $post = $primary_featured_post;
        setup_postdata( $post );
        get_template_part( 'template-parts/content', 'primary-feature' );
        wp_reset_postdata();
    endif; ?>

    <div class="container">

        <!-- <div class="row secondary-features">
        <?php 
        /* 
        Home Page Secondary Features
        */
        /* $secondary_featured_posts = get_field( 'secondary_featured_posts' );
         * $secondary_featured_post_1 = $secondary_featured_posts['secondary_featured_post_1'];
         * $secondary_featured_post_2 = $secondary_featured_posts['secondary_featured_post_2'];
         * if ( $secondary_featured_post_1 ) :

         *     global $post;
         *     $post = $secondary_featured_post_1;
         *     setup_postdata( $post );
         *     get_template_part( 'template-parts/content', 'secondary-feature' );
         *     wp_reset_postdata();
         * 
         * endif;
         * if ( $secondary_featured_post_2 ) :

         *     global $post;
         *     $post = $secondary_featured_post_2;
         *     setup_postdata( $post );
         *     get_template_part( 'template-parts/content', 'secondary-feature' );
         *     wp_reset_postdata();

         * endif; */
        ?>
             </div> -->

        <?php
        /* 
           Home Page Secondary Features
         */
        $secondary_featured_posts = get_field( 'secondary_featured_posts_multi' );
        if ( $secondary_featured_posts ) {
            $counter = 0;
            $length = count( $secondary_featured_posts );
            foreach ( $secondary_featured_posts as $item ) {
                $secondary_featured_post = $item[ 'featured_item' ];
                if ( $secondary_featured_post ) {
                    $counter ++;
                    $excluded_posts[] = $secondary_featured_post;
                    $post = $secondary_featured_post;
                    setup_postdata( $post );
                    echo $counter % 2 === 1 ? '<div class="row secondary-features">' : '';
                    if ( $counter % 2 === 1 && $counter === $length ) {
                        /* if it's last and odd, get the wide template */
                        get_template_part( 'template-parts/content', 'secondary-feature-wide' );   
                    } else {
                        /* otherwise get the normal one */
                        get_template_part( 'template-parts/content', 'secondary-feature' );   
                    }
                    echo $counter % 2 === 0 || $counter === $length ? '</div>' : '';
                    wp_reset_postdata();
                }
            }
        }
        ?>
        <!-- <div class="row"><div class="col-sm-12"><hr></div></div> -->
    </div><!-- .container -->
</div><!-- .featured-section -->

<!-- <div id="upcoming-events" class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="section-title">Upcoming Events</h1>
            </div>
        </div> -->

<?php

// find date time now
$today = date('Ymd');
$date_now = date('Y-m-d H:i:s');
$time_now = strtotime($date_now);


// find date time in 7 days
$time_next_week = strtotime('+1000 day', $time_now);
$date_next_week = date('Y-m-d H:i:s', $time_next_week);

global $post;

$upcoming_events = get_posts( array(
  'exclude' => $excluded_posts,
  'posts_per_page'    => -1,
    // 'post_type'            => 'event',
    // 'meta_query'         => array(
    //     array(
    //         'key'            => 'event_date',
    //         'compare'        => 'BETWEEN',
    //         'value'            => array( $date_now, $date_next_week ),
    //         'type'            => 'DATE'
    //     )
 //    ),
    // 'order'                => 'ASC',
    // 'orderby'            => 'meta_value',
    // 'meta_key'            => 'event_date',
    // 'meta_type'            => 'DATE'
    'post_type'            => 'event',
                'meta_query'         => array(
                    array(
                        'key'            => 'event_date',
                        'compare'        => '>=',
                        'value'            => $today,
                        // 'type'            => 'DATE'
                    )
                ),
                'order'                => 'ASC',
                'orderby'            => 'meta_value',

) ); ?>


    
    <div id="upcoming-events" class="page-section">
        <div class="container">
            <?php 
            if ( $upcoming_events ) : ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="section-title">Upcoming Events</h1>
                    </div>
                </div>
		<!-- .row -->

                <?php
                foreach ( $upcoming_events as $post ) { 
                  setup_postdata( $post );
                  $event_ID = get_the_id();
		  get_template_part( 'template-parts/content', 'event-listing' );
                }
                wp_reset_postdata(); ?>

            <?php endif; ?>

            <div class="row see-all-events">
                <div class="col-lg-2 col-lg-offset-5">
                    <a href="<?php echo get_site_url(); ?>/events/" id="see-all-events" class="btn btn-primary"><span class="glyphicon glyphicon-info-sign"></span>See All Events</a>
                </div>
            </div><!-- .row -->

            <div class="supporter-carousel">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <a href="#" class="previous-supporters"><span class="glyphicon glyphicon-chevron-left"></span></a>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                    <a href="#" class="supporter" style="background-image: url(https://www.c2st.org/wp-content/themes/c2st-2017/img/test-images/horizon-pharma.jpg);"></a>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <a href="#" class="supporter" style="background-image: url(https://www.c2st.org/wp-content/themes/c2st-2017/img/test-images/argonne.jpg);"></a>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <a href="#" class="supporter" style="background-image: url(https://www.c2st.org/wp-content/themes/c2st-2017/img/test-images/adler.jpg);"></a>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="#" class="supporter" style="background-image: url(https://www.c2st.org/wp-content/themes/c2st-2017/img/test-images/field-museum.jpg);"></a>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <a href="#" class="next-supporters"><span class="glyphicon glyphicon-chevron-right"></span></a>                
                </div>
            </div>
        </div><!-- .container -->
    </div><!-- .page-section -->

        <!-- <div class="row see-all-events">
            <div class="col-lg-2 col-lg-offset-5">
                <a href="http://c2st.dev/events/" id="see-all-events" class="btn btn-primary"><span class="glyphicon glyphicon-info-sign"></span>See All Events</a>
            </div>
        </div>
    </div>
</div> -->


    <!-- </div><!-- .container -->
</section>

<?php get_footer(); ?>
