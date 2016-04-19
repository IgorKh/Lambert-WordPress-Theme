<div class="content">
	<section class="parallax-section header-section">
		<div class="bg bg-parallax" style="background-image:url(<?= KHT_f( 'blog' )['header']['bg'] ?>)" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
		<div class="overlay"></div>
		<div class="container">
			<h2><?= KGS(KHT_f( 'blog' )['header']['title']) ?></h2>

			<h3><?= KGS(KHT_f( 'blog' )['header']['description']) ?> </h3>
		</div>
	</section>
	<!--================= Section post's ================-->
	<section class="align-text">
		<div class="triangle-decor"></div>
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-md-8 display-posts">
						<?php get_template_part( 'templates/block', 'blog-titles' ) ?>
						<!-- post-->

						<?php get_template_part( 'templates/loop', 'blog' ) ?>

						<div class="pagination">
							<?php
								echo paginate_links( array(
									'prev_text' => '<i class="fa fa-chevron-left"></i>',
									'next_text' => '<i class="fa fa-chevron-right"></i>',
								) );
							?>
						</div>
					</div>
<?php get_template_part( 'templates/block', 'sidebar' ) ?>

				</div>
			</div>
		</div>
	</section>
	<!-- section end -->
</div>