<?php

	/*
	 *	Post Setup
	 */
	function cl_setup_postdata( $post_object ) {
		
		if(! is_admin() ) {
			
			$cached = wp_cache_get( 'post_obj_' . $post_object->ID, 'post_objs' );
			
			if( false === $cached ) {
					
				$post_object->post_type_object = get_post_type_object( get_post_type() );
				
				$temp = get_fields( $post_object->ID );
				
				if(! empty( $temp ) ) {
					foreach( $temp as $key => $value ) {
						if(! empty( $key ) ) {
				        	$post_object->$key = $value;
				        }
				    }
			    }
			    
			    wp_cache_set( 'post_obj_' . $post_object->ID, $post_object, 'post_objs' );
			    
			} else {
				$post_object = $cached;
								
			}
		
		}
		
		return $post_object;
	}
	
	
