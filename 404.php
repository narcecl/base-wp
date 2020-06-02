<?php get_header();?>

<body>
	<?php get_template_part( 'template-parts/includes/include', 'nav' ); ?>
	<main>

		<section class="seccion">
			<div class="container">
				<div class="col-md-9 center">
					<div class="animada fid">
						<div class="header-content mb-0 sm-text-center md-text-center xs-text-center">
							<h2 class="header-title">Página no encontrada</h2>
							<div class="separador"></div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<div class="boton-cont sm-text-center md-text-center xs-text-center">
							<a href="<?php echo get_option('home'); ?>" class="boton border-gris">Volver al inicio</a>
						</div>
					</div>
				</div>
		</section>

	</main>
	<?php get_footer(); ?>
</body>
</html>