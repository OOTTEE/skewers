<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');
include_once($GLOBALS['MODEL_PATH'].'Asignacion.php');


/**
*	Author: Javier Lorenzo Martin
*	Controlador de acciones del usuario administrador, solo se permite el acceso al usuario administrador
*/
function index(){
	if(isUserLoginWhithRole('administrador')){
		$GLOBALS['conf'] = (new Configuracion())->get();
		if($GLOBALS['conf']->votacionesFinalistas == 1 AND $GLOBALS['conf']->votacionesGanadores == 1){
				addNotificacion('<strong>ATENCION: </strong>Tanto como la votación de <u>pinchos finalistas</u> 
									y <u>pinchos ganadores</u> se <u>activada</u>.','warning');
		}	
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'verConfiguracion' ){
			verConfiguracion();
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'verAsignaciones' ){
			verAsignaciones();
		}else{	
			inicio();
		}
	}else{	
		redirecionar('/');		
	}
	closeServerSession();
}


/**
*	Author: Javier Lorenzo Martin
*	Aqui se muestra la vista principal del usuario administrador
*/
function inicio(){
	
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavAdministrador.php');
	
	include_once($GLOBALS['TEMPLATES_PATH'].'index/index.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}

/**
*	Author: Javier Lorenzo Martin
*	Se muestra la configuracion actual de la pagina
*/
function verConfiguracion(){
	
	$conf = (new Configuracion())->get();

	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavAdministrador.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'configuracion/configurarWeb.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}

/**
*	Author: Javier Lorenzo Martin
*	Se muestra las asignaciones actuales
*/
function verAsignaciones(){
	$asignacion = new Asignacion();
	$asignaciones = $asignacion->getListAllAsignaciones();
	
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavAdministrador.php');
	
	include_once($GLOBALS['TEMPLATES_PATH'].'asignaciones/verAsignaciones.php');
	
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}


index();