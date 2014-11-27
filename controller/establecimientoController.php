<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');


function index(){
	if(isUserLoginWhithRole('establecimiento')){
		//filtro por accion del usuario (parametro action recibido por GET o POST
		/*if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'ACCION' ){
			ACCION();
		}else{*/
			inicio();
		//}		
	}else{	
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'registerEstablecimiento' ){
			register()
		}
				
	}
	closeServerSession();
}
function register(){
	connection();
	$establecimiento = new Establecimiento();
	$establecimiento->register(array(
		'name' => $_POST['name'],
		'username' => $_POST['username'],
		'password' => $_POST['password'],
		'role' =>  'popular',
		'phone' => $_POST['phone']
	));
	
	closeConnection();
	closeServerSession();
	redirecionar('/');
}


function inicio(){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'index/index.php');	
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
index();