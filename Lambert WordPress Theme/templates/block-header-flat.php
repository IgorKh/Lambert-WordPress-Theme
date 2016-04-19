<!--=============== header ===============-->
<header class="flat-header">
	<div class="header-inner">
		<div class="container">
			<!--navigation social links-->
			<?= KHT_menu_social(); ?>
			<!--logo-->
			<div class="logo-holder">
				<a href="<?= site_url() ?>">
					<img src="<?= KHT_f( 'general' )['logo']['logo_footer'] ?>" class="respimg" alt="<?= get_bloginfo( 'name' ) ?>">
				</a>
			</div>
			<!--Navigation -->
			<div class="nav-holder">
				<nav>
					<?= KHT_cn('main-menu') ?>
				</nav>
			</div>
		</div>
	</div>
</header>
<!--header end-->