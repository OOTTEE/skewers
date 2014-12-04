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
			realizarValidacionPincho();
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

/**
*	Author: Edgar Guitian Rey
*	Aqui se muestra el menu de alta de miembros del jurado profesional
*/
function verAltaJuradoProfesional(){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavAdministrador.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/verAltaJuradoProfesional.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
/**
*	Author: Edgar Guitian Rey
*	Aqui se muestra el menu de modificacion de usuarios (lista de usuarios)
*/
function verModificarUsuario(){
	$usuario = new User();
	$Users = $usuario->getUsers();
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavAdministrador.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/verModificarUsuario.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
/**
*	Author: Edgar Guitian Rey
*	Aqui se muestra el menu de eliminacion de usuarios (lista de usuarios)
*/
function verEliminarUsuario(){
	$usuario = new User();
	$Users = $usuario->getUsers();		
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavAdministrador.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/verEliminarUsuario.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
	
}
/**
*	Author: Edgar Guitian Rey
*	Aqui se muestra el formulario de modificacion del usuario seleccionado
*/
function modificarUsuario(){
	$datosUsuario = new User();
	$datosUsuario->usuario_id= $_GET['usuario_id'];
	$datosUsuario->getUser();
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavAdministrador.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/modificarUsuario.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
/**
*	Author: Edgar Guitian Rey
*	Aqui se realiza la modificacion de los datos del usuario
*/
function realizarModificacion(){
	$user = new User();
	if($user->modifyUser($_POST['usuario_id'],$_POST['name'],$_POST['username'],$_POST['password'],$_POST['role'],$_POST['phone'])){
		addNotificacion("Usuario modificado","succcess");
		redirecionarWithParams($GLOBALS['CONTROLLER_URL'].'adminController.php',array(array('action','gestionarUsuario')));
	}
	else{
		addNotificacion("Usuario no modificado","danger");
		redirecionarWithParams($GLOBALS['CONTROLLER_URL'].'adminController.php',array(array('action','gestionarUsuario')));
	}	

}
/**
*	Author: Edgar Guitian Rey
*	Aqui se realiza la eliminacion del usaurio seleccionado
*/
function eliminarUsuario($nombreUsuario){
	$usuario = new User();
	if($usuario->deleteUser($nombreUsuario)){
		addNotificacion("Usuario eliminado","succcess");
		redirecionarWithParams($GLOBALS['CONTROLLER_URL'].'adminController.php',array(array('action','verEliminarUsuario')));
	}
	else{
		addNotificacion("Usuario no eliminado","danger");
		redirecionarWithParams($GLOBALS['CONTROLLER_URL'].'adminController.php',array(array('action','verEliminarUsuario')));
	}
	
}
/**
*	Author: Edgar Guitian Rey
*	Aqui se muestra el menu de validacion de pinchos
*/
function validarPinchoEstablecimiento(){
	$pincho = new Pincho();
	$Pinchos = $pincho->getPinchos();
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavAdministrador.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/validarPinchoEstablecimiento.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
/**
*	Author: Edgar Guitian Rey
*	Aqui se muestran los datos del pincho seleccionado
*/
function realizarValidacionPincho(){
	$pincho = new Pincho();
	$pincho->pincho_id=$_GET['idPincho'];
	$pincho->getPincho();
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavAdministrador.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/realizarValidacionPincho.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
/**
*	Author: Edgar Guitian Rey
*	Aqui se realiza la validacion del pincho seleccionado
*/
function validarPincho(){
	$pincho = new Pincho();
	if($pincho->validarPincho($_POST['pincho_id'])){
		addNotificacion("Pincho validado","succcess");
		redirecionarWithParams($GLOBALS['CONTROLLER_URL'].'adminController.php',array(array('action','validarPinchoEstablecimiento')));
	}
	else{
		addNotificacion("Pincho no validado","danger");
		redirecionarWithParams($GLOBALS['CONTROLLER_URL'].'adminController.php',array(array('action','validarPinchoEstablecimiento')));
	}
}
/**
*	Author: Edgar Guitian Rey
*	Aqui se realiza el alta de un miembro del jurado profesional
*/
function darAltaJuradoProfesional(){
	$user = new User();
	if($user->register(array(
		'name' => $_POST['name'],
		'username' => $_POST['username'],
		'password' => $_POST['password'],
		'role' =>  'profesional',
		'phone' => $_POST['phone'],
		'email' => $_POST['email']
	))){
		addNotificacion("Usuario dado de alta","succcess");
		redirecionarWithParams($GLOBALS['CONTROLLER_URL'].'adminController.php',array(array('action','gestionarUsuario')));
	}
	else{
		addNotificacion("Usuario no dado de alta","danger");
		redirecionarWithParams($GLOBALS['CONTROLLER_URL'].'adminController.php',array(array('action','gestionarUsuario')));
	}
}
index();
