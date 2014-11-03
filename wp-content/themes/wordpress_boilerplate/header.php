<!doctype html>
<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?> class="no-js iem7"> <![endif]-->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 8)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<title><?php wp_title(''); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="application-name" content="<?php bloginfo('name'); ?>" />
		
		<!-- start TypeKit -->
	    <script type="text/javascript" src="//use.typekit.net/vux0bem.js"></script>
	    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	    <!-- end TypeKit -->

		<?php wp_head(); ?>

		<!--[if (lt IE 9) & (!IEMobile)]>
		<link rel="stylesheet" href="<?php echo( get_template_directory_uri() ); ?>/css/ie.css">	
		<![endif]-->

  </head>

	<body <?php body_class(); ?>>
    <div class="row">
		<div class="mod mod-no-vert-margin">
		    <header id="site-header">
		    	<a href="#" class="nav-toggle">=</a>
				<h1 id="site-title" class="menu-item"><a href="<?php echo( get_site_url() ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		
		        <?php
			        display_clean_nav( array( 'horizontal-list', 'list-opacity-hover' ), 'main-nav' );
		        ?>
		
		    </header>
		</div>
    </div>
