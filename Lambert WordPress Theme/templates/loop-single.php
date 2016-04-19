<?php
	$data = KHT_f( 'blog' );
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();

			$link  = get_the_permalink();
			$title = get_the_title();

			$date = get_the_date( 'j M');

			$comments       = get_comments_number();
			$comments_title = KGS( $data['post_data']['comments'] );
			$author         = get_the_author();
			$author_title   = KGS( $data['post_data']['author'] );
			$author_link    = get_author_posts_url( get_the_author_meta( 'ID' ) );
			$tags           = wp_get_post_tags( get_the_ID() );
			$categories     = get_the_category();
			$more           = KGS( $data['post_data']['more'] );

			echo "<article class='post'>";
			
			echo "<h4><a href='$link' class='ajax transition2'>$title</a></h4>";

			echo "<ul class='post-meta'>";
			echo "<li>$date</li>";
			echo "<li>$comments $comments_title</li>";
			echo "<li>";
			echo "<h5>";
			echo "$author_title <a href='$author_link'>$author</a>";
			if ( $categories ) {
				foreach ( $categories as $category ) {

					$category_link = get_category_link( $category->term_id );
					$category_name = $category->cat_name;

					echo " / <a href='$category_link' title='$category_name'>$category_name</a>";

				}
			}
			echo "</h5>";
			echo "</li>";
			echo "</ul>";
			the_content();

			echo "<ul class='post-tags'>";
			foreach ( wp_get_post_tags( get_the_ID() ) as $tag ) {
				$tag_link = get_tag_link( $tag->term_id );
				$tag_name = $tag->name;
				echo "<li><a href='$tag_link' title='$tag_name'>$tag_name</a></li>";
			}
			echo "</ul>";

			echo "</article>";

		}
	} else {
		$content = KGS( $data['post_data']['not'] );
		echo "<h2>$content</h2>";
	}