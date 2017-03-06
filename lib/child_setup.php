<?php
/*
* CHILD SETUP FUNCTIONS
*
* This file contains functions that setup the child theme,
* such as registering and enqueueing scripts and styles.
*
* Child Theme Name: OBM-Genesis-Child
* Author: Orange Blossom Media
* Url: https://orangeblossommedia.com/
*
*/


/************* SCRIPTS & ENQEUEING *************/


// loading modernizr and jquery, and reply script
function obm_scripts_and_styles() {

   	// register our stylesheet
	wp_register_style( 'obm-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );

    // Font Awesome http://fortawesome.github.io/Font-Awesome
    wp_register_style( 'fontawesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' , array(), '4.7.0', 'all' );

    // Register scripts to load in site header
    wp_register_script( 'obm-modernizr', get_stylesheet_directory_uri() . '/js/modernizr.custom.min.js', '', '3.3.1', true );

    // Register scripts to load in site footer
    wp_register_script( 'obm-js', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1.0.0', true );
    wp_register_script( 'obm-sidr', get_stylesheet_directory_uri() . '/js/jquery.sidr.min.js', array( 'jquery' ), '2.2.1', true );
    wp_register_script( 'obm-responsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );

    // Enqueue styles
    wp_enqueue_style( 'obm-stylesheet' );
    wp_enqueue_style( 'fontawesome' );

    // Enqueue scripts
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'obm-js' );
    wp_enqueue_script( 'obm-modernizr' );
    wp_enqueue_script( 'obm-sidr' );
    // wp_enqueue_script( 'obm-responsive-menu' );

    // deregister the superfish scripts
    wp_deregister_script( 'superfish' );
    wp_deregister_script( 'superfish-args' );

}



/************* OTHER SETUP FUNCTIONS *************/

/*
 * Avoid checking for updates from the WordPress repo
 * Useful if your theme name is duplicated in the repo
 *
 * credit: Mark Jaquith
 * http://markjaquith.wordpress.com/2009/12/14/excluding-your-plugin-or-theme-from-update-checks/
 */
function obm_dont_update( $r, $url ) {
	if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check' ) )
		return $r; // Not a theme update request. Bail immediately.
	$themes = unserialize( $r['body']['themes'] );
	unset( $themes[ get_option( 'template' ) ] );
	unset( $themes[ get_option( 'stylesheet' ) ] );
	$r['body']['themes'] = serialize( $themes );
	return $r;
}