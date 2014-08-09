<?php 
	
	function index_post_query( $query ) {
	
		if (!is_admin() && $query->is_main_query()){
		
		}
		
		return $query;
	
	}
	add_action( 'pre_get_posts', 'index_post_query' );