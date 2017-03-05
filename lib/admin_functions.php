<?php
/*
 * ADMIN FUNCTIONS
 *
 * This file holds admin area and dashboard functions.
 *
 * Child Theme Name: OBM-Geneis-Child
 * Author: Orange Blossom Media
 * Url: https://orangeblossommedia.com/
 */

/* --- DASHBOARD WIDGETS AND MENUS --- */

// Disable default dashboard widgets for all users
add_action('admin_menu', 'obm_disable_dashboard_widgets');
function obm_disable_dashboard_widgets() {

	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );			// Activity Widget
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );			// Right Now Widget
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' );	// Comments Widget
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );		// Incoming Links Widget
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );			// Plugins Widget
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'core' );		// Quick Press Widget
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );		// Recent Drafts Widget
	remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );			// Wordpress Blog
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );			// Other Wordpress News
	remove_meta_box( 'jetpack_summary_widget', 'dashboard', 'core' );		// Jetpack

}


// Remove dashboard menu items for non-admins
add_action( 'admin_init', 'obm_remove_menus' );
function obm_remove_menus(){

	if ( !current_user_can( 'manage_options' ) ) {

		remove_menu_page( 'index.php' );			// Dashboard
		remove_menu_page( 'upload.php' );			// Media
		remove_menu_page( 'jetpack' );				// Jetpack
		remove_menu_page( 'edit.php' );				// Posts
		remove_menu_page( 'edit-comments.php' );	// Comments
		remove_menu_page( 'plugins.php' );			// Plugins
		remove_menu_page( 'themes.php' );			// Appearance
		remove_menu_page( 'tools.php' );			// Tools
		remove_menu_page( 'options-general.php' );	// Settings

	}

}


// Remove toolbar links for non-admins
add_action( 'wp_before_admin_bar_render', 'obm_custom_toolbar', 999 );
function obm_custom_toolbar() {

    global $wp_admin_bar;

	if ( !current_user_can( 'manage_options' ) ) {

	    $wp_admin_bar->remove_menu('wp-logo');			// WordPress logo
	    $wp_admin_bar->remove_menu('about');			// About WordPress link
	    $wp_admin_bar->remove_menu('wporg');			// WordPress.org link
	    $wp_admin_bar->remove_menu('documentation');	// WordPress documentation link
	    $wp_admin_bar->remove_menu('support-forums');	// Support forums link
	    $wp_admin_bar->remove_menu('feedback');			// Feedback link
	    $wp_admin_bar->remove_menu('site-name');		// Site name menu
	    $wp_admin_bar->remove_menu('view-site');		// View site link
	    $wp_admin_bar->remove_menu('updates');			// Updates link
	    $wp_admin_bar->remove_menu('comments');			// Comments link
	    $wp_admin_bar->remove_menu('new-content');		// Content link
	    $wp_admin_bar->remove_menu('my-account');		// User details tab
	    $wp_admin_bar->remove_menu('my-sites');			// User details tab

	}

}


// Alternatively, remove the admin bar entirely for non-admins
add_action('after_setup_theme', 'obm_remove_admin_bar');
function obm_remove_admin_bar() {

	if (!current_user_can( 'manage_options' )) {

		show_admin_bar(false);

	}

}


// Custom Dashboard Footer
add_filter( 'admin_footer_text', 'obm_custom_admin_footer' );
function obm_custom_admin_footer() {
	echo '<span id="footer-thankyou">Developed by <a href="http://orangeblossommedia.com" target="_blank">Orange Blossom Media</a></span>. Built using <a href="http://studiopress.com" target="_blank">the Genesis Framework</a> on <a href="http://wordpress.org">WordPress</a>.';
}


/* --- GENESIS --- */

// Remove Genesis SEO Settings
remove_action( 'admin_menu', 'genesis_add_inpost_seo_box' );
remove_theme_support( 'genesis-seo-settings-menu' );

// Remove Taxonomy Options
remove_action( 'admin_init', 'genesis_add_taxonomy_archive_options' );
remove_action( 'admin_init', 'genesis_add_taxonomy_seo_options' );
remove_action( 'admin_init', 'genesis_add_taxonomy_layout_options' );

// Remove Genesis Layout Settings
remove_theme_support( 'genesis-inpost-layouts' );

// Remove Genesis menu link
// remove_theme_support( 'genesis-admin-menu' );


/*
 * CUSTOM LOGIN
 */

// Custom login stylesheet, loads only on login page
add_action( 'login_enqueue_scripts', 'obm_login_css' );
function obm_login_css() {
	echo '<link rel="stylesheet" id="custom_wp_admin_css"  href="' . get_stylesheet_directory_uri() . '/css/login.css" type="text/css" media="all" />';
}

// Change login link from wordpress.org to the site url
add_filter( 'login_headerurl', 'obm_login_url' );
function obm_login_url() { return get_bloginfo( 'url' ); }

// Change alt text on logo to site title
add_filter( 'login_headertitle', 'obm_login_title' );
function obm_login_title() { return get_option( 'blogname' ); }

