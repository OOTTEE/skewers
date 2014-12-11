<?php
include_once(getcwd().'/../lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Asignacion.php');

/**
*	Author: Javier Lorenzo Martin
*	Controlador de acciones para las asignaciones, solo se permite el acceso al usuario administrador
*/
function index(){
	if(isUserLoginWhithRole('administrador')){
		//filtro por accion del usuario (parametro action recibido por GET o POST
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'editarAsignaciones' ){
			editarAsignaciones();
		}else{
			redirecionar('/');
		}
	}else{	
		redirecionar('/');		
	}
	closeServerSession();
}

/**
*	Author: Javier Lorenzo Martin
*	En este caso, se editan las asignaciones para un usuario dado,
*	para ello primero se borran todas sus asignaciones, y se crean las nuevas.
*/
function editarAsignaciones(){
	$profesional_id = $_POST['usuario_id'];
	unset($_POST['usuario_id']);
	
	$Asignacion = new Asignacion();
	$Asignacion->deleteAllFromUser($profesional_id);
	if(count($_POST) > 0){
		if(!$Asignacion->create($_POST, $profesional_id)){
			addNotificacion('Se ha producido un error durante el guardado, intentelo de nuevo.','danger');
		}else{
			addNotificacion('Cambios Guardados Correctamente','success');
		}
	}
	addNotificacion('Cambios Guardados Correctamente','success');
	redirecionarWithParams($GLOBALS['CONTROLLER_URL'].'adminController.php', array(array('action','verAsignaciones'	)));
}



index();