<?php

	/*
	 * Asset Path
	 */

	define("ASSET_PATH", get_template_directory_uri() . "/_assets"); // Global constant definition
	function cl_asset_path() { echo ASSET_PATH; } // Wrapper for using this constant in templates with normal WP style

	// remove unncessary header info
	function remove_header_info() {
	    remove_action('wp_head', 'rsd_link');
	    remove_action('wp_head', 'wlwmanifest_link');
	    remove_action('wp_head', 'wp_generator');
	    remove_action('wp_head', 'start_post_rel_link');
	    remove_action('wp_head', 'index_rel_link');
	    remove_action('wp_head', 'adjacent_posts_rel_link');
	}
	add_action('init', 'remove_header_info');
	
	if( !is_admin() ) {
		add_filter('show_admin_bar', '__return_false');
	}
	
	/*
	// Customize Logo
	add_action("login_head", "my_login_head");
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
*/


	/*
	 * Favicon for Admin and Login Pages
	 */

	function add_favicon() {
		$favicon_url = get_stylesheet_directory_uri() . '/_assets/img/favicon.ico';
		echo '<link rel="icon" href="' . $favicon_url . '"  sizes="16x16 32x32" type="image/vnd.microsoft.icon" />';
	}
	  
	add_action('login_head', 'add_favicon');
	add_action('admin_head', 'add_favicon');

	//add_image_size( "small-cropped", 	320, 240, true );


	/*
	 * Styles and Scripts
	 */

	function cl_styles(){

		// require_once('_lib/lessphp/Less.php');

		// $global_styles_path = get_template_directory() . "/_assets/css/main.less";
		// $target_path = get_template_directory() . "/style.css";

		// try{
		// 	$less_files = array( $global_styles_path => "/wp-content/themes/rustic_pathways" );
		// 	$options = array(
		// 		"cache_dir" => $_SERVER['DOCUMENT_ROOT'] . "/wp-content/cache/less_cache/",
		// 		"compress" => ENV === "PRODUCTION"
		// 	);
		// 	$css_file_name = Less_Cache::Get( $less_files, $options );
		// } catch(Exception $e) {
		//     echo "<pre>" . $e->getMessage() . "</pre>";
		// }

		// wp_register_style(
		// 	'global-styles',
		// 	"/wp-content/cache/less_cache/" . $css_file_name,
		// 	array(),
		// 	"1.0"
		// );
		// wp_enqueue_style('global-styles');
		
		// wp_register_style(
		// 	'global-styles',
		// 	"/wp-content/themes/rustic_pathways/style.css",
		// 	array(),
		// 	"1.0"
		// );
		// wp_enqueue_style('global-styles');

	}
	add_action('wp_enqueue_scripts', 'cl_styles');

	function cl_enqueue_jquery() {
		if (!is_admin()) {
			wp_deregister_script('jquery');
			wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', false, '1.9.1', true);
			wp_enqueue_script('jquery');
		}
	}
	add_action( 'wp_enqueue_scripts', 'cl_enqueue_jquery', 9 );

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
