<!DOCTYPE HTML>
<html lang="en">
<head>
	<!--=============== basic  ===============-->
	<meta charset="UTF-8">
	<title><?php wp_title( ' - ', true, 'right' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!--=============== favicons ===============-->
	<link rel="shortcut icon" href="<?= get_template_directory_uri() ?>/images/favicon.ico">
	<?php wp_head() ?>
</head>
<body>
<div class="loader"><img src="<?= get_template_directory_uri() ?>/images/loader.png" alt=""></div>
<!--================= main start ================-->
<div id="main">
	<?php
		if ( ! KHT_usuallyPage( get_the_ID() && ! is_404() ) ) {
			get_template_part( 'templates/block', 'header' );
		} else {
			get_template_part( 'templates/block', 'header-flat' );
		}
	?>
	<!--=============== wrapper ===============-->
	<div id="wrapper">