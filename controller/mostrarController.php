<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');
include_once($GLOBALS['MODEL_PATH'].'Pincho.php');
include_once($GLOBALS['MODEL_PATH'].'Establecimiento.php');
/*Author: Hector Novoa Novoa
*
*/
$conf = (new Configuracion())->get();

if(isUserLogin()){
	redirecionar($GLOBALS['CONTROLLER_URL'].'usersController.php');		
}else{

	include_once($GLOBALS['LAYOUT_PATH'].'header.php');

	include_once($GLOBALS['LAYOUT_PATH'].'notLoginNav.php');
		
	if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'register'){
	
		include_once($GLOBALS['TEMPLATES_PATH'].'index/register.php');
	
	}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'registerEstablecimiento'){
	
		include_once($GLOBALS['TEMPLATES_PATH'].'index/registerEstablecimiento.php');
	
	}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'restaurante'){
		restaurante();
	}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pincho'){
		pincho();
		
	}else{
	
		include_once($GLOBALS['TEMPLATES_PATH'].'index/index.php');
	}
		
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}

function restaurante(){
	
	$Es=new Establecimiento();
	$EsInfo=$Es->getEstablecimientoByID($_POST['usuario_id']);
	include_once($GLOBALS['TEMPLATES_PATH'].'index/restauranteInfo.php');
}
function pincho(){
	$Pi=new Pincho();
	$Pi->usuario_id=$_POST['usuario_id'];
	$PiInfo=$Pi->getPinchoByUsuarioId();
	
	if(!isset($PiInfo)){
		addNotificacion('Pincho no registrado o no validado', 'warning');
	}
		include_once($GLOBALS['TEMPLATES_PATH'].'index/pinchoInfo.php');
	

}
