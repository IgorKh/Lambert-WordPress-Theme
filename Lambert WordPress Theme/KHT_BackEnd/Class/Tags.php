<?php
	/**
	 * Класс для рендера тегов
	*/

	namespace KHT_backEnd;


	class Tags {

		//рендер тега
		static function render_tag( $settings, $title, $front_title, $index ) {
			$id          = $settings['id'];
			$type        = $settings['type'];
			$max         = $settings['max'];
			$number      = $settings['number'];
			$selectData  = $type === 'select' ? $settings['selectData'] : false;
			$title_class = $settings['title_class'];

			//полный идентификатор поля, содержит индекс поля
			$full_id = $id . ( ( $max || $number ) ? ( DefaultData::$delimiter . $index ) : '' );

			echo '<label class="' . $title_class . ' ' . ( ( $max || $number ) ? Helpers::header_sort() : '' ) . '" title="' . $title . '" for="' . $full_id . '">' . $front_title . '</label>';

			//если в настройках указан скриншот, то выводим его
			if ( $settings['screen_shot'] ) {
				Helpers::get_screen_shot( $settings['screen_shot'] );
			}
			//вызов обработчика конкретного тега, указанного в type

			if ( $type === 'select' ) {
				self::select( $full_id, $selectData );
			} elseif ( method_exists( __CLASS__, $type ) ) {
				self::$type( $full_id );
			} else {
				return null;
			}
		}

		//обработчик текстового поля, которое используется по умолчанию
		static function input( $id ) {
			echo '<input type="text" class="form-control field text-fields" name="' . $id . '" id="' . $id . '" value="' . stripslashes( htmlentities( self::get_option( $id ) ) ) . '"/>';
		}

		//оброботчик многострочного текстового поля
		static function textarea( $id ) {
			echo '<textarea class="form-control field text-fields" name="' . $id . '" id="' . $id . '">' . stripslashes( self::get_option( $id ) ) . '</textarea>';
		}

		//обработчик выпадающего списка сос страницами сайта
		static function wpPages_dropDown( $id ) {
			wp_dropdown_pages(
				array(
					'name'              => $id,
					'id'                => $id,
					'echo'              => 1,
					'show_option_none'  => 'Choose',
					'option_none_value' => '0',
					'selected'          => self::get_option( $id ),
				)
			);
		}


		//обработчик загрузки изображения
		static function image( $id ) {
			$src = self::get_option( $id ) == '' ? Start::uri() . 'img/empty.png' : self::get_option( $id );
			echo '<a class="fancybox" rel="group" href="' . $src . '">';
			echo '<img class="preview-upload" src="' . $src . '" alt=""/>';
			echo '</a>';
			echo '<input class="upload_image_field form-control upload-field" type="hidden" aria-describedby="basic-addon3" name="' . $id . '" id="' . $id . '" value="' . self::get_option( $id ) . '"/>';
			echo '<input class="upload_image_button btn btn-default" type="button" value="Upload"/>';
		}

		//обработчик чекбокса
		static function checkbox( $id ) {
			if ( self::get_option( $id ) === '' ) {
				DB::option( $id, 'value', 0 );
			}

			if ( self::get_option( $id ) == '1' ) {
				$checked = 1;
				$status  = 'checked';
			} else {
				$checked = 0;
				$status  = '';
			}

			echo '<input type="checkbox" class="checkbox " name="' . $id . '" id="' . $id . '" value="' . $checked . '" ' . $status . '/>';
		}

		//обрабочик цифрового поля
		static function number( $id ) {
			echo '<input class="form-control field text-fields" type="number" name="' . $id . '" id="' . $id . '" min="0" max="500" step="5" value="' . stripslashes( self::get_option( $id ) ) . '">';
		}

		static function select( $id, $data ) {
			$current = self::get_option( $id );
			$current = $current === false || $current === '' ? false : $current;

			$selected = ' selected="selected" ';
			echo '<select name="' . $id . '" class="form-control">';

			echo '<option ' . ( ! $current ? $selected : '' ) . ' value="" >' . 'Выберите' . '</option>';
			foreach ( $data as $name => $value ) {
				echo '<option ' . ( $current && $current === $name ? $selected : '' ) . ' value="' . $name . '" >' . $value . '</option>';
			}
			echo '</select>';
		}

		//Проверяет, есть ли в БД значение, если оно не существует, то делает его пустым
		static function get_option( $id ) {
			if ( DB::option( $id ) === false ) {
				DB::option( $id, 'value', '' );
			}

			return DB::option( $id );
		}
	}
