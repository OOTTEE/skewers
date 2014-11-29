<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Establecimiento.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');


function index(){
	if(isUserLoginWhithRole('establecimiento')){
		$GLOBALS['conf']=(new Configuracion())->get();
		//filtro por accion del usuario (parametro action recibido por GET o POST
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'registrarPincho'  ){
			registrarPincho();
		}else {
			inicio();
		}		
	}else{	
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'registerEstablecimiento' ){
			register();
		}
				
	}
	closeServerSession();
}
function UpImagen($Id,$establecimiento){
	//Almacenamento imaxe establecemento
	
	$Image_Path = $GLOBALS['IMGESTABLECIMIENTOS_URL'] . $Id . basename($_FILES['imagen']['name']);
	if(($_FILES['imagen']['type'] == 'image/jpeg') || ($_FILES['imagen']['type'] == 'image/png') || ($_FILES['imagen']['type'] == 'image/jpg')){
		
		if($_FILES['imagen']['size'] < 200000){
			move_uploaded_file($_FILES["imagen"]["tmp_name"],'/var/www/html/skewers'.$Image_Path);
			$establecimiento->regImagen(array(
						'imagen' => $Image_Path,
						'usuario_id' => $Id));
			return true;
		}
		else{
		addNotificacion("No se pudo insertar la imagen,Tamaño demasiado grande","Danger");
		return false;
		}
	}else{
		addNotificacion("No se pudo insertar la imagen,Formato no soportado","Danger");
			return false;
		}	
}

function register(){
	//PENDIENTE EL GUARDADO DE LAS IMAGENES
	
	
	
	$user = new User();
	$User_Id=$user->register(array(
		'name' => $_POST['name'],
		'username' => $_POST['username'],
		'password' => $_POST['password'],
		'role' =>  'establecimiento',
		'phone' => $_POST['phone'],
		'email' => $_POST['email'],));
	if(!$User_Id){
			addNotificacion("No se pudo crear el usuario","Danger");
			return false;
	}
	$establecimiento = new Establecimiento();
	$est=$establecimiento->register(array(
		'usuario_id'=>$User_Id,
		'web' => $_POST['web'],
		'direccion'=> $_POST['direccion'],
		'horario'=> $_POST['horario'],
		'descripcion'=> $_POST['descripcion']));
	if(!$est){
			addNotificacion("No se pudo crear el establecimiento","Danger");
			return false;
	}
	$img=UpImagen($User_Id,$establecimiento);
	if(!$est){
			addNotificacion("No se pudo insertar la Imagen","Danger");
			return false;
	}

	redirecionar('/');
}


function inicio(){
	
	$establecimiento = new Establecimiento();
	$hasPincho = $establecimiento->hasPincho();
	
	
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavEstablecimiento.php');
	echo "<h1>Establecimiento <small>index</small></h1>";
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}

function registrarPincho(){
	
	$establecimiento = new Establecimiento();
	$hasPincho = $establecimiento->hasPincho();
	
	
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavEstablecimiento.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'establecimiento/registrarPincho.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
	
}
index();