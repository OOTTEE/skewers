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
function index(){
	$GLOBALS['conf']=(new Configuracion())->get();
		
	
	if(!isUserLogin()){	
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'register'){
			registrarUsuario();
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'registerEstablecimiento'){
			registrarEstablecimiento();
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'restaurantes'){
			restaurantes('notLoginNav.php');		
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pinchos'){
			pinchos('notLoginNav.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'finalistas'){
			finalistas('notLoginNav.php');
		}else{
			inicio('notLoginNav.php');
		}
		
	}else if(isUserLoginWhithRole('administrador')){
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'restaurantes'){
			restaurantes('loginNavAdministrador.php');		
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pinchos'){
			pinchos('loginNavAdministrador.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'finalistas'){
			finalistas('loginNavAdministrador.php');
		}else{
			inicio('loginNavAdministrador.php');
		}
	}else if(isUserLoginWhithRole('profesional')){
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'restaurantes'){
			restaurantes('loginNavProfesional.php');		
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pinchos'){
			pinchos('loginNavProfesional.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'finalistas'){
			finalistas('loginNavProfesional.php');
		}else{
			inicio('loginNavProfesional.php');
		}
	}else if(isUserLoginWhithRole('popular')){
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'restaurantes'){
			restaurantes('loginNavPopular.php');		
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pinchos'){
			pinchos('loginNavPopular.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'finalistas'){
			finalistas('loginNavPopular.php');
		}else{
			inicio('loginNavPopular.php');
		}
	}else if(isUserLoginWhithRole('establecimiento')){
		$establecimiento = new Establecimiento();
		$establecimiento->usuario_id = $_SESSION['user']['usuario_id'];
		$GLOBALS['Pincho'] = $establecimiento->hasPincho();
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'restaurantes'){
			restaurantes('loginNavEstablecimiento.php');		
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pinchos'){
			pinchos('loginNavEstablecimiento.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'finalistas'){
			finalistas('loginNavEstablecimiento.php');
		}else{
			inicio('loginNavEstablecimiento.php');
		}
	}else{
		redirecionar('/');
	}
	session_write_close(); 
}

function inicio($nav){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].$nav);
	include_once($GLOBALS['TEMPLATES_PATH'].'index/index.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');

}
function registrarEstablecimiento(){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'notLoginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'index/registerEstablecimiento.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');


}
function registrarUsuario(){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'notLoginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'index/register.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');


}
function restaurantes($nav){
		$Oest= new Establecimiento();
		$Establecimientos=$Oest->getEstablecimientos();
		if($Establecimientos==false){
			addNotificacion('No hay establecimientos validados', 'info');
			redirecionar('/');
		}else{
		include_once($GLOBALS['LAYOUT_PATH'].'header.php');
		include_once($GLOBALS['LAYOUT_PATH'].$nav);
		include_once($GLOBALS['TEMPLATES_PATH'].'index/restaurantes.php');
		include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
		}
}
function pinchos($nav){
		$Opin=new Pincho();
		$Pinchos=$Opin->getPinchosArray();
		if($Pinchos==false){
			addNotificacion('No hay pinchos validados', 'info');
			redirecionar('/');
		}else{
		include_once($GLOBALS['LAYOUT_PATH'].'header.php');
		include_once($GLOBALS['LAYOUT_PATH'].$nav);
		include_once($GLOBALS['TEMPLATES_PATH'].'index/pinchos.php');
		include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
		}
}
function finalistas($nav){
		include_once($GLOBALS['LAYOUT_PATH'].'header.php');
		include_once($GLOBALS['LAYOUT_PATH'].$nav);
		include_once($GLOBALS['TEMPLATES_PATH'].'index/finalistas.php');
		include_once($GLOBALS['LAYOUT_PATH'].'footer.php');

}
index();