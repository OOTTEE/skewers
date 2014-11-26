<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');


// CONTROLADOR DE ACCIONES 

function index(){
	if(isUserLoginWhithRole('administrador')){
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'verConfiguracion' ){
			verConfiguracion();
		}else{
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
	
	echo '<h1>administrador</h1>';
	
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}

function verConfiguracion(){
	
}


index();