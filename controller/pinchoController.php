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
	$user->register(array( 'usuario_id' => $_POST['usuario_id'],
							'ingredientes' => $_POST['ingredientes'],
							'nombre' => $_POST['nombre'],
							'precio' => $_POST['precio'],
							'finalista' => $_POST['finalista'],
							'imagen' => $_POST['imagen'],
							'descripcion' => $_POST['descripcion'],
							'validado' => 0)
	));
	closeConnection();
	closeServerSession();
	redirecionar('/');
}

index();