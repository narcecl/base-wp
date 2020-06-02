<?php

// Funciones especiales para el template

function contacto(){
	$params = array();
	parse_str($_GET['form'], $params);

	$header = 'From: ' . $params['email'] . " \r\n";
	$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
	$header .= "Mime-Version: 1.0 \r\n";
	$header .= "Content-type: text/html; charset=UTF-8 \r\n";

	$mensaje = "Estimados<br>";
	$mensaje .= "Ha llegado un mensaje desde el sitio web de Nicolás Arce<br><br>";
	
	$mensaje .= "<b>Nombre</b>: ".$params['nombre']."<br>";
	$mensaje .= "<b>Email</b>: ".$params['email']."<br>";
	$mensaje .= "<b>Teléfono</b>: ".$params['telefono']."<br>";
	$mensaje .= "<b>Asunto</b>: ".$params['asunto']."<br>";
	if($params['mensaje']) $mensaje .= "<b>Mensaje</b>: ".$params['mensaje']."<br>";

	$mensaje .= "<br><br>Enviado el " .fechaHoy().", IP: ".get_client_ip_env().".";

	$para = trim(get_field('email', 5));
	$asunto = "Ha llegado un mensaje de ".html_entity_decode($params['nombre']);

	mail($para, $asunto, utf8_decode($mensaje), $header);
	
	$respuesta = [
		"alerta" => "Success"
	];

	echo json_encode($respuesta);
	die();
}
add_action('wp_ajax_contacto', 'contacto');
add_action('wp_ajax_nopriv_contacto', 'contacto');

?>