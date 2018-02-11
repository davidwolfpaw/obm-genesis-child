<?php
/**
 * CHILD SETUP FUNCTIONS
 *
 * This file contains functions that setup the child theme,
 * such as registering and enqueueing scripts and styles.
 *
 * Child Theme Name: OBM-Genesis-Child
 * Author: Orange Blossom Media
 * Url: https://orangeblossommedia.com/
 *
 * @package OBM-Genesis-Child
 */

/************* SCRIPTS & ENQEUEING *************/

/**
 * Loading modernizr and jquery, and reply script.
 */
function obm_scripts_and_styles() {

	// register our stylesheet.
	wp_register_style( 'obm-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );

	// Font Awesome http://fontawesome.com.
	wp_register_script( 'fontawesome5', get_stylesheet_directory_uri() . '/js/fontawesome-all.min.js', '', '5.0.2' );

	// Register scripts to load in site header.
	wp_register_script( 'obm-modernizr', get_stylesheet_directory_uri() . '/js/modernizr.custom.min.js', '', '3.3.1', true );

	// Register scripts to load in site footer.
	wp_register_script( 'obm-js', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1.0.0', true );
	wp_register_script( 'obm-sidr', get_stylesheet_directory_uri() . '/js/jquery.sidr.min.js', array( 'jquery' ), '2.2.1', true );
	wp_register_script( 'obm-responsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );

	// Enqueue styles.
	wp_enqueue_style( 'obm-stylesheet' );

	// Enqueue scripts.
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'obm-js' );
	wp_enqueue_script( 'obm-modernizr' );
	wp_enqueue_script( 'obm-sidr' );
	wp_enqueue_script( 'fontawesome5' );
	// wp_enqueue_script( 'obm-responsive-menu' );

	// deregister the superfish scripts.
	wp_deregister_script( 'superfish' );
	wp_deregister_script( 'superfish-args' );

}

/**
 * Setup FontAwesome 5 SVGs for use.
 */
add_action( 'wp_head', function() {
	echo '<script>FontAwesomeConfig = { searchPseudoElements: true };</script>';
}, 1 );

/**
 * Defer loading of scripts.
 *
 * @param string $tag The tag of the script.
 * @param string $handle The handle of the script.
 * @param string $src The source of the script.
 */
function obm_defer_scripts( $tag, $handle, $src ) {

	// The handles of the enqueued scripts we want to defer.
	$defer_scripts = array(
		'obm-js',
		'obm-modernizr',
		'obm-sidr',
		'fontawesome5',
	);

	if ( in_array( $handle, $defer_scripts, true ) ) {
		return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
	}

	return $tag;
}
add_filter( 'script_loader_tag', 'obm_defer_scripts', 10, 3 );


/************* OTHER SETUP FUNCTIONS *************/

/**
 * Avoid checking for updates from the WordPress repo
 * Useful if your theme name is duplicated in the repo
 *
 * Credit: Mark Jaquith.
 * http://markjaquith.wordpress.com/2009/12/14/excluding-your-plugin-or-theme-from-update-checks/
 *
 * @param string $r return.
 * @param string $url The URL of the theme.
 */
function obm_dont_update( $r, $url ) {
	if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check' ) ) {
		return $r; // Not a theme update request. Bail immediately.
	}
	$themes = unserialize( $r['body']['themes'] );
	unset( $themes[ get_option( 'template' ) ] );
	unset( $themes[ get_option( 'stylesheet' ) ] );
	$r['body']['themes'] = serialize( $themes );
	return $r;
}
