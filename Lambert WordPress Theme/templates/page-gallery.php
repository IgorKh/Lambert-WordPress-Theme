<?php
	
	$data = KHT_f( 'gallery' );
?>

<div class="content">
	<section class="parallax-section header-section">
		<div class="bg bg-parallax" style="background-image:url(<?= $data['header']['bg'] ?>)" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
		<div class="overlay"></div>
		<div class="container">
			<h2><?= KGS( $data['header']['title'] ) ?></h2>
			
			<h3><?= KGS( $data['header']['description'] ) ?></h3>
		</div>
	</section>
	<section>
		<div class="triangle-decor"></div>
		<div class="container">
			<div class="gallery-filters">
				<a href="#" class="gallery-filter gallery-filter-active" data-filter="*"><?= KGS( $data['filter_all'] ) ?></a>
				<?php
					foreach ( $data['filters'] as $filter ) {
						$filter_id    = $filter['id'];
						$filter_title = $filter['title'];
						
						echo "<a href='#' class='gallery-filter ' data-filter='.$filter_id'>$filter_title </a>";
					}
				?>
			</div>
			<div class="bold-separator"><span></span></div>
			<div class="row">
				<div class="col-md-12">
					<div class="gallery-items three-coulms grid-small-pad popup-gallery">
						<?php
							foreach ( $data['items'] as $item ) {
								
								$filters = ' ';
								
								foreach ( $item['filters'] as $filter ) {
									$filters .= trim( $filter ) . ' ';
								}

								$big_size = isset( $item['size'] ) && $item['size'] == '1' ? 'gallery-item-second' : '';

								$video       = isset( $item['video'] ) && ! empty( $item['video'] ) ? $item['video'] : false;
								$video_class = '';
								if ( $video !== false ) {

									if ( preg_match( '|youtu|', $video ) ) {
										$video_class = 'popup-youtube';
									} elseif ( preg_match( '|vimeo|', $video ) ) {
										$video_class = 'popup-vimeo';
									} else {
										continue;
									}
								}

								$link        = $video !== false ? $video : $item['image'];
								$description = isset( $item['description'] ) ? $item['description'] : '';

								$thumb = $item['thumb'];
								
								echo "<div class='gallery-item $big_size $filters'>";
								echo "<div class='grid-item-holder'>";
								echo "<div class='box-item'>";

								echo "<a href='$link' title='$description' class='$video_class'>";
								echo "<span class='overlay'></span>";
								echo "<i class='fa fa-search'></i>";
								echo "<img src='$thumb' alt='$description'>";
								echo "</a>";

								echo "</div>";
								echo "</div>";
								echo "</div>";

								
							}
						?>
					</div>
					<!-- end gallery items -->
				</div>
			</div>
		</div>
	</section>
	<?php
		get_template_part( 'templates/block', 'testimonials' );
	?>
</div>
<!--content end-->