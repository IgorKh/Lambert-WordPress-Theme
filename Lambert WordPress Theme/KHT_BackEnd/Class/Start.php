<?php
	/**
	 * Файл с начальным скриптом. Загружает файлы и регистрирует АЯКС запросы
	*/

	namespace KHT_backEnd;


	class Start {

		//короткое имя для определения адреса шаблона. если указан $general_path, то возвращается общий адрес темы или плагина, иначе возвращается адрес библиотеки
		static function uri() {
			return mb_substr( KHT_BackEnd_Uri, - 1 ) === '/' ? KHT_BackEnd_Uri : KHT_BackEnd_Uri . '/';
		}

		function __construct() {
			//Загружаем скрипты и стили в админку
			add_action( 'admin_enqueue_scripts', array( $this, 'register_files' ) );
			//Даем разрешение загружать SVG
			add_filter( 'upload_mimes', array( $this, 'allow_svg' ) );

			//Вызываем класс для регистрации АЯКС запросов
			new Ajax();
		}

		function register_files() {
			wp_enqueue_media();

			wp_enqueue_style( 'KHT_backEnd_fancyBox_style', $this->uri() . 'fancyBox/jquery.fancybox.css' );
			wp_enqueue_script( 'KHT_backEnd_fancyBox_script', $this->uri() . 'fancyBox/jquery.fancybox.pack.js', array(), false, true );
			wp_enqueue_script( 'KHT_backEnd_sortable_script', $this->uri() . 'js/Sortable.min.js', array(), false, true );
			wp_enqueue_style( 'KHT_backEnd_style', $this->uri() . 'css/styles.css' );
			wp_enqueue_script( 'KHT_backEnd_script', $this->uri() . 'js/app.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'KHT_backEnd_script_buttonAction', $this->uri() . 'js/buttonAction.js', array( 'jquery' ), false, true );
		}

		function allow_svg( $mimes ) {
			$mimes['svg'] = 'image/svg+xml';

			return $mimes;
		}
	}
