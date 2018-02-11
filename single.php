<?php
/**
 * Single Post Template
 *
 * Child Theme Name: OBM-Genesis-Child
 * Author: Orange Blossom Media
 * Url: https://orangeblossommedia.com/
 *
 * @package OBM-Genesis-Child
 */

// Remove the post info function.
// remove_action( 'genesis_entry_header', 'genesis_post_info' 12 );

/**
 * Customize the entry meta in the entry header (requires HTML5 theme support)
 *
 * @param string $post_info A string of shortcodes for post info to display.
 */
function sp_post_info_filter( $post_info ) {
	$post_info = '[post_date] by [post_author_posts_link] [post_comments] [post_edit]';
	return $post_info;
}
add_filter( 'genesis_post_info', 'sp_post_info_filter' );

// Remove the post meta function.
// remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

/**
 * Customize the entry meta in the entry footer (requires HTML5 theme support)
 *
 * @param string $post_meta A string of shortcodes for post meta to display.
 */
function sp_post_meta_filter( $post_meta ) {
	$post_meta = '[post_categories] [post_tags]';
	return $post_meta;
}
add_filter( 'genesis_post_meta', 'sp_post_meta_filter' );

// Add post navigation (requires HTML5 theme support).
add_action( 'genesis_after_entry_content', 'genesis_prev_next_post_nav', 5 );

genesis();
