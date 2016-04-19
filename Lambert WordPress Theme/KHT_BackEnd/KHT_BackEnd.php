<?php
	/**
	 * Главный файл, который запускает всю остальную логику, если этот же класс уже не объявлен
	 */

		//Проверка на объявленый такой же класс, для исключения ошибок
	if ( class_exists( 'KHT_BackEnd\\Start' ) ) {
		return;
	}

	//Проверка на объявленную константу
	if ( ! defined( 'KHT_BackEnd_Uri' ) ) {
		wp_die( '<p style="color: red;font-weight: bold;">KHT_BackEnd_Uri is not defined</p>' );
	}


	function KHT_include( $file ) {
		$dir = 'Class';
		$ext = '.php';

		$file = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $file . $ext;

		if ( file_exists( $file ) ) {
			include_once $file;
		} else {
			wp_die( '<p style="color:red">' . $file . ' is not exists, or filename error' . '</p>' );
		}
	}

	//Загружаем Аякс
	KHT_include( 'Ajax' );
	//Загружаем начальный скрипт
	KHT_include( 'Start' );

	//Загружаем класс по работе с БД
	KHT_include( 'DB' );
	//Загружаем класс с данными по умолчанию
	KHT_include( 'DefaultData' );
	//загружаем класс по рендеру тегов
	KHT_include( 'Tags' );
	//загружаем класс с вспомогательными методами
	KHT_include( 'Helpers' );

	//Загружаем класс с основной функцией
	KHT_include( 'Logic' );

	//Вызываем выполнение начального скрипта
	new KHT_backEnd\Start();

	//Короткое имя для вызова основной логики скрипта
	function KHT_be( $parts, $prefix ) {
		new KHT_backEnd\Logic( $parts, $prefix );
	}
