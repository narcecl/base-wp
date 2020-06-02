<?php

// Funciones para agregar funcionalidades al admin de WordPress

function change_admin_footer(){
	echo '<span id="footer-thankyou">Desarrollado por <a href="http://www.pixelstudio.cl/" target="_blank">Pixel Studio</a> con WordPress.</span>';
}

function remove_menus(){
	// remove_menu_page( 'index.php' );                  //Dashboard
	// remove_menu_page( 'jetpack' );                    //Jetpack* 
	// remove_menu_page( 'edit.php' );                   //Posts
	remove_menu_page( 'upload.php' );                 //Media
	// remove_menu_page( 'edit.php?post_type=page' );    //Pages
	remove_menu_page( 'edit-comments.php' );          //Comments
	// remove_menu_page( 'themes.php' );                 //Appearance
	//remove_menu_page( 'plugins.php' );                //Plugins
	// remove_menu_page( 'users.php' );                  //Users
	remove_menu_page( 'tools.php' );                  //Tools
	// remove_menu_page( 'options-general.php' );        //Settings
}
add_action( 'admin_menu', 'remove_menus' );

// add_image_size('proyecto_thumbnail', 250, 250, array('center', 'center'));

// Filters
add_filter('admin_footer_text', 'change_admin_footer');
?>