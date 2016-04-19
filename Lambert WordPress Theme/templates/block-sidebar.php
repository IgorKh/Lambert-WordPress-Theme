<!--================= sidebar  ================-->
<div class="col-md-3 sidebar">
	<!-- widget -->
	<div class="widget">
		<div class="searh-holder">
			
			<form role="search" class="searh-inner" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div>
					<input name="s" id="s" type="text" class="search" placeholder="<?= KGS( KHT_f( 'blog' )['post_data']['search'] ) ?>." value="<?php echo get_search_query(); ?>"/>
					<button class="search-submit" id="searchsubmit"><i class="fa fa-search transition"></i></button>
				</div>
			</form>
		</div>
	</div>
	<!-- widget -->
	<div class="widget">
		<h3><?= KGS( KHT_f( 'blog' )['sidebar']['text_widget']['title'] ) ?></h3>
		
		<div class="clearfix"></div>
		<p><?= KGS( KHT_f( 'blog' )['sidebar']['text_widget']['text'] ) ?></p>
	</div>
	<!-- widget -->
	<div class="widget">
		<h3><?= KGS( KHT_f( 'blog' )['sidebar']['tags'] ) ?></h3>
		
		<div class="clearfix"></div>
		<ul class="tagcloud">
			<?php
				foreach ( get_tags() as $tag ) {
					$tag_link = get_tag_link( $tag->term_id );
					$tag_name = $tag->name;
					echo "<li><a href='$tag_link' title='$tag_name' class='transition link'>$tag_name</a></li>";
				}
			?>
		</ul>
	</div>
	<!-- widget -->
	<div class="widget">
		<h3><?= KGS( KHT_f( 'blog' )['sidebar']['last_updates'] ) ?></h3>
		
		<div class="clearfix"></div>
		<div id="tabs-container">
			<ul class="tabs-menu">
				<li class="current"><a href="#tab-1">Last Posts</a></li>
				<li><a href="#tab-2">Last Comments</a></li>
			</ul>
			<div class="tab">
				<div id="tab-1" class="tab-content">
					<ul class="widget-posts">
						
						<?php
							$recent_posts = wp_get_recent_posts( array( 'numberposts' => 4 ) );
							foreach ( $recent_posts as $recent ) {

								$recent_link  = get_permalink( $recent["ID"] );
								$recent_title = $recent["post_title"];
								$recent_date  = mysql2date( 'j M', $recent['post_date'] );
								$recent_time  = mysql2date( 'G.i', $recent['post_date'] );

								echo "<li class='clearfix'>";
								echo "<div class='widget-posts-descr'>";
								echo "<a href='$recent_link' title='$recent_title'>$recent_title</a>";
								echo "<span class='widget-posts-date'> $recent_date $recent_time </span>";
								echo "</div>";
								echo "</li>";
							}
						?>
					</ul>
				</div>
				<div id="tab-2" class="tab-content">
					<ul class="widget-comments">
						<?php

							$recent_comments = get_comments(
								array(
									'number'  => '5',
									'orderby' => 'comment_date',
									'status'  => 'approve'
								) );
							foreach ( $recent_comments as $recent ) {

								$recent_link  = get_comment_link( $recent );
								$recent_title = '"' . ( ( strlen( $recent->comment_content ) > 23 ) ? mb_substr( $recent->comment_content, 0, 20 ) . '...' : $recent->comment_content ) . '"';
								$recent_date  = mysql2date( 'j M', $recent->comment_date );
								$recent_time  = mysql2date( 'G.i', $recent->comment_date );
								$recent_name  = $recent->comment_author;

								echo "<li class='clearfix'>";
								echo "<div class='widget-comments-descr'>";
								echo "<a href='$recent_link' title='$recent_title'>$recent_title</a>";
								echo "<span class='widget-comments-date'> $recent_date $recent_time <strong>$recent_name</strong></span>";
								echo "</div>";
								echo "</li>";
							}
						?>
					</ul>
				</div>
			</div>
			<!-- widget -->
			<div class="widget">
				<h3><?= KGS( KHT_f( 'blog' )['sidebar']['categories'] ) ?></h3>
				
				<div class="clearfix"></div>
				<ul>
					<?php
						foreach ( get_categories( array( 'number' => '4' ) ) as $category ) {
							$category_link  = get_category_link( $category->term_id );
							$category_title = $category->name;
							$category_count = $category->count;

							echo "<li class='cat-item'><a href='$category_link' title='$category_title'>$category_title</a> ($category_count)</li>";
						}
					?>
				</ul>
			</div>
			<!-- widget -->
			<div class="widget">
				<h3><?= KGS( KHT_f( 'blog' )['sidebar']['slider_widget']['title'] ) ?></h3>
				
				<div class="clearfix"></div>
				<div class="single-slider-holder">
					<div class="customNavigation">
						<a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
						<a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
					</div>
					<div class="single-slider owl-carousel">
						<?php
							foreach ( KHT_f( 'blog' )['sidebar']['slider_widget']['image'] as $slide ) {
								$alt = KGS( KHT_f( 'blog' )['sidebar']['slider_widget']['title'] );
								echo "<div class='item'><img src='$slide' alt='$alt' class='respimg'></div>";
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end sidebar -->