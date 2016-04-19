<div class="content">
	<?php
		$data     = KHT_f( 'menu' )['menu'];
		$currency = $data['currency'];
		
		$top_menu_header = 'header-section';
		
		$var_data = array(
			array(
				'menu-bg-class' => "lbd",
				'menu-bg-attr'  => "data-top-bottom='transform: translateX(200px);' data-bottom-top='transform: translateX(-200px);'",
			),
			array(
				'menu-bg-class' => "rbd",
				'menu-bg-attr'  => "data-top-bottom='transform: translateX(-200px);' data-bottom-top='transform: translateX(200px);'",
			),
		);
		
		$menu_index    = 0;
		$iterate_index = 0;
		
		foreach ( $data['block'] as $menu ) {
			
			$bg = $menu['bg'];
			
			$title           = $menu['title'];
			$sub_title       = $menu['sub_title'];
			$label_selection = $menu['label_selection'];
			
			$header_extra_class = $iterate_index === 0 ? $top_menu_header : '';
			
			if ( ! isset( $var_data[ $menu_index ] ) ) {
				$menu_index = 0;
			}
			
			$extra_data = $var_data[ $menu_index ];
			
			$menu_bg_class    = $extra_data['menu-bg-class'];
			$menu_bg_attr     = $extra_data['menu-bg-attr'];

			$menu_bg = get_template_directory_uri() . '/images/menu/1.png';
			
			echo "<section class='parallax-section $header_extra_class' >";
			echo "<div class='bg bg-parallax' style='background-image:url($bg)' data-top-bottom='transform: translateY(300px);' data-bottom-top='transform: translateY(-300px)'></div>";
			echo "<div class='overlay'></div>";
			echo "<div class='container'><h2>$title</h2><h3>$sub_title</h3></div>";
			echo "</section>";

			echo "<section >";
			echo "<div class='triangle-decor'></div>";
			echo "<div class='menu-bg $menu_bg_class' style='background-image:url($menu_bg)' $menu_bg_attr></div>";

			echo "<div class='container'>";
			echo "<div class='separator color-separator'></div>";
			echo "<div class='menu-holder'>";
			echo "<div class='row'>";

			foreach ( $menu['item'] as $item ) {


				$is_hot = isset( $item['selection'] ) && $item['selection'] == '1';

				$hot_title_class = $is_hot ? 'hot-deal' : '';
				$hot_extra_tag   = $is_hot ? "<span class='hot-desc'>$label_selection</span>" : '';

				$item_bg = isset( $item['bg'] ) && $item['bg'] !== '' ? $item['bg'] : false;

				$item_title = $item['name'];
				$item_title = ! $item_bg ? "<p>$item_title</p>" : "<a href='$item_bg' class='image-popup'>$item_title</a>";

				$item_price       = $item['price'];
				$item_description = $item['description'];


				echo "<div class='col-md-6'>";
				echo "<div class='menu-item $hot_title_class'>";
				echo $hot_extra_tag;

				echo "<div class='menu-item-details'>";

				echo "<div class='menu-item-desc'>";
				echo $item_title;
				echo "</div>";

				echo "<div class='menu-item-dot'></div>";

				echo "<div class='menu-item-prices'>";
				echo "<div class='menu-item-price'>$item_price $currency</div>";
				echo "</div>";

				echo "</div>";

				echo "<p>$item_description</p>";


				echo "</div>";
				echo "</div>";
			}

			echo "</div>";
			echo "</div>";
			
			echo "<div class='bold-separator'><span></span></div>";
			echo "</div>";

			echo "</section>";


			$menu_index ++;
			$iterate_index ++;
		}
	?>

</div>
<!--content end-->