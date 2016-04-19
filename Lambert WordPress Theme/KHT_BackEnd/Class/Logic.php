<?php
	/**
	 * Класс с основной логикой.
	  */

	namespace KHT_backEnd;

	class Logic {

		//Магия постройки админки
		//название плагина или шаблона, должно передоваться в конструктор
		private $prefix = null;

		//массив, сюда выгружаются настройки из баззы данных и отсюда же загружаются обратно в базу
		private $options = array();

		//Конструктор принимает массив с настройками и префикс, который не может быть пустым,
		//также берем адрес шаблона(или плагине) для корректной подгрузки изображений и  корректного отображения скриншота
		function __construct( $parts, $prefix ) {

			//если массив с настройками или префикс не указаны, то выходим, сообщая об ошибке
			if ( $parts === false || count( $parts ) === 0 || ! $prefix ) {
				wp_die( DefaultData::$message['error']['construct'] );

				return;
			}
			if ( ! is_array( $parts ) ) {
				wp_die( DefaultData::$message['error']['construct_array'] );

				return;
			}
			if ( ! is_string( $prefix ) ) {
				wp_die( DefaultData::$message['error']['construct_string'] );

				return;
			}


			//указываем префикс. см. описание свойства
			$this->prefix = $prefix;

			//проверяем, есть ли в базе данных массив настроек, см. описание функции
			$this->options = Helpers::is_exist_options( $prefix );

			//строим страницу админки
			$this->build_wrap( $parts );

			////обновляем настройки в базе данных
			update_option( $prefix, $this->options );
			//echo '<div class="db_debug">';
			//echo '<pre>';
			//print_r( $this->options );
			//echo '</pre>';
			//echo '</div>';
		}


		//главная прелесть этого класса, строит страницу настроек, но отвечает за обертку страницы
		private function build_wrap( $parts ) {
			//определяем, указан ли заголовок в настройках, если нет, то делаем его пустым
			if ( isset( $parts['title'] ) ) {
				$title = $parts['title'];
				unset( $parts['title'] );
			} else {
				$title = '';
			}
			?>

			<script>
				//указываем дерикторию плагина, для манипуляции с файлами
				var pluginURL = '<?= Start::uri() ?>';

			</script>

			<div class="wrap KHT_backEnd <?= $this->prefix ?>">
				<form action="" method="post">
					<h1 class="page-header"><?= $title ?></h1>

					<div class="alert alert-danger no-js-error" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span>
						<?= DefaultData::$message['error']['no-js'] ?>
					</div>
					<?php
						//определяем префикс
						$prefix = $this->prefix;

						//Вызов функции, которая строит саму страницу
						$this->build_section( $parts, $prefix );
					?>
				</form>
			</div>
		<?php
		}

		//функция стрительства секции настроек. отвечает за конкретный секцию(больше блока) настроек
		private function build_section( $part, $prefix, $level = 0 ) {
			//Переменная, которая показывает уровень блока в настройках. нужен для корректного отображения (так как оформление первого блока и вложенных блоков отличаются)
			$level ++;

			//перебираем массив с описанием полей и настроек
			foreach ( $part as $name => $block ) {

				//определяем значения
				$settings = array(
					//идентификатор блока, который состоит из префикса, который передан в функцию, разделителя, и имени блока настроек
					'id'          => $prefix . DefaultData::$delimiter . $name,
					//Ширина блока в админки (в единицах bootstrap)
					'size'        => isset( $block['size'] ) ? $block['size'] : DefaultData::$default['block']['size'],
					//Заголовок блока
					'title'       => isset( $block['title'] ) ? $block['title'] : DefaultData::$default['block']['title'],
					//тип поля (текстовый, картинка или прочее)
					'type'        => isset( $block['type'] ) ? $block['type'] : DefaultData::$default['block']['type'],
					//слектор блока
					'class'       => isset( $block['class'] ) ? $block['class'] : DefaultData::$default['block']['class'],
					//Текст для кнопки "добавить"
					//'text_add_button'    => isset( $block['text_add_button'] ) ? $block['text_add_button'] : DefaultData::$default['max_button']['add'],
					//Текст для кнопки "удалить"
					//'text_remove_button' => isset( $block['text_remove_button'] ) ? $block['text_remove_button'] : DefaultData::$default['max_button']['remove'],
					//если поле неконечное (содержит fields) то говорим об этом
					'fields'      => isset( $block['fields'] ) ? $block['fields'] : false,
					//todo:проверять, max это число или что. и соответственно чтото с этим делать
					//проверяем, указан ли max
					'max'         => isset( $block['max'] ) ? $block['max'] : false,
					//проверяем, указан ли number
					'number'      => isset( $block['number'] ) ? ( $block['number'] - 1 ) : false,
					//уровень блоков
					'level'       => $level,
					//определяем, первый ли уровень блоков
					'first'       => $level === 1 ? true : false,
					//Определяем скриншот для секции
					'screen_shot' => ( isset( $block['screen_shot'] ) && ! empty( $block['screen_shot'] ) ) ? $block['screen_shot'] : false,
					//Класс заголовка (для JS)
					'title_class' => 'block-title'
				);


				$settings['count'] = $settings['max'] ? $settings['max'] : ( $settings['number'] ? $settings['number'] : 0 );

				if ( $settings['type'] === 'select' ) {

					if ( ! isset( $block['selectData'] ) ) {
						wp_die( 'No data for select tag' );
					}

					$settings['selectData'] = $block['selectData'];
				}

				//если индекс блока в масиве настроек не строка, а числовой, то ругаемся и выходим
				if ( ! is_string( $name ) ) {
					wp_die( DefaultData::$message['error']['section_id'] . '' . __FUNCTION__ );

					return;
				}

				//ошибка, если указаны и max и count
				if ( $settings['number'] && $settings['max'] ) {
					wp_die( DefaultData::$message['error']['section_count'] . '' . __FUNCTION__ );

					return;
				}

				//если в настройках указано, что есть вложенные блоки (подмассив fields), но он пустой, ругаемся и выходим
				//проверяем содержание fields, если значение внутри не массив, выходим, ругаемся и выходим
				if ( $settings['fields'] !== false ) {

					//Проверяем пустые ли значения в блоках
					if ( count( $settings['fields'] ) === 0 ) {

						wp_die( DefaultData::$message['error']['fields_empty'] . '' . __FUNCTION__ );

						continue;
					}

					foreach ( $settings['fields'] as $field_name => $field_value ) {
						//Проверяем, чтобы значения в fields были массивы, так как потом косяки будут
						if ( ! is_array( $field_value ) ) {
							wp_die( '<h5 style="color:red">' . DefaultData::$message['error']['fields_invalid'] . ' Field is: ' . $field_name . '; Function: ' . __FUNCTION__ . '()</h5>' );

							continue;
						}
					}

					//Проверяем, существует ли вообще значение в БД, если нет, то задаем пустое значение
					if ( DB::option( $settings['id'], '', '', $this->options ) === false ) {
						$this->options = DB::option( $settings['id'], 'value', '', $this->options );
					}

					//Проверяем, значение массив или нет, если нет, то делаем пустым массивом
					if ( ! is_array( DB::option( $settings['id'], '', '', $this->options ) ) ) {
						$this->options = DB::option( $settings['id'], 'value', array(), $this->options );
					}
				}

				//вызываем построение блока
				$this->build_block( $settings );
			}

		}

		//строит блок
		private function build_block( $settings ) {
			//определяем значения
			$size   = $settings['size'];
			$type   = $settings['type'];
			$fields = $settings['fields'];
			$max    = $settings['max'];
			$number = $settings['number'];
			$count  = $settings['count'];
			$first  = $settings['first'];
			$class  = $settings['class'] . ( $max || $number ? ' block movable-block' : '' );

			//дополнительные действия, если указан в блоке max
			if ( $max ) {
				//заголовоки и прочие прелести, которые нужны для работы блоков с переменным количеством
				$count = Helpers::pre_max( $settings );
			}

			//дополнительные действия, если указан в блоке number
			if ( $number ) {
				Helpers::pre_number();
			}

			//Дополнительная разметка, если указан max или number
			if ( $max || $number ) {
				Helpers::pre_sort();
			}

			//соответственно по количеству блоков/полей строим блок
			for ( $i = 0; $i <= $count; $i ++ ) {

				//оберточный тег блока
				echo '<div class="' . $class . ' ' . ( $first ? 'panel panel-info' : 'col-xs-12 col-sm-' . $size ) . ' ' . ( $fields ? '' : $type ) . '" ' . ( ( $max || $number ) ? 'data-index="' . $i . '"' : '' ) . '>';

				//отправляем блок на рендер тегов
				$this->render_block( $settings, $i );

				//закрываем оберточный тег
				echo '</div>';
			}

			//Дополнительная разметка, если указан max или number
			if ( $max || $number ) {
				//заголовоки и прочие прелести, которые нужны для работы блоков с переменным количеством
				Helpers::post_sort();
			}

			//дополнительные действия, если указан в блоке number
			if ( $number ) {
				Helpers::post_number();
			}

			//если указан max, то добавляем кнопки удаления, удаления + закрываем теги
			if ( $max ) {
				Helpers::post_max( $settings, $count );
			}
		}

		//непосредственно строительство тегов
		private function render_block( $settings, $index ) {
			$id          = $settings['id'];
			$fields      = $settings['fields'];
			$max         = $settings['max'];
			$number      = $settings['number'];
			$level       = $settings['level'];
			$first       = $settings['first'];
			$title       = $settings['title'];
			$front_title = $title . ( ( $max || $number ) ? Helpers::header_with_count( $id, ( $index + 1 ) ) : '' );
			$title_class = $settings['title_class'];

			//если уровень блока первый, то выводим необходимые теги
			if ( $first ) {
				echo "<div class='panel-heading $title_class'>";

				echo '<h3 class="panel-title ' . ( ( $max || $number ) ? Helpers::header_sort() : '' ) . '">';
				echo $front_title;
				echo '</h3>';

				echo '</div>';
				echo '<div class="panel-body">';

			}

			//если поле не конечное, то выводим заголовок секции и опять же строительство секции
			if ( $fields ) {

				//если уровень блоков не первый, то выводим необходимые блоки
				if ( ! $first ) {
					echo '<h4 class="section-header ' . $title_class . ' ' . ( ( $max || $number ) ? Helpers::header_sort() : '' ) . '">';
					echo $front_title;
					echo '</h4>';
				}

				//если в настройках указан скриншот, то выводим его
				if ( $settings['screen_shot'] ) {
					Helpers::get_screen_shot( $settings['screen_shot'] );
				}

				//опять вызываем строительство секции
				$this->build_section( $fields, $id . ( ( $max || $number ) ? ( DefaultData::$delimiter . $index ) : '' ), $level );
			} else {
				//вызываем рендер непосредственного тега
				Tags::render_tag( $settings, $title, $front_title, $index );
			}

			//закрывает тег, если уровень блока первый
			echo $first ? '</div>' : '';
		}
	}
