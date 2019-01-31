<p class="content-subheading date-time">

<?php 
// Event Date
if ( get_field( 'event_date' ) ) : ?>

    <span class="event-date"><?php 

        // echo the_field( 'event_date_time' );
        $date = get_field( 'event_date', false, false );

        // make date object
        $date = new DateTime($date);

        echo $date -> format( 'F j, Y' );

    ?></span><br>

<?php else : ?>

    <span class="event-date">Date TBD</span><br>

<?php endif; ?>

<?php 
// Event Date Time
if ( get_field( 'event_time' ) ) : ?>

    <span class="event-time"><?php echo the_field( 'event_time' );?>

    <?php if ( get_field( 'event_end_time' ) ) : ?>

        <?php 
        $event_end_time = get_field( 'event_end_time' );
        echo ' &ndash; ' . $event_end_time; ?>

        </span><br></p>

    <?php else : ?>

        </span><br></p>

    <?php endif; ?>

<?php endif; ?>

<p class="content-subheading">

<?php
// Event Location 
if ( get_field( 'location_name' ) ) : ?>

    <span class="event-location"><?php echo the_field( 'location_name' ); ?></span><br>

<?php endif; ?>

<?php 
if ( get_field( 'address' ) ) : ?>

    <span class="event-location">

    <?php 
    $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
    $Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android"); 

    if ( $iPad || $iPhone ): ?>

        <a href="http://maps.apple.com/?q=<?php the_field( 'address' ); ?>" target="_blank">

    <?php else: ?>

        <a href="http://maps.google.com/?q=<?php the_field( 'address' ); ?>" target="_blank">

    <?php endif; ?>

        <?php 
        $address = get_field( 'address' );
        echo $address[ 'address' ]; ?>

        </a>
                
    </span><!-- .event-location -->
</p><!-- .content-subheading -->

<?php endif; ?>

<?php if ( get_field( 'registration_url' ) ): ?>

    <p class="content-subheading"><a href="<?php the_field( 'registration_url' ); ?>" target="_blank" class="btn btn-primary"><?php the_field( 'registration_button_text' ); ?></a></p>

<?php endif; ?>

<p class="content-subheading program-series-link">

    <?php 
    $program_series = get_the_terms( get_the_ID(), 'program_series' );

    if ( $program_series ) {
	echo 'Program Series: <br>';
	foreach ($program_series as $term ) {
        echo '<a href="' . get_site_url() . '/program-series/">' . $term->name . '</a>';  
        }
    } ?>

</p>
