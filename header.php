<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title><?php echo metaTitle(); ?></title>
	<meta name="description" content="<?php echo metaDescription(); ?>">
	<meta property="og:image" content="<?php echo oggImage(); ?>">
	<meta property="og:url" content="<?php echo get_site_url(); ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo metaTitle(); ?>">
	<meta property="og:description" content="<?php echo metaDescription(); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Nicolás Arce">
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/assets/images/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<?php wp_head(); ?>
</head>