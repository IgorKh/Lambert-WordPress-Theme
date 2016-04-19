<?php
	/**
	 * Класс с данными по умолчанию
	  */

	namespace KHT_backEnd;

	class DefaultData {

		//содержит данные о текущем плагине, эти данные первые заносятся в базу
		static $plugin = array(
			'name'    => 'KHT_backEnd',
			'version' => '2'
		);

		//разделитель, используется в названии настройки и используется для идентификации индекса массива настроек, где содержится сама настройка
		static $delimiter = '-';

		//Сообщения при различный событиях
		static $message = array(
			'setting' => array(
				'add'    => 'add setting success',
				'remove' => 'remove setting success',
				'saved'  => 'setting saved'
			),
			'error'   => array(
				'!isset'           => 'Required setting is not set',
				'fields_empty'     => 'Array "fields" in settings, but empty',
				'fields_invalid'   => 'Field in "fields" must be array! Now it is not!',
				'construct'        => '__construct($parts, $prefix, $uri) error. Wrong arguments(hole) fool.',
				'construct_string' => '$prefix is not string!',
				'construct_array'  => '$parts is not array!',
				'section_id'       => '$name is not string',
				'section_count'    => 'Count and max cant be set at same time',
				'option_id'        => '$id is not string',
				'option_option'    => '$option is not array',
				'empty_uri'        => 'uri of template or plugin called by, not set',
				'no-js'            => 'Манипуляции (сохранение, удаление) невозможны без включенного JavaScript. Пожалуйста, установите кошерный браузер или включите JavaScript'
			),
		);

		//указываем значения по умолчанию
		static $default = array(
			'submit_button' => array(
				'id'    => 'KHT_submit',
				'label' => 'Применить'
			),
			'block'         => array(
				'size'  => 12,
				'title' => '',
				'type'  => 'input',
				'class' => ''
			),
			'max_button'    => array(
				'add'    => 'Добавить строку',
				'remove' => 'Удалить строку'
			)
		);
	}
