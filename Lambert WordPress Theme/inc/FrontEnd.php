<?php

	function KHT_f( $page ) {
		return KHT_backEnd\DB::db_get( Option_pages::$prefix . '_' . $page );
	}

	function KGS( $string ) {
		if ( ! is_string( $string ) ) {
			return $string;
		} else {
			return stripslashes( $string );
		}
	}