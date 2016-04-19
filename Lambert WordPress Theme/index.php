<?php
	get_header();

	if ( is_page( KHT_f( 'general' )['pages']['home'] ) ) {

		get_template_part( 'templates/page', 'home' );

	} elseif ( is_page( KHT_f( 'general' )['pages']['menu'] ) ) {

		get_template_part( 'templates/page', 'menu' );

	} elseif ( is_page( KHT_f( 'general' )['pages']['gallery'] ) ) {

		get_template_part( 'templates/page', 'gallery' );

	} elseif ( is_page( KHT_f( 'general' )['pages']['reservation'] ) ) {

		get_template_part( 'templates/page', 'reservation' );

	} elseif ( is_page( KHT_f( 'general' )['pages']['contact'] ) ) {

		get_template_part( 'templates/page', 'contact' );

	} elseif ( is_404() ) {

		get_template_part( 'templates/page', 'p404' );

	} elseif ( KHT_usuallyPage( get_the_ID() ) ) {

		get_template_part( 'templates/page', 'single' );

	} elseif ( is_404() ) {

		get_template_part( 'templates/page', 'p404' );

	} else {

		get_template_part( 'templates/page', 'blog' );

	}

	get_footer();
