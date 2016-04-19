<?php
	$data = KHT_f( 'home' )['weakly_deals'];
?>

<!--=============== Weekly Deals ===============-->
<section class="parallax-section">
	<div class="bg bg-parallax" style="background-image:url(<?= $data['bg'] ?>)" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
	<div class="overlay"></div>
	<div class="container">
		<h2><?= KGS( $data['title'] ) ?></h2>

		<h3><?= KGS( $data['subtitle'] ) ?></h3>

		<div class="bold-separator">
			<span></span>
		</div>
		<div class="row">
			<?php
				foreach ( $data['menu'] as $item ) {

					$day       = $item['day'];
					$details   = $item['details'];
					$name      = $item['name'];
					$old_price = $item['old_price'];
					$new_price = $item['new_price'];


					echo "<div class='col-md-12'>";
					echo "<div class='promotion-item'>";

					echo "<div class='promotion-title'>";
					echo "<h4>$day</h4>";
					echo $details !== '' ? "<span>( $details )</span>" : '';
					echo "</div>";


					echo "<div class='promotion-details'>";
					echo "<div class='promotion-desc'>$name</div>";
					echo "<div class='promotion-dot'></div>";
					echo "<div class='promotion-prices'>";
					echo "<span class='promotion-price'>$old_price</span>";
					echo "<span class='promotion-discount'>$new_price</span>";
					echo "</div>";
					echo "</div>";


					echo "</div>";
					echo "</div>";
				}
			?>
		</div>
		<a href="<?= get_the_permalink( $data['link'] ) ?>" title="<?= get_the_title( $data['link'] ) ?>" class="align-link link"><?= KGS( $data['link_label'] ) ?></a>
	</div>
</section>
<!--section end-->