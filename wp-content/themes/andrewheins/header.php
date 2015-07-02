<!DOCTYPE html>
<!--[if lte IE 7]><html id="html" class="ie7 deprecated"><![endif]-->
<!--[if IE 8]><html id="html" class="ie8"><![endif]-->
<!--[if IE 9]><html id="html" class="ie9"><![endif]-->
<!--[if gt IE 9]><!--><html id="html"><!--<![endif]-->
<head>

	<meta http-equiv="content-type" charset="utf-8" encoding="utf8_general_ci" />

	<title><?php wp_title(""); ?></title>

    <link rel="shortcut icon" href="<?php echo ASSET_PATH; ?>/img/favicon.ico">
    
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
	<?php wp_head(); ?>
		
	<script>
	  (function(d) {
	    var config = {
	      kitId: 'akz8gox',
	      scriptTimeout: 3000
	    },
	    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	  })(document);
	</script>
	
	<!--[if IE 8]>
		<link rel="stylesheet" type="text/css" href="/wp-content/themes/andrewheins/style-desktop.css" />
	<![endif]-->
	<!--[if gt IE 8]><!-->
		<link rel="stylesheet" href="/wp-content/themes/andrewheins/style.css" />
	<!--<![endif]-->

    <script>
		// Redirect lt IE 6
		if (document.getElementsByTagName('html')[0].className.indexOf('lt-ie7') > 0) { window.location.href = '/browser-unsupported/'; }
    </script>
    
    <script src="<?php echo ASSET_PATH; ?>/js/output/preload.min.js"></script>
    
    <?php if (ENV === "PRODUCTION") : ?>

		<script type="text/javascript">

			// Google Analytics
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-2676251-7', 'auto');
			ga('send', 'pageview');

		</script>

	<?php endif; ?>
	
</head>
<body <?php body_class(); ?>>
	
	<div class="site">
	
	<div class="row">
		<div class="inner">
			<header class="page-header">	
				
				<div class="brand">
					<a href="<?= site_url(); ?>"><?php bloginfo( 'name' ); ?></a>
				</div>
				
				<div class="nav">
					<?php
					    wp_nav_menu(array(
						    'container' => false,	// We don't want a container
						    'menu_class' => 'site-menu',
					        'menu'    => 'Head Links',
					        'walker'  => new Walker_Simple_Menu(),
					    ));
					?>
				</div>
				
			</header>
		</div>
	</div>