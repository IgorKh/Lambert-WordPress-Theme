<?php
	/**
	 * Класс со вспомогатильными методами различного назначения
	 */

	namespace KHT_backEnd;


	class Helpers {

		//todo: потом! сечас: если страниц несколько, то на каждую страницу своя запись в БД с префиксом этой страницы, надо!: весь сайт в одной записи в БД, с префиксом этого сайта
		//проверяем, существуют ли настройки в базе данных с префиксом, который передавался конструктору
		static function is_exist_options( $option_name ) {

			//Проверяем, если в базе данных настройка с таким именем, если нет, то добавляем

			if ( get_option( $option_name ) === false ) {
				add_option( $option_name );
			}

			//теперь берем содержимое настройки
			$options = get_option( $option_name );

			//если настройка в БД пустая, то добавляем первичную информацию туда
			if ( empty( $options ) ) {
				$options = DefaultData::$plugin;
			}

			//настройки делаем свойством текущего класса
			return $options;
		}


		//обрабатывает первую часть логики, если в блоке указан макс
		static function pre_max( $settings ) {
			$id   = $settings['id'];
			$max  = $settings['max'];
			$size = $settings['size'];

			//определяем количество блоков, которые уже есть
			$count = DB::option( $id, 'count' );

			//если количество меньше нуля(если поле одно, то выдаст -1), то равняем на нуль
			$count = $count < 0 ? 0 : $count;
			//если больше указанного максимума, то приравниваем к максимуму
			$count = $count >= ( $max - 1 ) ? $max - 1 : $count;

			//и добавляем теги,
			//clearfix - для правильного отображения рамки вокруг блока
			//parent - для родительского блока, в котором переменное число блоков
			//max-wrap - непосредственный родитель блоков, которые удаляются или добавляются
			//data-max - это максимум из  массива настроек
			//data-name - идентификатор блока (нужен для скрипта на js)
			echo '<div class="clearfix"></div>';
			echo '<div class="parent">';
			echo '<div class="max-wrap clearfix" data-size="' . $size . '" data-max="' . $max . '" data-name="' . $id . DefaultData::$delimiter . '">';

			return $count;
		}

		//обрабатывает вторую часть логики, если в блоке указан max
		static function post_max( $settings, $count ) {
			//$id          = $settings['id'];
			//$max         = $settings['max'];
			//$text_remove = $settings['text_remove_button'];
			//$text_add    = $settings['text_add_button'];

			echo '</div>';
			//echo '<div class="clearfix button-wrap">';
			//
			//if ( $count !== 0 ) {
			//	self::get_remove_button( $id, $text_remove );
			//} else {
			//	self::get_remove_button( $id, $text_remove, true );
			//}
			//if ( $count < $max && $count !== ( $max - 1 ) ) {
			//
			//	self::get_add_button( $id, $text_add );
			//} else {
			//	self::get_add_button( $id, $text_add, true );
			//}
			//
			//echo '</div>';
			echo '</div>';
		}

		//обрабатывает первую часть логики, если в блоке указан number
		static function pre_number() {
			//clearfix - для правильного отображения рамки вокруг блока
			//parent - для родительского блока, в котором переменное число блоков
			echo '<div class="clearfix"></div>';
			echo '<div class="parent">';
		}

		//обрабатывает вторую часть логики, если в блоке указан number
		static function post_number() {
			echo '<div class="clearfix"></div>';
			echo '</div>';
		}

		//функция для вывода заголовка с индексом конкретного блока (блок №1, блок №2, и т. д.)
		static function header_with_count( $id, $index ) {
			return '<span class="count-header ' . $id . DefaultData::$delimiter . 'count-header">' . $index . '</span>';
		}


		//Выдает скриншот секции
		static function get_screen_shot( $src ) {
			echo '<div class="screenShot"><img src="' . $src . '" alt=""/></div>';
		}

		//управление "поменять местами"
		static function pre_sort() {
			//echo '<div class="sort-blocks"><a href="#" title="Move blocks"></a></div>';
			echo '<div class="sort-body">';
		}

		static function post_sort() {
			echo '</div>';
		}

		static function header_sort() {
			return 'sortable-header';
		}

		//обработчки кнопок добавления и удаления блока
		static function get_remove_button( $id, $text, $hide = false ) {
			$class = 'btn btn-danger remove-row-button' . ( $hide ? ' disable' : '' );
			$id    = $id . DefaultData::$delimiter . 'remove_row';

			self::button( $id, $text, $class, $hide );
		}

		static function get_add_button( $id, $text, $hide = false ) {
			$class = 'btn btn-warning add-row-button' . ( $hide ? ' disable' : '' );
			$id    = $id . DefaultData::$delimiter . 'add_row';

			self::button( $id, $text, $class, $hide );
		}

		static function button( $id, $text, $class, $hide ) {
			echo '<div class="col-xs-6">';
			echo '<button type="submit" id="' . $id . '" name="' . $id . '" class="' . $class . '" aria-label="' . $text . '" ' . ( $hide ? ' disabled' : '' ) . '>' . $text . '</button>';
			echo '</div>';
		}
	}
