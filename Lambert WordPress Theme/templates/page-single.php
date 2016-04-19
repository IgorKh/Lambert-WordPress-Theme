<div class="content">
	<!--================= Section post's ================-->
	<section class="align-text contact-container" id="sec2">
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-md-8 display-posts">
						<!--================= post ================-->
						<?php get_template_part( 'templates/loop', 'single' ); ?>

						<!-- coments -->
						<?php get_template_part( 'templates/block', 'comments' ); ?>
					</div>
					<!--================= sidebar  ================-->
					<?php get_template_part( 'templates/block', 'sidebar' ); ?>
					<!-- end sidebar -->
				</div>
			</div>
		</div>
	</section>
	<!-- section end -->
</div>