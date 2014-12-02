<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Pincho.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');


/**
*	Author: Javier Lorenzo Martin
*	Controlador de gestion de pinchos.
*/
function index(){
	if(isUserLoginWhithRole('establecimiento')){
		$GLOBALS['conf']=(new Configuracion())->get();
		//filtro por accion del usuario (parametro action recibido por GET o POST
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'registrarPincho' ){
			echo 'registrar';
			registrarPincho();
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'editarPincho' ){
			echo 'editar';
			editarPincho();
		}else{
			redirecionar('/');		
		}
	}else{	
		redirecionar('/');		
	}
	
}

/**
*	Author: Javier Lorenzo Martin
*	Este caso, implementa el registro de pinchos por parte del establecimiento.
*	No devuelve nada, al terminar muestra un mensaje de Error o Confirmación y redirecciona.
*/

function registrarPincho(){
	//PENDIENTE EL GUARDADO DE LAS IMAGENES
	//Validacion de campos
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
	//Si los campos son valido se guarda el pincho
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
		redirecionar('/');
	}else{
		addNotificacion('<strong>Error: </strong>El pincho no puedo ser enviado.', 'danger');
		redirecionar($GLOBALS['CONTROLLER_URL'].'establecimientoController.php?action=registrarPincho');
	}
	closeServerSession();
}

/**
*	Author: Javier Lorenzo Martin
*	Este caso, implementa la edicion de pinchos por parte del establecimiento, si y solo si este pincho
*	aun no ha sido validado.
*	No devuelve nada, al terminar muestra un mensaje de Error o Confirmación y redirecciona.
*/
function editarPincho(){
	//PENDIENTE EL GUARDADO DE LAS IMAGENES
	//Recuperamos el pincho del establecimiento en cuestion
	$pincho = new Pincho();
	$pincho->usuario_id = $_SESSION['user']['usuario_id'];
	$pincho->getPinchoByUsuarioId();
	//comprobamos que el campo aun no esté el validado
	if(!$pincho->validado){
		//Comprobacion de campos validos
		$valido=true;
		if( !(isset($_POST['nombrePincho']) AND (strlen(str_replace(' ', '', $_POST['nombrePincho'])) > 4))){
			$valido=false;
			addNotificacion('El nombre del pincho deben tener como minimo 4 caracteres', 'warning');
		}
		if( !(isset($_POST['ingredientes']) AND strlen(str_replace(' ', '', $_POST['ingredientes'])) > 8 )){
			$valido=false;
			addNotificacion('Los ingredientes deben tener como minimo 8 caracteres', 'warning');
		}
		if( !(isset($_POST['precio']) AND floatval($_POST['precio']) > 0 )){
			$valido=false;
			addNotificacion('El precio del pincho debe ser mayor que 0', 'warning');
		}
		//Si los campos son validos se editan
		if($valido){
			$pincho->edit(array('ingredientes' => $_POST['ingredientes'],
								'nombre' => $_POST['nombrePincho'],
								'precio' => $_POST['precio'],
								'imagen' => (isset($_POST['imagen'])) ? $_POST['imagen'] : NULL,
								'descripcion' => $_POST['descripcionPincho'])
			);
			addNotificacion('El pincho fue editado, pendiente de validacion', 'success');
			redirecionar('/');
		}else{
			addNotificacion('El pincho no fue editado', 'danger');
			redirecionar($GLOBALS['CONTROLLER_URL'].'establecimientoController.php?action=editarPincho');
		}
	}else{
		addNotificacion('El pincho ya fue validado y no puede ser editado', 'danger');
		redirecionar('/');
	}
	closeServerSession();
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