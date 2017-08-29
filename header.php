<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package C2ST_2017
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Karla:400,700|Montserrat:700" rel="stylesheet">

<!-- For Facebook Share Buttons -->
<!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
<meta property="og:url"           content="<?php echo the_permalink(); ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo the_title(); ?>" />
<meta property="og:description"   content="<?php get_the_content(); ?>" />
<meta property="og:image"         content="<?php echo esc_url( the_post_thumbnail_url() ); ?>" />
<!-- End FB Share Meta -->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- For Facebook Share Buttons -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- End FB Share Buttons Script -->

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'c2st-2017' ); ?></a>

	<nav id="site-navigation" class="main-navigation" role="navigation">
		<a class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" role="button">
			<span class="glyphicon glyphicon-chevron-down"></span>
			<?php esc_html_e( 'Navigation', 'c2st-2017' ); ?>
		</a>
		<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'depth'			 => '1'
			) );
		?>
	</nav><!-- #site-navigation -->

	<header id="masthead" class="site-header page-section" role="banner">
		<div class="site-branding">
			<div id="site-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
			</div>
			<?php
			// if ( is_front_page() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php 
			// else : ?>
				<!-- <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p> -->
			<?php
			// endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
