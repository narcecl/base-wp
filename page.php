<?php get_header();?>

<body>
	<?php get_template_part( 'template-parts/includes/include', 'nav' ); ?>

	<main>
		<?php
		if(have_posts()){
			while(have_posts()){
				the_post();

				get_template_part('template-parts/page/page','default');
			}
		}
		?>
	</main>

	<?php get_footer(); ?>
</body>
</html>