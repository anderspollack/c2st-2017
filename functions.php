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
	add_theme_support( 'custom-background', apply_filters( 'c2st_2017_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

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
	
	wp_enqueue_style( 'c2st-2017-style', get_stylesheet_uri() );

	wp_enqueue_script( 'c2st-2017-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'c2st-2017-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
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
    $items .= '<li class="search-form">' . get_search_form( false ) . '</li>';
    return $items;
}