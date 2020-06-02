<header class="main-header">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-sm-4">
				<a href="<?php echo get_option('home'); ?>">
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/sorena-logo.png" alt="<?php echo get_bloginfo('name'); ?>">
				</a>
				<a href="#" class="navToggle"><span class="fa fa-bars"></span></a>
			</div>
			<div class="col-12 col-sm-8">
				<nav>
					<?php wp_nav_menu(['nav' => 'Main Menú']); ?>
				</nav>
			</div>
		</div>
	</div>
</header>