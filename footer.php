<?php get_template_part( 'template-parts/includes/include', 'footer' ); ?>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/multi.css">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet"> 

<script src="https://use.fontawesome.com/9a00c74b3c.js"></script>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/main.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/functions.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.flexslider.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/viewportchecker.js"></script>
<script>
	const ajax = "<?php echo admin_url('admin-ajax.php'); ?>";
	const ruta = "<?php bloginfo('template_directory'); ?>/";
</script>

<?php wp_footer(); ?>