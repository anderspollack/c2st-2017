<p class="content-subheading">

<?php 
// Event Date & Time
if ( get_field( 'event_date_time' ) ) : ?>

    <span class="event-date"><?php echo the_field( 'event_date_time' ); ?></span>
    <br>

<?php else : ?>

    <span class="event-date">Date TBD</span>
    <br>

<?php endif; ?>

<?php
// Event Location 
if ( get_post_type() === 'event' && get_field( 'location_name' ) ) : ?>

    <span class="event-location"><?php echo the_field( 'location_name' ); ?></span>
</p><!-- .content-subheading -->

<?php else : ?>

</p><!-- .content-subheading -->

<?php endif; ?>

<?php 
if ( get_field( 'address' ) ) : ?>

<p class="content-subheading">
    <span class="event-location">

    <?php 
    $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
    $Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android"); 

    if ( $iPad || $iPhone ): ?>

        <a href="http://maps.apple.com/?q=<?php the_field( 'address' ); ?>" target="_blank">

        <?php echo get_field( 'address' )[ 'address' ]; ?>

        </a>

    <?php else: ?>

        <a href="http://maps.google.com/?q=<?php the_field( 'address' ); ?>" target="_blank">

        <?php echo get_field( 'address' )['address'] ; ?>

        </a>

    <?php endif; ?>
                
    </span><!-- .event-location -->
</p><!-- .content-subheading -->

<?php endif; ?>

<!-- <p class="content-subheading"> -->
    <!-- Program Series -->
<!-- </p> -->