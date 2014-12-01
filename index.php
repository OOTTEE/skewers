<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');

/**
*	Author: Javier Lorenzo Martin
*	Controlador Principal de la aplicación, controla el index de la pagina principal
*	Solo se muestra para usuarios registrados, para usuario registrados se redireje al controlador userController.php
*
*/
$conf = (new Configuracion())->get();
if(isUserLogin()){
	redirecionar($GLOBALS['CONTROLLER_URL'].'usersController.php');		
}else{

	include_once($GLOBALS['LAYOUT_PATH'].'header.php');

	include_once($GLOBALS['LAYOUT_PATH'].'notLoginNav.php');
		
	if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'register'){
		include_once($GLOBALS['TEMPLATES_PATH'].'index/register.php');
	}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'registerEstablecimiento'){
		include_once($GLOBALS['TEMPLATES_PATH'].'index/registerEstablecimiento.php');
	}else{
			include_once($GLOBALS['TEMPLATES_PATH'].'index/index.php');
	}
		
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}

session_write_close(); 