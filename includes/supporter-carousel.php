<div class="supporter-carousel">
    <div class="supporter-carousel__navigation previous-supporters">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </div>
    <div class="supporter-carousel__items">
        <?php
        $supporters = get_posts( array(
            'posts_per_page'     => -1,
            'post_type'          => 'supporter',
        ) );
        foreach ( $supporters as $supporter ) {

            $logo = get_field( "supporter_logo", $supporter->ID );
            $name = $supporter->post_title;
            echo '<div class="supporter-carousel__item">';
            echo $logo ?
                 '<img alt="' . $name . '" src="' . $logo . '"/>' :
                 '<h2 class="supporter-name">' . $name . '</h2>';
            echo '</div>';
        }
        ?>
        
    </div>
    <div class="supporter-carousel__navigation next-supporters">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </div>
</div>
