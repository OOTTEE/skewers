<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');
include_once($GLOBALS['MODEL_PATH'].'Pincho.php');
include_once($GLOBALS['MODEL_PATH'].'Establecimiento.php');
/*Author: Hector Novoa Novoa
*
*/

function index(){
	$GLOBALS['conf']=(new Configuracion())->get();
		
	
	if(!isUserLogin()){	
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'restaurante'){
			restaurante('notLoginNav.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pincho'){
			pincho('notLoginNav.php');
		}else{
			inicio('notLoginNav.php');
		}
		
	}else if(isUserLoginWhithRole('administrador')){
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'restaurante'){
			restaurante('loginNavAdministrador.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pincho'){
			pincho('loginNavAdministrador.php');
		}else{
			inicio('loginNavAdministrador.php');
		}
	}else if(isUserLoginWhithRole('profesional')){
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'restaurante'){
			restaurante('loginNavProfesional.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pincho'){
			pincho('loginNavProfesional.php');
		}else{
			inicio('loginNavProfesional.php');
		}
	}else if(isUserLoginWhithRole('popular')){
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'restaurante'){
			restaurante('loginNavPopular.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pincho'){
			pincho('loginNavPopular.php');
		}else{
			inicio('loginNavPopular.php');
		}
	}else if(isUserLoginWhithRole('establecimiento')){
		$establecimiento = new Establecimiento();
		$establecimiento->usuario_id = $_SESSION['user']['usuario_id'];
		$GLOBALS['Pincho'] = $establecimiento->hasPincho();
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'restaurante'){
			restaurante('loginNavEstablecimiento.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pincho'){
			pincho('loginNavEstablecimiento.php');
		}else{
			inicio('loginNavEstablecimiento.php');
		}
	}else{
		redirecionar('/');
	}
	session_write_close(); 
}


function restaurante($nav){
	
	$Es=new Establecimiento();
	$EsInfo=$Es->getEstablecimientoByID($_POST['usuario_id']);
	
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].$nav);
	include_once($GLOBALS['TEMPLATES_PATH'].'index/restauranteInfo.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
function pincho($nav){
	$Pi=new Pincho();
	$Pi->usuario_id=$_POST['usuario_id'];
	$PiInfo=$Pi->getPinchoByUsuarioId();
	
	if(!isset($PiInfo)){
		addNotificacion('Pincho no registrado o no validado', 'warning');
	}
	
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].$nav);
	include_once($GLOBALS['TEMPLATES_PATH'].'index/pinchoInfo.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
	

}

index();
