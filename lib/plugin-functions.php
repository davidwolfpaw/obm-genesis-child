<?php
/*
 * PLUGIN FUNCTIONS
 *
 * This file holds functions that will transition to a plugin.
 *
 * Child Theme Name: OBM-Genesis-Child
 * Author: Orange Blossom Media
 * Url: https://orangeblossommedia.com/
 */


// Remove Genesis Widgets
add_action( 'widgets_init', 'obm_remove_genesis_widgets', 20 );
function obm_remove_genesis_widgets() {
	// unregister_widget( 'Genesis_eNews_Updates' );
	// unregister_widget( 'Genesis_Featured_Page' );
	// unregister_widget( 'Genesis_Featured_Post' );
	// unregister_widget( 'Genesis_Latest_Tweets_Widget' );
	// unregister_widget( 'Genesis_Menu_Pages_Widget' );
	// unregister_widget( 'Genesis_User_Profile_Widget' );
	// unregister_widget( 'Genesis_Widget_Menu_Categories' );
}


// Hide media library items uploaded by other users on upload, unless user is admin
add_filter( 'posts_where', 'obm_hide_media_library' );
function obm_hide_media_library( $where ){

    global $current_user;

    if( is_user_logged_in() && !current_user_can( 'manage_options' ) ){
         if( isset( $_POST['action'] ) && ( $_POST['action'] == 'query-attachments' ) ){
            $where .= ' AND post_author='.$current_user->data->ID;
        }
    }

    return $where;

}


// Disable default dashboard widgets for all users
add_action( 'admin_menu', 'obm_disable_dashboard_widgets' );
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

	    $wp_admin_bar->remove_menu( 'wp-logo' );		// WordPress logo
	    $wp_admin_bar->remove_menu( 'about' );			// About WordPress link
	    $wp_admin_bar->remove_menu( 'wporg' );			// WordPress.org link
	    $wp_admin_bar->remove_menu( 'documentation' );	// WordPress documentation link
	    $wp_admin_bar->remove_menu( 'support-forums' );	// Support forums link
	    $wp_admin_bar->remove_menu( 'feedback' );		// Feedback link
	    $wp_admin_bar->remove_menu( 'site-name' );		// Site name menu
	    $wp_admin_bar->remove_menu( 'view-site' );		// View site link
	    $wp_admin_bar->remove_menu( 'updates' );		// Updates link
	    $wp_admin_bar->remove_menu( 'comments' );		// Comments link
	    $wp_admin_bar->remove_menu( 'new-content' );	// Content link
	    $wp_admin_bar->remove_menu( 'my-account' );		// User details tab
	    $wp_admin_bar->remove_menu( 'my-sites' );		// User details tab

	}

}


// Alternatively, remove the admin bar entirely for non-admins
add_action( 'after_setup_theme', 'obm_remove_admin_bar' );
function obm_remove_admin_bar() {

	if (!current_user_can( 'manage_options' )) {

		show_admin_bar(false);

	}

}
