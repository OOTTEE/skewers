<?php
include_once('../lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Pincho.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');
include_once($GLOBALS['MODEL_PATH'].'Comentario.php');


/**
*	Author: Javier Lorenzo Martin
*	Controlador de gestion de pinchos. Se le permite el acceso a los usuarios establecimiento y popular
*/
function index(){
	if(isUserLoginWhithRole('establecimiento')){
		$GLOBALS['conf']=(new Configuracion())->get();
		//filtro por accion del usuario (parametro action recibido por GET o POST
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'registrarPincho' ){
			registrarPincho();
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'editarPincho' ){
			editarPincho();
		}
	}
	else if(isUserLoginWhithRole('popular')){
		$GLOBALS['conf']=(new Configuracion())->get();
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'comentarPincho' ){
			comentarPincho();		
		}
	}else{	
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'comentarPincho' ){
			addNotificacion('Tienes que estar logueado para comentar los pinchos','info');
			redirecionar($GLOBALS['INDEX']);		
		}else{
			redirecionar($GLOBALS['INDEX']);		
		}
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
	//Si los campos son valido se guarda el pincho
	if($valido){
		
		$pincho = new Pincho();
		$pincho->register(array( 'usuario_id' => $_SESSION['user']['usuario_id'],
								'ingredientes' => $_POST['ingredientes'],
								'nombre' => $_POST['nombrePincho'],
								'precio' => $_POST['precio'],
								'descripcion' => $_POST['descripcionPincho'])
		);
		//subida imaxe
		$img=UpImagen($pincho->usuario_id,'p');
		if(!$img){
				addNotificacion("No se pudo insertar la Imagen","Danger");
		}
		addNotificacion('Pincho enviado, pendiente de validacion', 'success');
		redirecionar($GLOBALS['INDEX']);
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
			
			$img=UpImagen($pincho->usuario_id,'p');
			if(!$img){
					addNotificacion("No se pudo insertar la Imagen","Danger");
			}
			redirecionar($GLOBALS['INDEX']);
		}else{
			addNotificacion('El pincho no fue editado', 'danger');
			redirecionar($GLOBALS['CONTROLLER_URL'].'establecimientoController.php?action=editarPincho');
		}
		
	}else{
		addNotificacion('El pincho ya fue validado y no puede ser editado', 'danger');
		redirecionar($GLOBALS['INDEX']);
	}
	closeServerSession();
}

//Con esta funcion accedemos a los datos de los pincho.

function consultarPincho(){
	
	$datosPincho = new Pincho();
	$datosPincho->pincho_id =$_REQUEST['pincho'];
	$pincho = $datosPincho->getPincho();
	if($pincho)
	{
		include_once($GLOBALS['LAYOUT_PATH'].'header.php');
		include_once($GLOBALS['LAYOUT_PATH'].'loginNavPopular.php');
		include_once($GLOBALS['TEMPLATES_PATH'].'popular/verConsulta.php'); 
		include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
	}
	else
	{
		addNotificacion('El pincho seleccionado no existe','danger');
		redirecionar($GLOBALS['INDEX']);
	}
}
// Registra comentario de un pincho 

function comentarPincho(){
	$pincho = new Pincho();
	$pincho->pincho_id =$_REQUEST['codigo_pincho'];
	if($pincho->getPincho()){
		$comentario = new Comentario();
		$comentario->crearComentario();
		addNotificacion('El pincho se ha comentado','success');
		redirecionar($GLOBALS['INDEX']);
	}
	else{
		addNotificacion('El pincho a comentar no existe','danger');
		redirecionar($GLOBALS['INDEX']);
	}
}

index();
