<!DOCTYPE html>
<!--[if lte IE 7]><html class="ie7 deprecated"><![endif]-->
<!--[if IE 8]><html class="ie8"><![endif]-->
<!--[if IE 9]><html class="ie9"><![endif]-->
<!--[if gt IE 9]><!--><html><!--<![endif]-->
<head>

	<meta http-equiv="content-type" charset="utf-8" encoding="utf8_general_ci" />

	<title><?php wp_title(""); ?></title>

    <link rel="shortcut icon" href="assets/img/favicon.ico">
    
	<?php wp_head(); ?>

    <script>
		// Redirect lt IE 6
		if (document.getElementsByTagName('html')[0].className.indexOf('lt-ie7') > 0) { window.location.href = '/unsupported/'; }
    </script>
	
</head>
<body>