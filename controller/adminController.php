<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
require_once($GLOBALS['MODEL_PATH'].'Configuracion.php');
require_once($GLOBALS['MODEL_PATH'].'Asignacion.php');
require_once($GLOBALS['MODEL_PATH'].'User.php');
require_once($GLOBALS['MODEL_PATH'].'Pincho.php');


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
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'gestionarUsuario' ){
			gestionarUsuario();
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'validarPinchoEstablecimiento' ){
			validarPinchoEstablecimiento();
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'VerAltaJuradoProfesional' ){
			verAltaJuradoProfesional();
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'VerModificarUsuario' ){
			verModificarUsuario();
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'VerEliminarUsuario' ){						
			verEliminarUsuario();
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'eliminarUsuario' ){						
			eliminarUsuario($_GET['nameUser']);
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'modificarUsuario' ){						
			modificarUsuario($_GET['nameUser']);
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'realizarValidacionPincho' ){						
			realizarValidacionPincho($_GET['namePincho']);
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'register' ){
			darAltaJuradoProfesional();			
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'modify' ){
			realizarModificacion();
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'validar' ){
			validarPincho();
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'volver' ){
			redirecionar('/');
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'verAsignaciones' ){
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


function gestionarUsuario(){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/gestionUsuario.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');

}
function verAltaJuradoProfesional(){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/verAltaJuradoProfesional.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
function verModificarUsuario(){
	connection();
	$usuario = new User();
	$idUsers = $usuario->getUsers();
	$countUsers = $usuario->countUsers()[0];
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/verModificarUsuario.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
function verEliminarUsuario(){
	connection();
	$usuario = new User();
	$idUsers = $usuario->getUsers();
	$countUsers = $usuario->countUsers()[0];		
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/verEliminarUsuario.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
	
}
function modificarUsuario($nombreUsuario){
	connection();
	$usuario = new User();
	$idUsuario = $usuario->getID($nombreUsuario);
	$datosUsuario = $usuario->getUser($idUsuario); 
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/modificarUsuario.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
function realizarModificacion(){
	connection();
	$user = new User();
	$resultado = $user->modifyUser($_POST['usuario_id'],$_POST['name'],$_POST['username'],$_POST['password'],$_POST['role'],$_POST['phone']);
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/realizarModificacion.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');

}
function eliminarUsuario($nombreUsuario){
	connection();
	$usuario = new User();
	if($usuario->deleteUser($nombreUsuario)){

		addNotificacion("","succcess");
		redireccionar('/');

	}
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/eliminarUsuario.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
function validarPinchoEstablecimiento(){
	connection();
	$pincho = new Pincho();
	$nombresPinchos = $pincho->getPinchos();
	$numPinchos = $pincho->countPinchos()[0];
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/validarPinchoEstablecimiento.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
function realizarValidacionPincho($namePincho){
	connection();
	$pincho = new Pincho();
	$numPinchos = $pincho->countPinchos()[0];
	$datosPincho = $pincho->getPincho($namePincho);
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/realizarValidacionPincho.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
function validarPincho(){
	connection();
	$pincho = new Pincho();
	$resultado = $pincho->validarPincho($_POST['pincho_id']);
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/resultadoValidacion.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
function darAltaJuradoProfesional(){
	connection();
	$user = new User();
	$user->register(array(
		'name' => $_POST['name'],
		'username' => $_POST['username'],
		'password' => $_POST['password'],
		'role' =>  'profesional',
		'phone' => $_POST['phone']
	));
	closeConnection();
	closeServerSession();
	redirecionar('/');
}
index();
