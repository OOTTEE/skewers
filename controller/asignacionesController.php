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
	
	$conf = (new Configuracion())->get();
	$asignacion = new Asignacion();
	$asignaciones = $asignacion->getListAllAsignaciones();
	
	
	
	closeServerSession();
	
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavAdministrador.php');
	
	include_once($GLOBALS['TEMPLATES_PATH'].'asignaciones/verAsignaciones.php');
	
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}

function editarAsignaciones(){
	var_dump($_POST);
	$profesional_id = $_POST['usuario_id'];
	unset($_POST['usuario_id']);
	echo '<br/>';
	var_dump($_POST);
	
	

	die();
	redirecionar($GLOBALS['CONTROLLER_URL'].'asignacionesController.php');
}



index();