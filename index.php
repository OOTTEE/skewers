<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');
include_once($GLOBALS['MODEL_PATH'].'Pincho.php');
include_once($GLOBALS['MODEL_PATH'].'Establecimiento.php');

/**
*	Author: Javier Lorenzo Martin - Hector Novoa Novoa
*	Controlador Principal de la aplicación, controla el index de la pagina principal
*	Solo se muestra para usuarios no registrados, para usuario registrados se redireje al controlador userController.php
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
	
	}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'restaurantes'){
		restaurantes();		
	}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pinchos'){
		pinchos();
		
	}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'gastromapa'){
		gastromapa();
		
	}else{
	
		include_once($GLOBALS['TEMPLATES_PATH'].'index/index.php');
	}
		
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
function restaurantes(){
		$Oest= new Establecimiento();
		$Establecimientos=$Oest->getEstablecimientos();
		if(!isset($Establecimientos)){
			addNotificacion('No hay establecimientos validados', 'info');
			redirecionar('/');
		}
		include_once($GLOBALS['TEMPLATES_PATH'].'index/restaurantes.php');

}
function pinchos(){
		$Opin=new Pincho();
		$Pinchos=$Opin->getPinchosArray();
		if(!isset($Pinchos)){
			addNotificacion('No hay pinchos validados', 'info');
			redirecionar('/');
		}
		include_once($GLOBALS['TEMPLATES_PATH'].'index/pinchos.php');

}
function gastromapa(){
		include_once($GLOBALS['TEMPLATES_PATH'].'index/gastroMapa.php');

}
session_write_close(); 