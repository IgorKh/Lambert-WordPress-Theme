<?php

	class Option_pages {

		//BackEnd function name AND url

		private function BE_function( $data, $prefix ) {
			$BE_function = 'KHT_be';

			if ( function_exists( $BE_function ) ) {
				$BE_function( $data, $prefix );
			}
		}

		static $BE_directory = 'KHT_BackEnd';

		static $prefix = 'KHT_menu';

		private $root = array(
			'page_title'     => 'Template setup',
			'sub_page_title' => 'General settings',
			'menu_title'     => 'Template',
			'sub_menu_title' => 'General',
			'capability'     => 'manage_options',
			'menu_slug'      => 'KHT_menu',
			'function'       => 'general',
			'icon_url'       => '/images/config_icon.png',
			'position'       => 3,
		);

		private $all = array(
			'headerFooter' => 'Header and Footer',
			'home'         => 'Home',
			'blog'         => 'Blog',
			'open_hours'   => 'Opening hours',
			'testimonials' => 'Testimonials',
			'menu'         => 'Menu',
			'gallery'      => 'Gallery',
			'reservation'  => 'Reservation',
			'contact'      => 'Contact',
			'p404'         => 'Page 404'
		);

		function __construct() {
			add_action( 'admin_menu', [ $this, 'register' ] );
		}

		function register() {
			$root = $this->root;
			$all  = $this->all;

			add_menu_page(
				$root['page_title'],
				$root['menu_title'],
				$root['capability'],
				$root['menu_slug'],
				[ $this, $root['function'] ],
				get_template_directory_uri() . $root['icon_url'], $root['position'] );

			add_submenu_page( $root['menu_slug'], $root['sub_page_title'], $root['sub_menu_title'], $root['capability'], $root['menu_slug'] );

			foreach ( $all as $name => $page ) {
				add_submenu_page(
					$root['menu_slug'],
					$page,
					$page,
					$root['capability'],
					$root['menu_slug'] . '/' . $name,
					[ $this, $name ]
				);
			}
		}

		function general() {
			$this->BE_function(
				KHT_menu\Data::$general,
				self::$prefix . '_' . 'general'
			);
		}


		function headerFooter() {
			$this->BE_function(
				KHT_menu\Data::$headerFooter,
				self::$prefix . '_' . 'headerFooter'
			);
		}

		function home() {
			$this->BE_function(
				KHT_menu\Data::$home,
				self::$prefix . '_' . 'home'
			);
		}

		function blog() {
			$this->BE_function(
				KHT_menu\Data::$blog,
				self::$prefix . '_' . 'blog'
			);
		}

		function open_hours() {
			$this->BE_function(
				KHT_menu\Data::$open_hours,
				self::$prefix . '_' . 'open_hours'
			);
		}

		function testimonials() {
			$this->BE_function(
				KHT_menu\Data::$testimonials,
				self::$prefix . '_' . 'testimonials'
			);
		}

		function menu() {
			$this->BE_function(
				KHT_menu\Data::$menu,
				self::$prefix . '_' . 'menu'
			);
		}

		function gallery() {
			$this->BE_function(
				KHT_menu\Data::gallery(),
				self::$prefix . '_' . 'gallery'
			);
		}

		function reservation() {
			$this->BE_function(
				KHT_menu\Data::$reservation,
				self::$prefix . '_' . 'reservation'
			);
		}

		function contact() {
			$this->BE_function(
				KHT_menu\Data::$contact,
				self::$prefix . '_' . 'contact'
			);
		}

		function p404() {
			$this->BE_function(
				KHT_menu\Data::$p404,
				self::$prefix . '_' . 'p404'
			);
		}
	}