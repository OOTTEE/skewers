<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');


function index(){
	if(isUserLoginWhithRole('popular')){
		//filtro por accion del usuario (parametro action recibido por GET o POST
		/*if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'ACCION' ){
			ACCION();
		}else{
			inicio();
		}*/
		inicio();
	}else{	
		redirecionar('/');		
	}
	closeServerSession();
}

function inicio(){
	
	$conf = (new Configuracion())->get();
	
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'popular/index.php'); //accedemos al index de popular.
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
index();