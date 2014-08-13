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