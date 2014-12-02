<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');
include_once($GLOBALS['MODEL_PATH'].'Pincho.php');
include_once($GLOBALS['MODEL_PATH'].'Establecimiento.php');

if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'restaurante'){

	restaurante();
}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pincho'){

    pincho();
}else{
	redirecionar('/');
}

function restaurante(){
	$Es=new Establecimiento();
	$EsInfo=$es->getEstablecimientosByID($POST['usuario_id']);


include_once($GLOBALS['TEMPLATES_PATH'].'index/restauranteInfo.php');
}
function pincho(){
include_once($GLOBALS['TEMPLATES_PATH'].'index/pinchoInfo.php');
}
