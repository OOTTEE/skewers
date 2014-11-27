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

function registrarPincho(){
	connection();
	$pincho = new Pincho();
	$pincho->register(array( 'usuario_id' => $_SESSION['user']['usuario_id'],
							'ingredientes' => $_POST['ingredientes'],
							'nombre' => $_POST['nombrePincho'],
							'precio' => $_POST['precio'],
							'imagen' => (isset($_POST['imagen'])) ?  '' : isset($_POST['imagen']),
							'descripcion' => $_POST['descripcionPincho'])
	);
	closeConnection();
	closeServerSession();
	redirecionar('/');
}

index();