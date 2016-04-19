<div class="content">
	<!--================= Section post's ================-->
	<section class="align-text" id="sec2">
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-md-8 display-posts">
						<article class="post">
							<h1><?= KGS( KHT_f( 'p404' )['header'] ) ?></h1>

							<p><?= KGS( KHT_f( 'p404' )['text'] ) ?></p>
							<br/>
							<br/>
							<br/>
							<br/>

							<img src="<?= KHT_f( 'p404' )['image'] ?>" alt="<?= KGS( KHT_f( 'p404' )['header'] ) ?>"/>

						</article>

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