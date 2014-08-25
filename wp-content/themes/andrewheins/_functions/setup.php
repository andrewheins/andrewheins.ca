<?php

	/* 
	 * Set and Modify WordPress Settings Here
	 */



/* ==========================================================================
   Theme Support
   ========================================================================== */
   
	add_theme_support( 'post-thumbnails' ); 



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
   Scripts and Styles
   ========================================================================== */
   
	/*
	 * Enqueue Javascript from CDN
	 */

	function cl_enqueue_jquery() {
		if (!is_admin()) {
			wp_deregister_script('jquery');
			wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', false, '1.9.1', true);
			wp_enqueue_script('jquery');
		}
	}

	add_action( 'wp_enqueue_scripts', 'cl_enqueue_jquery', 9 );



	/*
	 * Load All Scripts via enqueue
	 */
	 
	function cl_scripts(){
	
		// In Production, add analytics to the header
		if (ENV === "PRODUCTION") {
			wp_register_script(
				"analytics",
				ASSET_PATH . '/js/output/analytics.min.js'
			);
			wp_enqueue_script("analytics");
		}

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