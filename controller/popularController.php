<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');


function index(){
	if(isUserLoginWhithRole('popular')){
		$GLOBALS['conf'] = (new Configuracion())->get();
		//filtro por accion del usuario (parametro action recibido por GET o POST
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'votar' ){
			votar();
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'consultar' ){
			consultar();
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'comentar' ){
			comentar();
		}else{
			inicio();
		}
	}else{	
		redirecionar('/');		
	}
	closeServerSession();
}

function inicio(){

	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavPopular.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'popular/index.php'); 
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}

function votar(){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavPopular.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'popular/votar.php'); 
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}

function consultar(){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavPopular.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'popular/consultar.php'); 
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
function comentar(){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavPopular.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'popular/comentar.php'); 
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
	
}
	


index();