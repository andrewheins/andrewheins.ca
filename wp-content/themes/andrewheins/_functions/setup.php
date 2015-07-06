<?php

	/* 
	 * Set and Modify WordPress Settings Here
	 */



/* ==========================================================================
   Theme Support
   ========================================================================== */
   
	function register_theme_support() {
		add_theme_support( 'post-thumbnails' ); 
		add_theme_support( 'menus' ); 
	}
	
	add_action( 'after_setup_theme', 'register_theme_support' );



/* ==========================================================================
   General Settings
   ========================================================================== */

	/*
	 * Asset Path
	 */

	define("ASSET_PATH", get_template_directory_uri() . "/_assets"); // Global constant definition
	function cl_asset_path() { echo ASSET_PATH; } // Wrapper for using this constant in templates with normal WP style
	
	
	
/* ==========================================================================
   WordPress Cleanup
   ========================================================================== */

	/*
	 * Remove Header Cruft
	 */
	 
	function remove_header_info() {
	    remove_action('wp_head', 'rsd_link');
	    remove_action('wp_head', 'wlwmanifest_link');
	    remove_action('wp_head', 'wp_generator');
	    remove_action('wp_head', 'start_post_rel_link');
	    remove_action('wp_head', 'index_rel_link');
	    remove_action('wp_head', 'adjacent_posts_rel_link');
	    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
	}
	
	add_action('init', 'remove_header_info');
	
	
	
	/*
	 * Remove Admin Bar for all users outside admin section
	 */
	 
	if( !is_admin() ) {
		add_filter('show_admin_bar', '__return_false');
	}
	
	
/* ==========================================================================
   Details and Nicities
   ========================================================================== */
   
	/*
	 * Customize Logo on Login Screen
	 */

	function my_login_head() {
		echo("
		<style>
		body.login #login h1 a {
			background: url('".get_bloginfo('template_url')."/images/logo-login.gif') no-repeat scroll center top transparent;
			height: 90px;
			width: 400px;
		}
		</style>
		");
	}
	
	// add_action("login_head", "my_login_head");



	/*
	 * Favicon for Admin and Login Pages
	 */

	function add_favicon() {
		$favicon_url = get_stylesheet_directory_uri() . '/_assets/img/favicon.ico';
		echo '<link rel="icon" href="' . $favicon_url . '"  sizes="16x16 32x32" type="image/vnd.microsoft.icon" />';
	}
	  
	add_action('login_head', 'add_favicon');
	add_action('admin_head', 'add_favicon');
	
	
	
	/*
	 * Simpler Excerpt More
	 */
	
	function new_excerpt_more( $more ) {
		return '...';
	}
	
	add_filter('excerpt_more', 'new_excerpt_more');



/* ==========================================================================
   WordPress Settings
   ========================================================================== */
	
	/*
	 * Image Sizes
	 */
	 
	// add_image_size( "small-cropped", 	320, 240, true );



/* ==========================================================================
   WordPress Settings
   ========================================================================== */
   
	if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title' 	=> 'General Settings',
			'menu_title'	=> 'General Settings',
			'menu_slug' 	=> 'general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
	
	}

/* ==========================================================================
   Disable Pingbacks
   ========================================================================== */
	
	add_filter( 'xmlrpc_methods', 'remove_xmlrpc_pingback_ping' );
	function remove_xmlrpc_pingback_ping( $methods ) {
	   unset( $methods['pingback.ping'] );
	   return $methods;
	} ;

/* ==========================================================================
   Scripts and Styles
   ========================================================================== */
   

	/*
	 * Load All Scripts via enqueue
	 */
	 
	function cl_scripts(){
	
		wp_register_script(
			"general",
			ASSET_PATH . '/js/output/global.min.js', // Pre-minified by Grunt
			false,
			"0.1",
			true
		);
		wp_enqueue_script("general");
	
	}
	
	add_action('wp_enqueue_scripts', 'cl_scripts');