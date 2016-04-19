<?php
	add_action( 'init', 'KHT_menu_registerNav' );

	function KHT_menu_registerNav() {
		register_nav_menu( 'main-menu', __( 'Main menu' ) );
	}