<?php
	$data = KHT_f( 'contact' );
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
			<div class="row">
				<div class="col-md-6">
					<div class="contact-details">
						<h3><?= KGS( $data['text']['title'] ) ?></h3>

						<p> <?= KGS( $data['text']['description'] ) ?></p>
					</div>
				</div>
				<div class="col-md-3">
					<?php
						foreach ( $data['addresses']['item'] as $key => $item ) {
							$title   = $item['title'];
							$address = $item['address'];
							$phone   = $item['phone'];
							$email   = $item['email'];

							if ( isset( $item['latitude'] ) && isset( $item['longitude'] ) ) {
								$latitude  = floatval( $item['latitude'] );
								$longitude = floatval( $item['longitude'] );

								$index = ( $key + 1 );

								echo "<script>var map_item_$index={lat: " . $latitude . ", long: " . $longitude . ", title: '" . $title . "' }</script>";
							}

							echo "<div class='contact-details'>";
							echo "<h4>$title</h4>";
							echo "<ul>";
							echo "<li><a href='#'>$address</a></li>";
							echo "<li><a href='tel:$phone'>$phone</a></li>";
							echo "<li><a href='mailto:yourmail@domain.com'>yourmail@domain.com</a></li>";
							echo "</ul>";
							echo "</div>";
						}
					?>
				</div>
				<div class="bold-separator">
					<span></span>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h3>Our location</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="no-padding">
		<div class="map-box">
			<div class="map-holder" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);">
				<div id="map-canvas"></div>
			</div>
		</div>
	</section>
	<section>
		<div class="triangle-decor"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h3>Get in Touch</h3>
						<h4 class="decor-title">Write us</h4>

						<div class="separator color-separator"></div>
					</div>
					<div class="contact-form-holder">
						<div id="contact-form">
							<div id="message2"></div>
							<form method="post" action="php/contact.php" name="contactform" id="contactform">
								<input name="name" type="text" class="name" onClick="this.select()" value="Name">
								<input name="email" type="text" class="email" onClick="this.select()" value="E-mail">
								<input name="phone" type="text" class="phone" onClick="this.select()" value="Phone">
								<textarea name="comments" class="comments" onClick="this.select()">Message</textarea>
								<button type="submit" id="submit">Send</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>