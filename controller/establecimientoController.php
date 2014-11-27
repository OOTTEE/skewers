<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');
include_once($GLOBALS['MODEL_PATH'].'Establecimiento.php');


function index(){
	if(isUserLoginWhithRole('establecimiento')){
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
function register(){
	connection();
	//Almacenamento imaxe establecemento
	if ((($_FILES['imgfile']['type'] == 'image/jpeg') || ($_FILES['imgfile']['type'] == 'image/png')  || ($_FILES['imgfile']['type'] == 'image/pjpeg')) && ($_FILES['imgfile']['size'] < 200000))
  { 
	if(file_exists($_FILES['imgfile']['name']))
    {
      echo 'File name exists.';
    }
    else
    {
      move_uploaded_file($_FILES["imgfile"]["tmp_name"],$GLOBALS['IMGESTABLECIMIENTOS_PATH'].$_FILES['imgfile']['name']);
      
    }
  }
  else
  {
    echo "invalid file.";
  }
	
	
	
	$establecimiento = new Establecimiento();
	$establecimiento->register(array(
		'name' => $_POST['name'],
		'username' => $_POST['username'],
		'password' => $_POST['password'],
		'role' =>  'popular',
		'phone' => $_POST['phone'],
		'email' => $_POST['email'],
		'web' => $_POST['web'],
		'direccion'=> $_POST['direccion'],
		'horario'=> $_POST['horario'],
		'descripcion'=> $_POST['descripcion'],
		'imagen'=> ''
	));
	
	closeConnection();
	closeServerSession();
	redirecionar('/');
}


function inicio(){
	connection();
	$establecimiento = new Establecimiento();
	$hasPincho = $establecimiento->hasPincho();
	
	closeConnection();
	
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavEstablecimiento.php');
	echo "<h1>Establecimiento <small>index</small></h1>";
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}

function registrarPincho(){
	connection();
	$establecimiento = new Establecimiento();
	$hasPincho = $establecimiento->hasPincho();
	closeConnection();
	
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavEstablecimiento.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'establecimiento/registrarPincho.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
	
}
index();