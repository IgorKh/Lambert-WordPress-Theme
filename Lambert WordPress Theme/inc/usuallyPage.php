<?php
	function KHT_usuallyPage( $id ) {
		if ( is_single()
		     || is_404()

		     || (
				is_page()
				&& ! ( in_array( $id, KHT_f( 'general' )['pages'] ) )
			)
		) {
			return true;
		} else {
			return false;
		}

	}
