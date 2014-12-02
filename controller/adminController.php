<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');


// CONTROLADOR DE ACCIONES 

function index(){
	if(isUserLoginWhithRole('administrador')){
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'verConfiguracion' ){
			verConfiguracion();
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'gestionarUsuario' ){
			gestionarUsuario();
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'validarPinchoEstablecimiento' ){
			validarPinchoEstablecimiento();
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'VerAltaJuradoProfesional' ){
			verAltaJuradoProfesional();
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'VerModificarUsuario' ){
			verModificarUsuario();
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'VerEliminarUsuario' ){
			verEliminarUsuario();
		}
		else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'register' ){
			darAltaJuradoProfesional();			
		}
		else{
			inicio();
		}
	}else{	
		redirecionar('/');		
	}
	closeServerSession();
}

// FUNCIONES (CASOS DE USO); 

function inicio(){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	
	include_once($GLOBALS['TEMPLATES_PATH'].'index/index.php');
	echo '<h1>administrador</h1>';
	
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}

function verConfiguracion(){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	echo "<h1>Configuracion de la web</h1>";
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
function gestionarUsuario(){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/gestionUsuario.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');

}
function verAltaJuradoProfesional(){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/verAltaJuradoProfesional.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
function verModificarUsuario(){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/verModificarUsuario.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
function verEliminarUsuario(){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/verEliminarUsuario.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
function validarPinchoEstablecimiento(){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNav.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'admin/validarPinchoEstablecimiento.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
function darAltaJuradoProfesional(){
	connection();
	$user = new User();
	$user->register(array(
		'name' => $_POST['name'],
		'username' => $_POST['username'],
		'password' => $_POST['password'],
		'role' =>  'profesional',
		'phone' => $_POST['phone']
	));
	closeConnection();
	closeServerSession();
	redirecionar('/');
}


index();
