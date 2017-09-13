<?php
/**
 * C2ST 2017 Theme Customizer
 *
 * @package C2ST_2017
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

// add_action( 'after_setup_theme', 'c2st_2017_after_setup_theme', 10 ); 
// // Parent theme uses the default priority of 10, so
// // use a priority of 11 to load after the parent theme.

// function c2st_2017_after_setup_theme()
// {
//     remove_theme_support('custom-background'); 
//     // remove_theme_support('widget-area'); 
//     // remove_theme_support('custom-colors');
// }


function c2st_2017_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize -> remove_section( 'colors' );
	$wp_customize -> remove_section( 'background_image' );

	$wp_customize -> add_section( 'footer_options', array(
		'title' => __( 'Footer Options' ),
		'description' => __( 'Modify footer content here' ),
		'panel' => '', // Not typically needed.
		'priority' => 105,
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
	) );

	$wp_customize->add_setting( 'email_signup_url', array(
		'default' => 'https://visitor.r20.constantcontact.com/d.jsp?llr=4robuocab&amp;p=oi&amp;m=1102149892671&amp;sit=edw9ypldb&amp;f=0a0a2dfa-e9dd-492a-a572-03c724f6fcd3',
	) );

	$wp_customize->add_setting( 'address_line_1', array(
		'default' => 'The Chicago Council on Science and Technology',
	) );

	$wp_customize->add_setting( 'address_line_2', array(
		'default' => 'c/o llinois Institute of Technology',
	) );

	$wp_customize->add_setting( 'address_line_3', array(
		'default' => '10 W 35th St, 10th Floor',
	) );

	$wp_customize->add_setting( 'address_line_4', array(
		'default' => 'Chicago, IL 60616 ',
	) );

	$wp_customize->add_setting( 'telephone_number', array(
		'default' => '1+312-567-5835',
	) );

	$wp_customize->add_setting( 'fax_number', array(
		'default' => '312-567-5818',
	) );

	$wp_customize->add_setting( 'email_address', array(
		'default' => 'info@C2ST.org',
	) );


	$wp_customize->add_setting( 'footer_donation_text', array(
		'default' => 'C2ST is a nonprofit organization with 501 (c) 3 tax status. Your donation is tax deductible as provided by law.',
	) );

	$wp_customize->add_control( 'email_signup_url', array(
		'label' => __( 'Email Signup URL' ),
		'section' => 'footer_options',
		'settings' => 'email_signup_url',
	) );

	$wp_customize->add_control( 'address_line_1', array(
		'label' => __( 'Address Line 1' ),
		'section' => 'footer_options',
		'settings' => 'address_line_1',
	) );

	$wp_customize->add_control( 'address_line_2', array(
		'label' => __( 'Address Line 2' ),
		'section' => 'footer_options',
		'settings' => 'address_line_2',
	) );

	$wp_customize->add_control( 'address_line_3', array(
		'label' => __( 'Address Line 3' ),
		'section' => 'footer_options',
		'settings' => 'address_line_3',
	) );

	$wp_customize->add_control( 'address_line_4', array(
		'label' => __( 'Address Line 4' ),
		'section' => 'footer_options',
		'settings' => 'address_line_4',
	) );

	$wp_customize->add_control( 'telephone_number', array(
		'label' => __( 'Telephone Number' ),
		'section' => 'footer_options',
		'settings' => 'telephone_number',
	) );

	$wp_customize->add_control( 'fax_number', array(
		'label' => __( 'Fax Number' ),
		'section' => 'footer_options',
		'settings' => 'fax_number',
	) );

	$wp_customize->add_control( 'email_address', array(
		'label' => __( 'Email Address' ),
		'type' => 'email',
		'section' => 'footer_options',
		'settings' => 'email_address',
	) );

	$wp_customize->add_control( 'footer_donation_text', array(
		'label' => __( 'Footer Donation Text' ),
		'type' => 'textarea',
		'section' => 'footer_options',
		'settings' => 'footer_donation_text',
	) );

	// $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'c2st_2017_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function c2st_2017_customize_preview_js() {
	wp_enqueue_script( 'c2st_2017_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'c2st_2017_customize_preview_js' );
