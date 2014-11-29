<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Pincho.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');


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
	//PENDIENTE EL GUARDADO DE LAS IMAGENES

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
		
		$pincho = new Pincho();
		$pincho->register(array( 'usuario_id' => $_SESSION['user']['usuario_id'],
								'ingredientes' => $_POST['ingredientes'],
								'nombre' => $_POST['nombrePincho'],
								'precio' => $_POST['precio'],
								'imagen' => (isset($_POST['imagen'])) ?  '' : isset($_POST['imagen']),
								'descripcion' => $_POST['descripcionPincho'])
		);
		
		addNotificacion('Pincho enviado, pendiente de validacion', 'success');
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
	//aqui tienes que recolectar la informacion necesaria,
	//Como el id del pincho que te llegara a traves de un formulario
	//el id del usuario que lo tienes disponible en $_SESSION['user']['usuario_id']
	//y validar la informacion.
	//tendras que hacer alago asi :
	/*
	*	$pincho = new Pincho();
	*	$pincho->getPincho($id_del_pincho)->votar($id_del_usuario_que_vota);
	*/
	//
	//echo "si"
	//votar();
	
}

index();