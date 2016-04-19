<?php
	//cn = custom menu
	function KHT_cn( $menu_name ) {

		if ( ! ( $locations = get_nav_menu_locations() ) || ! isset( $locations[ $menu_name ] ) ) {
			return false;
		}

		global $post;

		$postId = isset($post)?$post->ID:false;

		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

		$menu_items = wp_get_nav_menu_items( $menu->term_id );

		$menu_list = "<ul id='menu-$menu_name'>";

		foreach ( (array) $menu_items as $key => $menu_item ) {
			$title = $menu_item->title;
			$url   = $menu_item->url;
			$id    = $menu_item->object_id;

			$current = $postId == $id ? 'act-link' : '';

			$menu_list .= "<li><a class='$current' href='$url'>$title</a></li>";
		}
		$menu_list .= '</ul>';

		return $menu_list;

	}