<?php

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Defines URL rewrite rules
 *
 * Created by Norbert Dreszer.
 * Package: functions
 */
add_action( 'post_updated', 'ic_rewrite_product_listing_change', 10, 2 );
add_action( 'delete_post', 'ic_rewrite_product_listing_change' );
add_action( 'trashed_post', 'ic_rewrite_product_listing_change' );

/**
 * Enables permalink rewrite when editing the product listing page
 *
 * @param type $post_id
 * @param type $post
 * @return type
 */
function ic_rewrite_product_listing_change( $post_id, $post = null ) {
	if ( (isset( $post->post_type ) && $post->post_type == 'page') || !isset( $post->post_type ) ) {
		$id = get_product_listing_id();
		if ( $post_id == $id ) {
			permalink_options_update();
		}
	}
	return;
}
