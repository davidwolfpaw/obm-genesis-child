<?php
/*
 * Single Post Template
 *
 * Child Theme Name: OBM-Geneis-Child for Genesis v2.1.2
 * Author: Orange Blossom Media
 * Url: http://orangeblossommedia.com/
 */

// Remove the post info function and/or reposition
// remove_action( 'genesis_entry_header', 'genesis_post_info' 12 );
// add_action( 'genesis_entry_header', 'genesis_post_info' 12 );

// Customize the entry meta in the entry header (requires HTML5 theme support)
add_filter( 'genesis_post_info', 'sp_post_info_filter' );
function sp_post_info_filter($post_info) {
	$post_info = '[post_date] by [post_author_posts_link] [post_comments] [post_edit]';
	return $post_info;
}

// Remove the post meta function and/or reposition
// remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
// add_action( 'genesis_entry_header', 'genesis_post_meta' );

// Customize the entry meta in the entry footer (requires HTML5 theme support)
add_filter( 'genesis_post_meta', 'sp_post_meta_filter' );
function sp_post_meta_filter($post_meta) {
	$post_meta = '[post_categories] [post_tags]';
	return $post_meta;
}

// Add post navigation (requires HTML5 theme support)
add_action( 'genesis_after_entry_content', 'genesis_prev_next_post_nav', 5 );


genesis();