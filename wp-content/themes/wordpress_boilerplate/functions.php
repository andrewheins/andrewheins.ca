<?php

  // Run setup
  require_once( 'lib/setup.php' );

  // Thumbnail sizes
  add_image_size( 'banner', 1024, 150, true );
  add_image_size( 'box-200', 200, 200, true );

  // Sidebars
  function register_my_sidebars() {
    register_sidebar(array(
      'id' => 'sidebar',
      'name' => 'Sidebar',
      'description' => 'The primary sidebar.',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));
  }
	add_action( 'widgets_init', 'register_my_sidebars' );


	// Clean up nav markup
	function display_clean_nav( $_menu_classes = "", $id = "" ) {
		if( is_array( $_menu_classes ) ) {
			$menu_classes = join(' ', $_menu_classes);
		} else {
			$menu_classes = $_menu_classes;
		}
		$menu_name = 'main_nav';
		$args = array( 
			'menu' => $menu_name,
			'container' => 'nav',
			'menu_class' => $menu_classes,
			'menu_id' => $id
		);
		if( has_nav_menu( $menu_name ) ) {
			wp_nav_menu( $args );
		} else {
			wp_nav_menu();
		}
	}
