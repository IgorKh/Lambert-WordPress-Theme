<?php
	require 'Option_pages.php';

	define( 'KHT_BackEnd_Uri', get_template_directory_uri() . '/' . Option_pages::$BE_directory . '/' );

	require dirname( __DIR__ ) . '/KHT_BackEnd/KHT_BackEnd.php';

	new Option_pages();