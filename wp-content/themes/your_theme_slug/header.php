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
	
	<!--[if IE 8]>
		<link rel="stylesheet" type="text/css" href="/wp-content/themes/your_theme_slug/style-desktop.css" />
	<![endif]-->
	<!--[if gt IE 8]><!-->
		<link rel="stylesheet" href="/wp-content/themes/your_theme_slug/style.css" />
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

			// ga('create', 'UA-12304696-1', 'auto');
			// ga('send', 'pageview');

		</script>

	<?php else : // Test analytics ?>

		<script type="text/javascript">

			// Google Analytics
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			// ga('create', 'UA-12304696-6', 'auto');
			// ga('send', 'pageview');

		</script>

	<?php endif; ?>
	
</head>
<body <?php body_class(); ?>>

	<noscript>
		<header id="no-script-header">
			It looks like Javascript is not enabled in your browser. This site requires javascript for full functionality. Please <a href="http://www.enable-javascript.com/">enable Javascript</a> to view this site as intended.
		</header>
	</noscript>
	
	<header id="page-header">
		<a href="<?= site_url(); ?>"><?php bloginfo( 'name' ); ?></a>
	</header>