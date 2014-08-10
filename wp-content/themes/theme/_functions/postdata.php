<?php

/* ==========================================================================
   Setup Post Meta
   All the meta available on the post object.
   ========================================================================== */

	if(! is_admin() ) {
		add_filter( 'the_posts', 'cl_setup_global_postdata' );
	}
	
	/*
	 * Setup ALL the posts
	 */
	 
	function cl_setup_global_postdata( $array ) {
		$full_posts = array();
		
		foreach( $array as $post_obj ) {
			$full_posts[] = cl_setup_postdata( $post_obj );

		}

		return $full_posts;

	}



	/*
	 * Post One Post
	 * Caching conveniently included
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