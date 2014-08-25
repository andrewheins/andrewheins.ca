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
		
		include( locate_template( '_embeds/' . $post_type . '.php' ) );
		
	}
	
	function cl_embed_no_content( $post_type = null ) {
		
		$slug = '_embeds/no-content.php';
		
		if( !empty( $post_type) ) {
			$slug = '_embeds/no-content-' . $post_type . '.php';
		}
		
		include( locate_template( $slug ) );
	}