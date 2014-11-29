<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');


// CONTROLADOR DE ACCIONES 

function index(){
	if(isUserLoginWhithRole('administrador')){
		inicio();
	}else{	
		redirecionar('/');		
	}
	closeServerSession();
}

// FUNCIONES (CASOS DE USO); 

function inicio(){
	$conf = (new Configuracion())->get();
	
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavAdministrador.php');
	
	include_once($GLOBALS['TEMPLATES_PATH'].'index/index.php');
	echo '<h1>administrador</h1>';
	
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}


index();