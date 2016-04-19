<?php

	function KHT_menu_social( $footer = false ) {
		$social = KHT_f( 'general' )['social'];

		$is_enable = false;

		$menu = '';

		foreach ( $social as $id => $data ) {
			if ( $data['enable'] == 1 ) {
				$is_enable = true;

				$title = $id;
				$url   = $data['url'];

				$menu .= "<li><a href='$url' target='_blank' title='$title'><i class='fa fa-$title'></i></a></li>";
			}
		}
		if ( $is_enable ) {
			$menu = '<ul>' . $menu . '</ul>';

			if ( ! $footer ) {
				$menu = '<div class="nav-social">' . $menu . '</div>';
			} else {
				$header = '<h3>' . KGS(KHT_f( 'headerFooter' )['footer']['social_title']) . '</h3>';
				$menu   = '<div class="footer-social">' . $header . $menu . '</div>';

			}
		} else {
			if ( ! $footer ) {
				$menu = '<div style="height: 38px;"></div>';
			}

		}

		return $menu;
	}


