<?php 
	
	/*
	 * Instead of using get_posts or query_posts,
	 * you can modify the default query of a request here
	 */

	function index_post_query( $query ) {
	
		if ( !is_admin() && $query->is_main_query() ){
		
		}
		
		return $query;
	
	}
	add_action( 'pre_get_posts', 'index_post_query' );