<?php
/**
 * Front Page Template
 *
 * Child Theme Name: OBM-Genesis-Child
 * Author: Orange Blossom Media
 * Url: https://orangeblossommedia.com/
 *
 * @package OBM-Genesis-Child
 */

// Execute custom home page. If no widgets active, then loop.
add_action( 'genesis_meta', 'obm_custom_homepage' );

/**
 * Controls display of homepage
 */
function obm_custom_homepage() {
	add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

	// Remove default page content.
	remove_action( 'genesis_loop', 'genesis_do_loop' );
	add_action( 'genesis_loop', 'obm_do_home_loop' );

}

/**
 * Creates a custom loop for the homepage content.
 */
function obm_do_home_loop() {

}


genesis();
