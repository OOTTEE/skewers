<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Asignacion.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');

function index(){
	if(isUserLoginWhithRole('administrador')){
		$GLOBALS['conf'] = (new Configuracion())->get();
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
	$asignacion = new Asignacion();
	$asignaciones = $asignacion->getListAllAsignaciones();
	
	
	
	
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavAdministrador.php');
	
	include_once($GLOBALS['TEMPLATES_PATH'].'asignaciones/verAsignaciones.php');
	
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}

function editarAsignaciones(){
	$profesional_id = $_POST['usuario_id'];
	unset($_POST['usuario_id']);
	
	$Asignacion = new Asignacion();
	$Asignacion->deleteAllFromUser($profesional_id);
	if(count($_POST) > 0){
		if(!$Asignacion->create($_POST, $profesional_id)){
			addNotificacion('Se ha producido un error durante el guardado, intentelo de nuevo.','danger');
			redirecionar($GLOBALS['CONTROLLER_URL'].'asignacionesController.php');
		}
	}
	addNotificacion('Cambios Guardados Correctamente','success');
	redirecionar($GLOBALS['CONTROLLER_URL'].'asignacionesController.php');
}



index();