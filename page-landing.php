<?php
/**
 * Template Name: Landing Page
 *
 * Child Theme Name: OBM-Genesis-Child
 * Author: Orange Blossom Media
 * Url: https://orangeblossommedia.com/
 *
 * @package OBM-Genesis-Child
 */

// Execute custom home page. If no widgets active, then loop.
add_action( 'genesis_meta', 'obm_landing_page' );

/**
 * Controls display of landing page
 */
function obm_landing_page() {

	// Force full width content.
	add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

	// Remove header.
	remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
	remove_action( 'genesis_header', 'genesis_do_header' );
	remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

	// Remove navigation.
	remove_action( 'genesis_after_header', 'genesis_do_nav' );
	remove_action( 'genesis_after_header', 'genesis_do_subnav' );

	// Remove footer.
	remove_action( 'genesis_before_footer', 'genesis_do_footer_widget_area' );

}

genesis();
