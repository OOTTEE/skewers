<?php
require('../lib/php/includes.php');
require($GLOBALS['MODEL_PATH'].'Establecimiento.php');
require($GLOBALS['MODEL_PATH'].'Configuracion.php');
require($GLOBALS['MODEL_PATH'].'User.php');


/**
*	Author: Javier Lorenzo Martin
*	Controlador de acciones para el establecimiento.
*/
function index(){
	if(isUserLoginWhithRole('establecimiento')){
		$GLOBALS['conf']=(new Configuracion())->get();
		//filtro por accion del usuario (parametro action recibido por GET o POST
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'registrarPincho'  ){
			registrarPincho();
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'verPincho'  ){
			verPincho();
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'generarCodigos'  ){
			generarCodigos();
		}else {
			redirecionar($GLOBALS['INDEX']);
		}
	}else{
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'registerEstablecimiento' ){
			register();
		}else{
			redirecionar($GLOBALS['INDEX']);
		}
	}
	closeServerSession();
}

/**
*	Author: Hector Novoa Novoa
*	En este caso se crea el usuario para el establecimiento y el establecimiento asociado.
*/
function register(){

	$user = new User();
	$User_Id=$user->register(array(
		'name' => $_POST['name'],
		'username' => $_POST['username'],
		'password' => $_POST['password'],
		'role' =>  'establecimiento',
		'phone' => $_POST['phone'],
		'email' => $_POST['email'],));
	if(!$User_Id){
			addNotificacion("No se pudo crear el usuario","Danger");
			return false;
	}
	$establecimiento = new Establecimiento();
	$est=$establecimiento->register(array(
		'usuario_id'=>$User_Id,
		'web' => $_POST['web'],
		'direccion'=> $_POST['direccion'],
		'horario'=> $_POST['horario'],
		'descripcion'=> $_POST['descripcion']));
	if(!$est){
			addNotificacion("No se pudo crear el establecimiento","Danger");
			return false;
	}
	$img=UpImagen($User_Id,'e');
	if(!$img){
			addNotificacion("No se pudo insertar la Imagen","Danger");
	}
	addNotificacion("Usuario registrado satisfactoriamente","Success");
	redirecionar($GLOBALS['INDEX']);

}


/**
*	Author: Javier Lorenzo Martin
*	Se muestra la interfaz de registro de un pincho para un establecimiento dado
*/
function registrarPincho(){
	$establecimiento = new Establecimiento();
	$establecimiento->usuario_id = $_SESSION['user']['usuario_id'];
	$GLOBALS['Pincho'] = $establecimiento->hasPincho();

	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavEstablecimiento.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'establecimiento/registrarPincho.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');

}

/**
*	Author: Javier Lorenzo Martin
*	Se muestra la interfaz para ver el pincho y poder editarlo.
*/
function verPincho(){
	$establecimiento = new Establecimiento();
	$establecimiento->usuario_id = $_SESSION['user']['usuario_id'];
	$GLOBALS['Pincho'] = $establecimiento->hasPincho();

	if($GLOBALS['Pincho']){
		include_once($GLOBALS['LAYOUT_PATH'].'header.php');
		include_once($GLOBALS['LAYOUT_PATH'].'loginNavEstablecimiento.php');
		include_once($GLOBALS['TEMPLATES_PATH'].'establecimiento/editarPincho.php');
		include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
	}else{
		redirecionarWithParams($GLOBALS['CONTROLLER_URL'].'establecimientoController.php', array(array('action','registrarPincho'	)));
	}
}
/**
*	Author: Javier Lorenzo Martin
*	Se muestra la vista para la generacion de codigos.
*/
function generarCodigos(){
	$establecimiento = new Establecimiento();
	$establecimiento->usuario_id = $_SESSION['user']['usuario_id'];
	$GLOBALS['Pincho'] = $establecimiento->hasPincho();

	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavEstablecimiento.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'establecimiento/generarCodigos.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');


}

index();
