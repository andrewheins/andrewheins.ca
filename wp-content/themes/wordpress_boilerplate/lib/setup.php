<?php
  
  // Load Custom Post Types
  require_once( 'types/projects.php' );

  // Adding Translation Option
  load_theme_textdomain( 'andrewheins', TEMPLATEPATH.'/languages' );
  $locale = get_locale();
  $locale_file = TEMPLATEPATH."/languages/$locale.php";
  if ( is_readable($locale_file) ) require_once($locale_file);

  // Header Cleanup
  function head_cleanup() {
    remove_action( 'wp_head', 'feed_links_extra', 3 );                    // Category Feeds
    remove_action( 'wp_head', 'feed_links', 2 );                          // Post and Comment Feeds
    remove_action( 'wp_head', 'rsd_link' );                               // EditURI link
    remove_action( 'wp_head', 'wlwmanifest_link' );                       // Windows Live Writer
    remove_action( 'wp_head', 'index_rel_link' );                         // index link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );            // previous link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );             // start link
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Links for Adjacent Posts
    remove_action( 'wp_head', 'wp_generator' );                           // WP version
  }
	add_action('init', 'head_cleanup');

	// remove WP version from RSS
	function rss_version() { return ''; }
	add_filter('the_generator', 'rss_version');

  // Load Primary Scripts and Styles
  function load_primary_js_and_css() {
    if (!is_admin()) {
      wp_register_script( 
      	'modernizr', 
      	get_template_directory_uri() . '/assets/js/libs/modernizr.custom.min.js', 
      	array(), 
      	'2.5.1', 
      	false 
      );
      wp_register_script( 
      	'jquery_validate', 
      	get_template_directory_uri() . '/assets/js/libs/jquery.validate.min.js', 
      	array( 'jquery' ), 
      	'2.2.0' 
      );
      wp_register_script( 
      	'flexslider', 
      	get_template_directory_uri() . '/assets/js/libs/jquery.flexslider-min.js', 
      	array( 'jquery' ), 
      	'2.2.0' 
      );
      wp_register_script( 
      	'scripts', 
      	get_template_directory_uri() . '/assets/js/scripts.js', 
      	array( 'modernizr', 'jquery' ), 
      	'2012-02-15-1537'
      );
      
      wp_enqueue_script( 'modernizr' );
	  wp_enqueue_script( 'jquery' );
      wp_enqueue_script( 'flexslider' );
      wp_enqueue_script( 'jquery_validate' );
      wp_enqueue_script( 'scripts' );

    // register base stylesheet
      wp_register_style( 
      	'font-awesome', 
      	'//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'
      );
      wp_register_style( 
      	'screen', 
      	get_template_directory_uri() . '/assets/css/screen.css', 
      	array(), 
      	'2011-11-04T15:38', 
      	'all' 
      );
      wp_enqueue_style( 'font-awesome' );
      wp_enqueue_style( 'screen' );

    }
  }
  add_action('wp_enqueue_scripts', 'load_primary_js_and_css', 1);

  // Load Secondary Scripts and Styles
  function load_secondary_js_and_css() {
    if (!is_admin()) {
	    // Add other scripts here
    }
  }
  
  add_action('wp_enqueue_scripts', 'load_secondary_js_and_css', 999);

  // Adding WP 3+ Functions & Theme Support
  function theme_support() {
    add_theme_support('post-thumbnails');      // wp thumbnails (sizes handled in functions.php)
    set_post_thumbnail_size(125, 125, true);   // default thumb size
    add_theme_support('custom-background');
    add_theme_support('automatic-feed-links'); // rss thingy
    add_theme_support( 'menus' );            // wp menus
    register_nav_menus(                      // wp3+ menus
      array( 
        'main_nav' => 'The Main Menu',   // main nav in header
        'footer_links' => 'Footer Links' // secondary nav in footer
      )
    );	
  }
	add_action('after_setup_theme','theme_support');	

