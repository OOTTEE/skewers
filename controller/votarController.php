<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');


function index(){
	if(isUserLoginWhithRole('popular')){
		$GLOBALS['conf'] = (new Configuracion())->get();
		//filtro por accion del usuario (parametro action recibido por GET o POST
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'registrarVotoPopular' ){
			registrarVotoPopular();
		}else{
			redirecionar('/');	
		}
	}else{	
		redirecionar('/');		
	}
	closeServerSession();
}


function registrarVotoPopular(){
	
}

index();