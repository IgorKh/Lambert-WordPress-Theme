<?php
	$data = KHT_f( 'home' )['restaurants'];
?>
<!--=============== About 2 ===============-->
<section class="about-section">
	<!-- triangle decoration-->
	<div class="triangle-decor">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="single-slider-holder">
					<div class="customNavigation">
						<a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
						<a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
					</div>
					<div class="single-slider owl-carousel">
						<?php
							$alt = KGS( $data['title'] );
							foreach ( $data['slider'] as $slide ) {
								echo "<div class='item'><img src='$slide' class='respimg' alt='$alt'></div>";
							}
						?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="section-title">
					<h3><?= KGS( $data['title'] ) ?></h3>
					<h4 class="decor-title"><?= KGS( $data['subtitle'] ) ?></h4>

					<div class="separator color-separator"></div>
				</div>
				<p><?= KGS( $data['description'] ) ?></p>
				<a href="<?= ( get_the_permalink( $data['link'] ) ) ?>" title="<?= get_the_title( $data['link'] ) ?>" class="link"><?= KGS( $data['link_label'] ) ?></a>
			</div>
		</div>
	</div>
</section>
<!--section end-->