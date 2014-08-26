<?php

	/* 
	 * Functions that modify, filter, sort or search for data
	 */

	 function cl_format_date( $post_date ) {
		 return date( 'F j, Y \a\t g:iA', strtotime( $post_date ) );
	 }