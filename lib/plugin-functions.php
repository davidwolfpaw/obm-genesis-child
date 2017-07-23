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