<header class="main-header">
	<div class="container">
		<div class="row flex">
			<div class="col-md-4 col-sm-4">
				<div class="cont-ext">
					<div class="cont-int">
						<a href="<?php echo get_option('home'); ?>">
							<img src="<?php bloginfo('template_directory'); ?>/assets/images/narce-logo.png" alt="<?php echo get_bloginfo('name'); ?>">
						</a>
						<a href="#" class="navToggle"><span class="fa fa-bars"></span></a>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-sm-8">
				<div class="cont-ext">
					<div class="cont-int">
						<nav>
							<?php wp_menu_nav(); ?>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>