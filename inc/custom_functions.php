<?php

// Funciones globales, reutilizables

if(function_exists( 'register_nav_menu')){
	// REGISTRA EL MENU
	register_nav_menu( 'main-menu', 'Main Menu' );
}

function wpcodex_add_excerpt_support_for_pages() {
	// HABILITA EL EXCERPT EN LAS PAGINAS
	add_post_type_support( 'page', 'excerpt' );
}

function custom_length_excerpt( $word_count_limit ){
	// DEVUELVE EL CONTENT LIMITADO POR CIERTOS CARACTERES
	$content = wp_strip_all_tags(get_the_content(), true);
	echo wp_trim_words($content, $word_count_limit);
}

function get_excerpt_by_id( $post_id ){
	// OBTENER EXCERPT POR ID ESPECIFICA
	$the_post = get_post($post_id); //Gets post ID
	$the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
	$excerpt_length = 25; //Sets excerpt length by word count
	$the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
	$words = explode(' ', $the_excerpt, $excerpt_length + 1);

	if(count($words) > $excerpt_length) :
		array_pop($words);
		array_push($words, '…');
		$the_excerpt = implode(' ', $words);
	endif;

	return $the_excerpt;
}

function category_has_parent($catid){
	// COMPRUEBA SI UNA CATEGORIA ES HIJA
	$category = get_category($catid);
	if ($category->category_parent > 0){
		return true;
	}
	return false;
}

function ced_add_image_meta_data( $attachment_ID ) {
	// AÑADE AUTOMATICAMENTE LAS ETIQUETAS ALT A TODAS LAS IMAGENES SUBIDAS

	$filename	=	$_REQUEST['name']; // or get_post by ID
	$withoutExt	=	preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
	$withoutExt	=	str_replace(array('-','_'), ' ', $withoutExt);

	$my_post = array(
		'ID'			=>	$attachment_ID,
		'post_excerpt'	=>	$withoutExt,  // caption
		'post_content'	=>	$withoutExt,  // description
	);
	wp_update_post( $my_post );
	update_post_meta($attachment_ID, '_wp_attachment_image_alt', $withoutExt); // update alt text for post
}

function seguridad_php($var){ 
	// Parsea y limpia un string en PHP
	$var = str_replace("'", "\'", $var);  
	$var = htmlspecialchars ($var);  
	$var = htmlentities ($var);  
	$var = trim ($var);   
	return $var;
}  

function textoCorto($cantidad){
	// Corta un texto en palabra
	$content=strip_tags(get_the_content());
	$words = explode(' ', $content, $cantidad + 1);

	if(count($words) > $excerpt_length) :
		array_pop($words);
		array_push($words, '…');
		$the_excerpt = implode(' ', $words);
	endif;

	return $the_excerpt;
}

function redirect($url){
	// Redirect Javascript
	echo '<script type="text/javascript">window.location = "{$url}"</script>';
	return false;
}

function showMsg($type, $texto){
	$icon = ($type === 'success') ? 'glyphicon-ok' : 'glyphicon-remove';

	echo '<div class="alert {$type} animated fade"><p><span class="glyphicon {$icon}"></span>'.$texto.'</p><span onclick="javascript:Cerrar(this);" class="glyphicon glyphicon-remove close"></span></div>';
}

function metaTitle(){
	if(is_home()) {
		return get_bloginfo('name').' - '.get_bloginfo('description');
	}
	elseif(is_404()){
		return 'Página no encontrada - '.get_bloginfo('name');
	}
	elseif(is_category()){
		$thiscat = get_category(get_query_var('cat'));
		return $thiscat->cat_name.' - '.get_bloginfo('name');
	}
	else{
		return the_title()." - ".get_bloginfo('name');
	}
}

function oggImage(){
	if(is_single()) {
		return get_the_post_thumbnail_url(get_the_ID(), 'medium');
	}
	else{
		return bloginfo('template_directory').'/screenshot.jpg';
	}
}

function metaDescription(){
	if(is_single()) {
		global $post;
		$content=strip_tags(get_post($post)->post_content);
		$words = explode(' ', $content, 100 + 1);

		if(count($words) > $excerpt_length) :
			array_pop($words);
			array_push($words, '…');
			$the_excerpt = implode(' ', $words);
		endif;

		return $the_excerpt;
	}else{
		return get_bloginfo('description');
	}
}

function fechaHoy(){
	date_default_timezone_set('America/Santiago');
	$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio','Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
	return date('d')." de ".$arrayMeses[date('m')-1]." del ".date('Y')." a las ".date('H:i').' hrs';
}

function get_client_ip_env() {
	$ipaddress = '';
	if (getenv('HTTP_CLIENT_IP'))
		$ipaddress = getenv('HTTP_CLIENT_IP');
	else if(getenv('HTTP_X_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	else if(getenv('HTTP_X_FORWARDED'))
		$ipaddress = getenv('HTTP_X_FORWARDED');
	else if(getenv('HTTP_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_FORWARDED_FOR');
	else if(getenv('HTTP_FORWARDED'))
		$ipaddress = getenv('HTTP_FORWARDED');
	else if(getenv('REMOTE_ADDR'))
		$ipaddress = getenv('REMOTE_ADDR');
	else
		$ipaddress = 'UNKNOWN';
 
	return $ipaddress;
}

function getCustomIMG($field,$imagen){
	$image = get_field($field);
	return ( $imagen == true ) ? '<img src="'.$image['url'].'" alt="'.$image['alt'].'">' : $image['url'];
}

// Filters, adds
add_theme_support( 'post-thumbnails' );
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages' );
add_action( 'add_attachment', 'ced_add_image_meta_data' );
add_filter('single_template', create_function('$t', 'foreach( (array) get_the_category() as $cat ) { if ( file_exists(TEMPLATEPATH . "/single-{$cat->term_id}.php") ) return TEMPLATEPATH . "/single-{$cat->term_id}.php"; } return $t;' ));
?>