<?php

	/*
	 * Modifications to WordPress routing go here.
	 * Order is important - first = more important
	 */
	 
	 
	 
/* ==========================================================================
   Rewrites
   Rewrite URLs here. Useful for providing additional data to pages
   ========================================================================== */	 

	function setup_rewrite_rules() {

		/*
		add_rewrite_rule(
			'foo/?(.+)',
			'index.php?pagename=foo&bar=$matches[1]',
			'top'
		);
		*/
	
	}
	 
	add_action(
		'init',
		'setup_rewrite_rules'	
	);
	

/* ==========================================================================
   Query Variables
   Any custom query variable you use above must be declared below.
   ========================================================================== */

	function setup_query_vars( $public_query_vars ) {
	
		$public_query_vars = array_merge( $public_query_vars, array(
			// 'bar',
		) );
		
		return $public_query_vars;
		
	}
		
	add_filter(
		'query_vars',
		'setup_query_vars'
	);
	