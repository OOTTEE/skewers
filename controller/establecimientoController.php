<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');


function index(){
	if(isUserLoginWhithRole('establecimiento')){
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
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	
	echo '<h1>establecimiento</h1>';
	
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
index();