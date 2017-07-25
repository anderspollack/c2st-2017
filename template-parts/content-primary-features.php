<?php 
$home_page_primary_features = new WP_Query( array(
    'post_type' => array( 'post', 'event' ),
    'category_name' => 'home-page-primary-feature'
) );
if ( $home_page_primary_features -> have_posts() ): while ( $home_page_primary_features -> have_posts() ) : 
	$home_page_primary_features -> the_post();
    $featured_glyphicon = get_field('featured_glyphicon');
    $featured_item_type = get_field('featured_item_type');
    $event_date = get_field('event_date', false, false);
    $event_date = new DateTime( $event_date ); ?>

    <section class="home-page-primary-feature">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-8 col-sm-offset-1 col-md-offset-2 col-lg-offset-2">
                <p class="feature-label">
                    <span class="glyphicon <?php echo $featured_glyphicon; ?>"></span> Featured <?php echo $featured_item_type; ?>
                </p>
                <h2 class="content-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo the_title(); ?></a></h2>
                <?php 
                if ( has_post_thumbnail() ): ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="content-image" style="background-image: url(<?php echo esc_url( the_post_thumbnail_url() ); ?>);"></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-md-3 col-lg-3 col-sm-offset-1 col-md-offset-2 col-lg-offset-2">
                <p class="content-subtitle event-date">
					<?php 
					if ( get_field( 'event_date' ) ) :
						echo $event_date -> format( 'l, F j, Y' );
					else: echo 'Date TBD';
					endif; ?>
				</p>
				<?php if ( get_field( 'start_time' ) ) : ?>
					<p class="content-subtitle event-time">
					<?php 
					the_field( 'start_time' );
					if ( get_field( 'end_time' ) ): 
						echo' – ' .  the_field( 'end_time' );
					endif; ?>
					</p>
				<?php endif; ?>
				<p class="content-subtitle event-location">
					<?php 
					if ( get_field( 'event_location_address' ) ): 
						the_field( 'event_location_name' );
					else: echo 'Location TBD';
					endif; ?>
				</p>
				<?php if ( get_field( 'event_location_address' ) ) : ?>
					<p class="content-subtitle event-address">
						<?php the_field( 'event_location_address' ); ?>
					</p>
				<?php endif; ?>
				<?php if ( get_field( 'program_series' ) ) : ?>
					<p class="program-series"><a href="#">
						<?php the_field( 'program_series' ) ?>
					</a></p>
				<?php endif; ?>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-5">
                <p class="content-excerpt"><?php the_content( 'Read more…' ); ?></p>
            </div>
        </div>
    </section>

<?php endwhile; endif; wp_reset_query(); ?>