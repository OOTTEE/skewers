<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Voto.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');


function index(){
	if(isUserLoginWhithRole('establecimiento')){
		$GLOBALS['conf'] = (new Configuracion())->get();
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'registrarVotoPopular' ){
			registrarVotoPopular();
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'generarCodigos' ){
			generarCodigos();
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

function generarCodigos(){
	//Validaciones pendientes
	$voto = new Voto();
	$voto->pincho_id = $_SESSION['user']['usuario_id'];
	$voto->generarVotos($_POST['numCodigos']);
	redirecionar('/');
	
}

index();