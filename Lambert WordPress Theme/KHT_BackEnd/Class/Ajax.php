<?php
	namespace KHT_backEnd;


	class Ajax {

		function __construct() {
			//AJAX хэндлер: обновляет данные из БД для дебага
			add_action( 'wp_ajax_debug_DB', array( $this, 'AJAX_admin_debug_DB' ) );

			//AJAX хэндлер: удалить настройку
			add_action( 'wp_ajax_remove_settings', array( $this, 'AJAX_admin_remove_settings' ) );

			//AJAX хэндлер: сохранить настройку
			add_action( 'wp_ajax_save_setting', array( $this, 'AJAX_admin_save_setting' ) );
		}

		function AJAX_admin_debug_DB() {

			if ( ! isset( $_POST['key_debug'] ) ) {
				echo 'no key debug';
				return;
			}

			$keys = explode( DefaultData::$delimiter, $_POST['key_debug'] );

			$prefix = array_shift( $keys );
			echo '<pre>';
			print_r( DB::db_get( $prefix ) );
			echo '</pre>';
			wp_die();
		}


		function AJAX_admin_remove_settings() {

			if ( ! isset( $_POST['settings'] ) ) {
				echo DefaultData::$message['error']['!isset'] . ' ' . __FUNCTION__;
			}

			DB::option( $_POST['settings'], 'remove' );

			wp_die();
		}


		function AJAX_admin_save_setting() {

			if ( ! isset( $_POST['name'] ) || ! isset( $_POST['value'] ) ) {
				echo DefaultData::$message['error']['!isset'] . ' ' . __FUNCTION__;;
			}

			DB::option( $_POST['name'], 'value', $_POST['value'] );

			wp_die();
		}
	}
