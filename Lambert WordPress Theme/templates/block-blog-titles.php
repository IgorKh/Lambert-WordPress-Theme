<?php
	$title = KHT_f( 'blog' )['titles'];
	if ( is_search() ) {
		$title = KGS($title['search']) . ' ' . get_search_query();
		echo '<h1>' . $title . '</h1>';
	} elseif ( is_tag() ) {
		$title = KGS($title['tag']) . ' ' . single_tag_title( '', false );
		echo '<h1>' . $title . '</h1>';
	} elseif ( is_category() ) {
		$title = KGS($title['category']) . ' ' . single_cat_title( '', false );
		echo '<h1>' . $title . '</h1>';
	} elseif ( is_author() ) {
		$title = KGS($title['author']) . ' ' . get_the_author();
		echo '<h1>' . $title . '</h1>';
	}
