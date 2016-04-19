<?php
	$data = KHT_f( 'open_hours' );
?>

<!--=============== Opening Hours ===============-->
<section class="parallax-section">
	<div class="media-container video-parallax" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);">
		<div class="bg mob-bg" style="background-image: url(<?= $data['bg'] ?>)"></div>
		<div class="video-container">
			<video autoplay loop muted class="bgvid">
				<source src="<?= $data['video'] ?>" type="video/mp4">
			</video>
		</div>
	</div>
	<div class="overlay"></div>
	<div class="container">
		<h2><?= KGS( $data['header']['title'] ) ?></h2>

		<h3><?= KGS( $data['header']['sub_title'] ) ?></h3>

		<div class="bold-separator">
			<span></span>
		</div>
		<div class="work-time">
			<div class="row">
				<div class="col-md-6">
					<h3><?= KGS( $data['block1']['title'] ) ?></h3>

					<div class="hours">
						<?= KGS( $data['block1']['time1'] ) ?><br>
						<?= KGS( $data['block1']['time2'] ) ?>
					</div>
				</div>
				<div class="col-md-6">
					<h3><?= KGS( $data['block2']['title'] ) ?></h3>

					<div class="hours">
						<?= KGS( $data['block2']['time1'] ) ?><br>
						<?= KGS( $data['block2']['time2'] ) ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="big-number">
					<a href="tel:<?= KGS( $data['phone'] ) ?>"><?= KGS( $data['phone'] ) ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--section end-->