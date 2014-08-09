<?php

	/*
	 * Asset Path
	 */

	define("ASSET_PATH", get_template_directory_uri() . "/_assets"); // Global constant definition
	function cl_asset_path() { echo ASSET_PATH; } // Wrapper for using this constant in templates with normal WP style



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
	 * Styles and Scripts
	 */

	function cl_styles(){
		require_once('_lib/lessc.inc.php');

		$global_styles_path = get_template_directory() . "/_assets/css/main.less";
		$target_path = get_template_directory() . "/style.css";

		
		if (ENV === "DEVELOPMENT") { // Only compile in development
			$less = new lessc;
			$less->compileFile( $global_styles_path, $target_path );
		}

		wp_register_style(
			'global-styles',
			get_template_directory_uri() . "/style.css",
			array(),
			"1.0"
		);
		wp_enqueue_style('global-styles');
	}
	add_action('wp_enqueue_scripts', 'cl_styles');

	// function cl_scripts(){
		
	// 	// In Production, add analytics to the header
	// 	if (ENV === "PRODUCTION") {
	// 		wp_register_script(
	// 			"analytics",
	// 			ASSET_PATH . '/js/analytics.js'
	// 		);
	// 		wp_enqueue_script("analytics");
	// 	}
		
	// 	// In all environments, add functional scripts to the bottom of the page
	// 	$scripts = array(
	// 		"main"						=> "main.js"
	// 	);
		
	// 	foreach($scripts as $k => $v) {
	// 		wp_register_script(
	// 			$k,
	// 			ASSET_PATH . '/js/' . $v,
	// 			array(),
	// 			"0.1",
	// 			true
	// 		);
	// 		wp_enqueue_script($k);
	// 	}

	// }
	// add_action('wp_enqueue_scripts', 'cl_scripts');
