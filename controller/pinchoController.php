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

	$valido=true;
	if( !(isset($_POST['nombrePincho']) AND (strlen(str_replace(' ', '', $_POST['nombrePincho'])) > 4))){
		$valido=false;
		addNotificacion('El nombre del pincho deben tener como minimo 4 caracteres', 'danger');
	}
	if( !(isset($_POST['ingredientes']) AND strlen(str_replace(' ', '', $_POST['ingredientes'])) > 8 )){
		$valido=false;
		addNotificacion('Los ingredientes deben tener como minimo 8 caracteres', 'danger');
	}
	if( !(isset($_POST['precio']) AND floatval($_POST['precio']) > 0 )){
		$valido=false;
		addNotificacion('El precio del pincho debe ser mayor que 0', 'danger');
	}
	if( !(isset($_POST['imagen']) AND  $_POST['imagen'] != '') ){
		$valido=false;
		addNotificacion('Tiene que subir una imagen para el pincho', 'danger');
	}
	if($valido){
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
	}else{
		closeServerSession();
		redirecionar($GLOBALS['CONTROLLER_URL'].'establecimientoController.php?action=registrarPincho');
	}
}

//Aqui hacemos la funcion votar pincho
function votarPincho()
{
	//connection();
	echo "si"
	votar();
	
}

index();