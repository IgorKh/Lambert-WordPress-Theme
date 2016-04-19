<!--=============== footer ===============-->
<footer>
	<div class="footer-inner">
		<div class="container">
			<div class="row">
				<!--tiwtter-->
				<div class="col-md-4">
				</div>
				<!--footer social links-->
				<div class="col-md-4">
					<?= KHT_menu_social( true ); ?>
				</div>
				<!--subscribe form-->
				<div class="col-md-4">
				</div>
			</div>
			<div class="bold-separator">
				<span></span>
			</div>
			<!--footer contacts links -->
			<?php
				get_template_part( 'templates/block', 'footer-contacts' );
			?>
		</div>
	</div>
	<!--to top / privacy policy-->
	<div class="to-top-holder">
		<div class="container">
			<p><span> &#169; <?= get_bloginfo( 'name' ) ?>
					2015 . </span> <?= KGS( KHT_f( 'headerFooter' )['footer']['text']['copyright'] ) ?></p>

			<div class="to-top">
				<span><?= KGS( KHT_f( 'headerFooter' )['footer']['text']['toTop'] ) ?> </span><i class="fa fa-angle-double-up"></i>
			</div>
		</div>
	</div>
</footer>
<!--footer end -->
</div>
<!-- wrapper end -->
</div>
<!-- Main end -->
<!--=============== scripts  ===============-->
<script>
	var templateUri = "<?= get_template_directory_uri() ?>/";
</script>
<?php wp_footer() ?>

</body>
</html>