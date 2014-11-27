<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Pincho.php');


function index(){
	if(isUserLoginWhithRole('establecimiento')){
		//filtro por accion del usuario (parametro action recibido por GET o POST
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'registrarPincho' ){
			registrarPincho();
		}else{
			redirecionar('/');		
		}
	}else{	
		redirecionar('/');		
	}
}

function addPincho(){

	connection();
	$user = new Pincho();
	$user->register(array(
		'name' => $_POST['name'],
		'username' => $_POST['username'],
		'password' => $_POST['password'],
		'role' => (isset($_POST['type'])) ? 'establecimiento' : 'popular',
		'phone' => $_POST['phone']
	));
	closeConnection();
	closeServerSession();
	redirecionar('/');
}

index();