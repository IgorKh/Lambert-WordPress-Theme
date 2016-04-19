<?php
	$data = KHT_f( 'testimonials' );
?>

<!--=============== testimonials ===============-->
<section class="parallax-section">
	<div class="bg bg-parallax" style="background-image:url(<?= $data['bg'] ?>)" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
	<div class="overlay"></div>
	<div class="container">
		<h2><?= KGS( $data['header']['title'] ) ?></h2>

		<h3><?= KGS( $data['header']['sub_title'] ) ?></h3>

		<div class="bold-separator">
			<span></span>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="testimonials-holder">
					<div class="customNavigation">
						<a class="prev-slide transition"><i class="fa fa-long-arrow-left"></i></a>
						<a class="next-slide transition"><i class="fa fa-long-arrow-right"></i></a>
					</div>
					<div class="testimonials-slider owl-carousel">
						<?php
							foreach ( $data['testimonials'] as $item ) {
								$name = $item['name'];
								$text = $item['text'];
								echo "<div class='item'>";
								echo "<ul><li><i class='fa fa-star'></i></li><li><i class='fa fa-star'></i></li><li><i class='fa fa-star'></i></li><li><i class='fa fa-star'></i></li><li><i class='fa fa-star'></i></li></ul>";
								echo "<p>' $text '</p>";
								echo "<h4>$name</h4>";
								echo "</div>";
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="section-icon"><i class="fa fa-quote-left"></i></div>
	</div>
</section>
<!--section end-->