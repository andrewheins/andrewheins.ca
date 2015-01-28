<?php

	/*
	 * Functions that embed or include repeatable code go here.
	 */

/* ==========================================================================
   Basic Embeds
   ========================================================================== */

	function cl_embed_post( $post_type, $data = null ) { 
	
		global $post;
		
		$post = $data ?: $post;
		
		$slug = '_embeds/' . $post_type . '.php';
		
		if( is_single() ) {
			$slug = '_embeds/' . $post_type . '-single.php';	
		}
		
		include( locate_template( $slug ) );
		
	}
	
	function cl_embed_no_content( $post_type = null ) {
		
		$slug = '_embeds/no-content.php';
		
		if( !empty( $post_type) ) {
			$slug = '_embeds/no-content-' . $post_type . '.php';
		}
		
		include( locate_template( $slug ) );
	}
	
	function cl_embed_content_layer( $layer ) {
		$slug = '_embeds/no-content.php';
		
		$layout = $layer['acf_fc_layout'];
		
		if( !empty( $layout ) ) {
			$slug = '_embeds/layer-' . $layout . '.php';
		}
		
		include( locate_template( $slug ) );
	}