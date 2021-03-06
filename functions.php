<?php
/**
 * C2ST 2017 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package C2ST_2017
 */

if ( ! function_exists( 'c2st_2017_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function c2st_2017_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on C2ST 2017, use a find and replace
     * to change 'c2st-2017' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'c2st-2017', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'post-formats', array ( 'audio', 'video' ) );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'menu-1' => esc_html__( 'Primary', 'c2st-2017' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-header', array(
        'width' => 2000,
        'height' => 600,
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'c2st_2017_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function c2st_2017_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'c2st_2017_content_width', 640 );
}
add_action( 'after_setup_theme', 'c2st_2017_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function c2st_2017_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'c2st-2017' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'c2st-2017' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'c2st_2017_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function c2st_2017_scripts() {
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    
    wp_enqueue_style( 'c2st-2017-style', get_stylesheet_uri(), array(), filemtime( get_stylesheet_directory() . '/style.css') );

    // add carousel styles
    wp_enqueue_style( 'carousel-styles', get_template_directory_uri() . '/carousel.css');

    wp_enqueue_script( 'c2st-2017-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( 'c2st-2017-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    // Adds Google Maps support for ACF 

    // https://www.aliciaramirez.com/2015/02/advanced-custom-fields-google-maps-tutorial/
    wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCmoUzak5irRGL8wqxf263TFwsucrsUBmM', array(), '3', true );
    wp_enqueue_script( 'google-map-init', get_template_directory_uri() . '/js/google-maps.js', array('google-map', 'jquery'), '0.1', true );

    wp_enqueue_script( 'parallax-banner', get_template_directory_uri() . '/js/parallax-banner.js', array('jquery'), null, true);

    wp_enqueue_script( 'twitter', get_template_directory_uri() . '/js/twitter.js' );

    // https://support.advancedcustomfields.com/forums/topic/google-maps-field-needs-setting-to-add-api-key/
    // wp_register_script( 'googlemaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCmoUzak5irRGL8wqxf263TFwsucrsUBmM',null,null,true );
    // wp_enqueue_script( 'googlemaps' );
        
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( is_front_page() ) {
        wp_enqueue_script( 'supporter-carousel', get_template_directory_uri() . '/js/supporter-carousel.js', array('jquery'), filemtime( get_template_directory() . '/js/supporter-carousel.js'), true );
    }

}
add_action( 'wp_enqueue_scripts', 'c2st_2017_scripts' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function c2st_2017_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'c2st_2017_pingback_header' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Adds a search form to the nav bar http://www.wprecipes.com/how-to-automatically-add-a-search-field-to-your-navigation-menu/
 */
add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );
function add_search_box( $items, $args ) {
    // $items .= '<li class="form-control">' . get_search_form( false ) . '</li>';
    $items .= '<li class="search-form main-navigation-search-form">' . do_shortcode('[searchandfilter id="2159"]') . '</li>';
    return $items;
}

function my_acf_google_map_api( $api ){ 
    $api['key'] = 'AIzaSyCmoUzak5irRGL8wqxf263TFwsucrsUBmM';
    return $api;
}
 
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// Add JQuery UI datepicker 
function add_datepicker_in_footer() { ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('.date').datepicker({
                dateFormat: 'mm-dd-yy'
            });
        });
    </script>
<?php
} // close add_datepicker_in_footer() here
//add an action to call add_datepicker_in_footer function
add_action('wp_footer','add_datepicker_in_footer',10);

// Adds taxonomy filter dropdowns on custom post admin pages
// https://rudrastyh.com/wordpress/filter-posts-by-terms.html
function rudr_posts_taxonomy_filter() {
    global $typenow; // this variable stores the current custom post type
    if( $typenow == 'event' ){ // choose one or more post types to apply taxonomy filter for them if( in_array( $typenow  array('post','games') )
        $taxonomy_names = array('program_series', 'event_types');
        foreach ($taxonomy_names as $single_taxonomy) {
            $current_taxonomy = isset( $_GET[$single_taxonomy] ) ? $_GET[$single_taxonomy] : '';
            $taxonomy_object = get_taxonomy( $single_taxonomy );
            $taxonomy_name = strtolower( $taxonomy_object->labels->name );
            $taxonomy_terms = get_terms( $single_taxonomy );
            if(count($taxonomy_terms) > 0) {
                echo "<select name='$single_taxonomy' id='$single_taxonomy' class='postform'>";
                echo "<option value=''>All $taxonomy_name</option>";
                foreach ($taxonomy_terms as $single_term) {
                    echo '<option value='. $single_term->slug, $current_taxonomy == $single_term->slug ? ' selected="selected"' : '','>' . $single_term->name .' (' . $single_term->count .')</option>'; 
                }
                echo "</select>";
            }
        }
    } else if( $typenow == 'post' ){ // choose one or more post types to apply taxonomy filter for them if( in_array( $typenow  array('post','games') )
        $taxonomy_names = array('content_type');
        foreach ($taxonomy_names as $single_taxonomy) {
            $current_taxonomy = isset( $_GET[$single_taxonomy] ) ? $_GET[$single_taxonomy] : '';
            $taxonomy_object = get_taxonomy( $single_taxonomy );
            $taxonomy_name = strtolower( $taxonomy_object->labels->name );
            $taxonomy_terms = get_terms( $single_taxonomy );
            if(count($taxonomy_terms) > 0) {
                echo "<select name='$single_taxonomy' id='$single_taxonomy' class='postform'>";
                echo "<option value=''>All $taxonomy_name</option>";
                foreach ($taxonomy_terms as $single_term) {
                    echo '<option value='. $single_term->slug, $current_taxonomy == $single_term->slug ? ' selected="selected"' : '','>' . $single_term->name .' (' . $single_term->count .')</option>'; 
                }
                echo "</select>";
            }
        }
    } else if( $typenow == 'person' ){ // choose one or more post types to apply taxonomy filter for them if( in_array( $typenow  array('post','games') )
        $taxonomy_names = array('group');
        foreach ($taxonomy_names as $single_taxonomy) {
            $current_taxonomy = isset( $_GET[$single_taxonomy] ) ? $_GET[$single_taxonomy] : '';
            $taxonomy_object = get_taxonomy( $single_taxonomy );
            $taxonomy_name = strtolower( $taxonomy_object->labels->name );
            $taxonomy_terms = get_terms( $single_taxonomy );
            if(count($taxonomy_terms) > 0) {
                echo "<select name='$single_taxonomy' id='$single_taxonomy' class='postform'>";
                echo "<option value=''>All $taxonomy_name</option>";
                foreach ($taxonomy_terms as $single_term) {
                    echo '<option value='. $single_term->slug, $current_taxonomy == $single_term->slug ? ' selected="selected"' : '','>' . $single_term->name .' (' . $single_term->count .')</option>'; 
                }
                echo "</select>";
            }
        }
    }
}
 
add_action( 'restrict_manage_posts', 'rudr_posts_taxonomy_filter' );

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
