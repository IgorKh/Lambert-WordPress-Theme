<?php
	/**
	 * Класс с методами для работы с БД
	*/

	namespace KHT_backEnd;


	class DB {

		//главная функции по операции над настройкам
		static function option( $id, $operation = '', $value = '', $option = array() ) {

			//ругаемся, если $id не стоока и $options не архив
			if ( ! is_string( $id ) ) {
				echo DefaultData::$message['error']['option_id'] . ' ' . __FUNCTION__;
				wp_die();
			}
			if ( ! is_array( $option ) ) {
				echo DefaultData::$message['error']['option_option'] . ' ' . __FUNCTION__;
				wp_die();
			}


			//проеверяем, пришел ли запрос из аякса
			if (
				! empty( $_SERVER['HTTP_X_REQUESTED_WITH'] )
				&& strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest'
			) {
				$ajax = true;
			} else {
				$ajax = false;
			}

			//разбиваем $id на составляющие, чтобы понять индекс в массиве настроек, где хранится эта настройка
			$keys = explode( DefaultData::$delimiter, $id );
			//первая часть - это префикс, берем ее и удаляем из $keys
			$prefix = array_shift( $keys );

			//по умолчанию возвращаем массив измененных настроек,
			// если $update - true , находим по префиксу настройку в БД и обновляем ее
			$update = false;
			if ( count( $option ) === 0 ) {

				if ( $ajax ) {
					$option = self::db_get( $prefix );
				} else {
					$option = get_option( $prefix );
				}
				$update = true;
			}

			//теперь смотрим, то нужно сделать с насиройкой
			switch ( $operation ) {
				//удаляет
				case 'remove':
					$index = array_pop( $keys );
					$head  =& $option;

					if ( ! is_numeric( $index ) ) {
						echo 'REMOVE!  elements index to remove is not number' . $index;

						return $index;
					} else {
						$index = intval( $index );
					}

					foreach ( $keys as $key ) {

						if ( $key === '' ) {
							continue;
						}

						$head = &$head[ $key ];
					}
					echo '$index is ' . $index . PHP_EOL;
					if ( ! isset( $head[ $index ] ) ) {
						echo 'no element to remove' . PHP_EOL;
					} elseif ( count( $head ) >= $index ) {
						ksort( $head );
						unset( $head[ $index ] );
						$head = array_values( $head );
						echo 'last element removed';
					}

					break;
				//присваивает значение
				case 'value':
					$head = &$option;
					for ( $i = 0; $i < count( $keys ); $i ++ ) {
						if ( $keys[ $i ] === '' ) {
							continue;
						}
						$head       = &$head[ $keys[ $i ] ];
						$next_index = isset( $keys[ $i + 1 ] ) && is_numeric( $keys[ $i + 1 ] ) ? intval( $keys[ $i + 1 ] ) : false;
						if ( $next_index !== false && ( count( $head ) - 1 ) < $next_index ) {
							for ( $j = 0; $j <= $next_index; $j ++ ) {
								$head[ $j ] = isset( $head[ $j ] ) ? $head[ $j ] : '';
							}
						}

					}

					$head = $value;
					break;
				//подсчитывает количество блоков
				case 'count':
					//todo: сделать подсчет только цифровых значений
					$head =& $option;
					foreach ( $keys as $key ) {

						if ( $key === '' ) {
							continue;
						}

						$head = &$head[ $key ];

					}

					if ( ! isset( $head ) ) {
						return 0;
					}

					$count = 0;

					foreach (
						$head as
						$key =>
						$value
					) {
						if ( is_numeric( $key ) ) {
							$count ++;
						}
					}

					return ( $count - 1 );
					break;
				//по умолчанию, просто возвращаем значения настройки
				default:
					$head =& $option;
					foreach ( $keys as $key ) {

						if ( $key === '' ) {
							continue;
						}

						$head = &$head[ $key ];

					}
					if ( ! isset( $head ) ) {
						return false;
					} else {
						return $head;
					}
					break;
			}

			//если надо обновить настройки, то обновляем
			if ( $update ) {

				if ( $ajax ) {
					self::db_set( $prefix, $option );
				} else {
					update_option( $prefix, $option );
				}

			}

			//наконец просто возвращаем массив
			return $option;
		}

		static function db_get( $prefix ) {
			global $wpdb;
			$options = $wpdb->get_var(
				$wpdb->prepare(
					"
		        		SELECT option_value
		        		FROM $wpdb->options
		        		WHERE option_name = %s
		        	",
					$prefix
				)
			);

			return maybe_unserialize( $options );
		}

		static function db_set( $prefix, $options ) {
			global $wpdb;
			//todo:query prepare

			$options_toSet = serialize( $options );

			return $wpdb->query(
				$wpdb->prepare(
					"
		                    UPDATE $wpdb->options
		                    SET option_value = %s
		                    WHERE option_name = %s
			        	        	",
					$options_toSet,
					$prefix
				)
			);
		}
	}
