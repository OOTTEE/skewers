<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');

connection();
$conf = (new Configuracion())->get();
closeConnection();

if(isUserLogin()){
	redirecionar($GLOBALS['CONTROLLER_URL'].'usersController.php');		
}

include_once($GLOBALS['LAYOUT_PATH'].'header.php');

include_once($GLOBALS['LAYOUT_PATH'].'notLoginNav.php');
	
if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'register'){
	include_once($GLOBALS['TEMPLATES_PATH'].'index/register.php');
}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'registerEstablecimiento'){
	include_once($GLOBALS['TEMPLATES_PATH'].'index/registerEstablecimiento.php');
}else{
		include_once($GLOBALS['TEMPLATES_PATH'].'index/index.php');
}
	
include_once($GLOBALS['LAYOUT_PATH'].'footer.php');

session_write_close();
?>
