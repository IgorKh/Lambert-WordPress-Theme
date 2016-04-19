<?php
	function KHT_menu_registerFiles() {

		wp_enqueue_style( 'KHT_menu_style', get_template_directory_uri() . '/css/style.css' );

		wp_enqueue_script( 'KHT_menu_map', '//maps.google.com/maps/api/js?sensor=false', array(), false, true );
		wp_enqueue_script( 'KHT_menu_plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'KHT_menu_scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), false, true );

		wp_enqueue_script( 'KHT_menu_js', get_template_directory_uri() . '/js/empty.js' );
		wp_localize_script( 'KHT_menu_js', 'KHT_menu_ajax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}

	add_action( 'wp_enqueue_scripts', 'KHT_menu_registerFiles' );