<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($MODEL_PATH.'User.php');

/**
*	Funcion principal del controlador users, esta funcion redirige a los metodos apropiados.
*/
function index(){
	if(isUserLogin()){
		inicio();
	}else{
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'register' ){
			register();
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'login' ){
			login();
		}else{		
			redirecionar('/');
		}
			
	}
}

/**
*	register() => registra un usuario en el sistema si la informacion es correcta
*					Al finalizar se redirecciona (POST->Redirect) a la pagina de inicio para que el usuario se pueda loguea
*/
function register(){
	connection();
	$user = new User();
	$user->register(array(
		'name' => $_POST['name'],
		'username' => $_POST['username'],
		'password' => $_POST['password'],
		'role' => (isset($_POST['type'])) ? 'establecimiento' : 'popular',
		'phone' => $_POST['phone']
	));
	closeConnection();
	redirecionar('/');
}

/**
*	login() => verifica que un usuario esta logueado en el sitema
*				Si el usuario esta logueado en el sistema almacena en variables de sesion la informacion de usuario
*				y una variable booleana login que indica si el usuario esta logueado.
*				cuando termina si todo es correcto redirecciona al usuario a la pagina de inicio (POST -> REDIRECT)
*				o de vuelta al inicio si es incorrecto
*/
function login(){
	GLOBAL $CONTROLLER_URL;
	
	connection();
	$user = new User();
	if($usuario = $user->isRegister(array('username' => $_POST['username'], 'password' => $_POST['password']))){
		$_SESSION['user'] = $usuario[0];
		$_SESSION['login'] = true;
		$url = $CONTROLLER_URL.'usersController.php';
	}else
		$url = '/';
	closeConnection();
	redirecionar('usersController.php');
}

/**
*	Aqui se muestra la pagina de inicio del usuario, 
*	dependiendo del tipo de usuario registrado en el sistema
*   se mostrará una vista o otra
*/
function inicio(){
	GLOBAL $CONTROLLER_URL;
	
	switch($_SESSION['user']['role']){
		case 'administrador':
			redirecionar($CONTROLLER_URL.'adminController.php');
			break;
		case 'popular':
			redirecionar($CONTROLLER_URL.'popularController.php');
			break;
		case 'profesional':
			redirecionar($CONTROLLER_URL.'profesionalController.php');
			break;
		case 'establecimiento':
			redirecionar($CONTROLLER_URL.'establecimientoController.php');
			break;
	}
}

index();