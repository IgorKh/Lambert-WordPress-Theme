<!--=============== Hero content ===============-->
<div class="content full-height hero-content">
	<div class="slideshow-container" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);">
		<!-- slideshow -->
		<div class="slides-container">
			<?php
				$slides = KHT_f( 'home' )['header']['bg'];
				foreach ( $slides as $slide ) {
					echo "<div class='bg' style='background-image: url($slide)'></div>";
				}
			?>
		</div>
	</div>
	<div class="hero-title-holder">
		<div class="overlay"></div>
		<div class="hero-title">
			<div class="hero-decor b-dec">
				<div class="half-circle"></div>
			</div>
			<div class="separator color-separator"></div>
			<h3><?= KGS( KHT_f( 'home' )['header']['title'] ) ?></h3>
			<h4><?= KGS( KHT_f( 'home' )['header']['description'] ) ?></h4>
		</div>
	</div>
	<div class="hero-link">
		<a class="custom-scroll-link" href="#sec1"><i class="fa fa-angle-double-down"></i></a>
	</div>
</div>
<!--hero end-->
<div class="content">
	<?php get_template_part( 'templates/block', 'discover' ) ?>

	<?php get_template_part( 'templates/block', 'open_hours' ) ?>

	<?php get_template_part( 'templates/block', 'restaurants' ) ?>

	<?php get_template_part( 'templates/block', 'weakly_deals' ) ?>

	<?php get_template_part( 'templates/block', 'team' ) ?>

	<?php get_template_part( 'templates/block', 'testimonials' ) ?>

</div>
<!--content end-->