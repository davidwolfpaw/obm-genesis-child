<?php
/**
 * ADMIN FUNCTIONS
 *
 * This file holds admin area and dashboard functions.
 *
 * Child Theme Name: OBM-Genesis-Child
 * Author: Orange Blossom Media
 * Url: https://orangeblossommedia.com/
 *
 * @package OBM-Genesis-Child
 */

/* --- DASHBOARD WIDGETS AND MENUS --- */


/**
 * Custom Dashboard Footer.
 */
function obm_custom_admin_footer() {
	echo '<span id="footer-thankyou">Developed by <a href="http://orangeblossommedia.com" target="_blank">Orange Blossom Media</a></span>. Built using <a href="http://studiopress.com" target="_blank">the Genesis Framework</a> on <a href="http://wordpress.org">WordPress</a>.';
}
add_filter( 'admin_footer_text', 'obm_custom_admin_footer' );


/* --- GENESIS --- */

// Remove Genesis SEO Settings.
remove_action( 'admin_menu', 'genesis_add_inpost_seo_box' );
remove_theme_support( 'genesis-seo-settings-menu' );

// Remove Taxonomy Options.
remove_action( 'admin_init', 'genesis_add_taxonomy_archive_options' );
remove_action( 'admin_init', 'genesis_add_taxonomy_seo_options' );
remove_action( 'admin_init', 'genesis_add_taxonomy_layout_options' );

// Remove Genesis Layout Settings.
remove_theme_support( 'genesis-inpost-layouts' );

// Remove Genesis menu link.
// remove_theme_support( 'genesis-admin-menu' );


/*
 * CUSTOM LOGIN
 */

/**
 * Custom login stylesheet, loads only on login page.
 */
function obm_login_css() {
	echo '<link rel="stylesheet" id="custom_wp_admin_css"  href="' . get_stylesheet_directory_uri() . '/css/login.css" type="text/css" media="all" />';
}
add_action( 'login_enqueue_scripts', 'obm_login_css' );

/**
 * Change login link from wordpress.org to the site url.
 */
function obm_login_url() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'obm_login_url' );

/**
 * Change alt text on logo to site title.
 */
function obm_login_title() {
	return get_option( 'blogname' );
}
add_filter( 'login_headertitle', 'obm_login_title' );

