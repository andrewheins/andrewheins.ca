<?php

	/*
	 *	Post Setup
	 */
	function cl_setup_postdata( $post_object ) {
		
		if(! is_admin() ) {
			
			$post_object->post_type_object = get_post_type_object( get_post_type() );
			
			if( $post->post_type === 'post' ) {
				
			}
		
		}
		
		return $post_object;
	}
	
	
