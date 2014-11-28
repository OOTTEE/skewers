<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Asignacion.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');

function index(){
	if(isUserLoginWhithRole('administrador')){
		//filtro por accion del usuario (parametro action recibido por GET o POST
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'editarAsignaciones' ){
			editarAsignaciones();
		}else{
			verAsignaciones();
		}
	}else{	
		redirecionar('/');		
	}
	closeServerSession();
}

function verAsignaciones(){
	connection();
	$conf = (new Configuracion())->get();
	$asignacion = new Asignacion();
	$asignaciones = $asignacion->getListAllAsignaciones();
	
	
	closeConnection();
	closeServerSession();
	
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavAdministrador.php');
	
	include_once($GLOBALS['TEMPLATES_PATH'].'asignaciones/verAsignaciones.php');
	
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}

function editarAsignaciones(){
	connection();
	//
	closeConnection();

	redirecionar($GLOBALS['CONTROLLER_URL'].'asignacionesController.php');
}



index();