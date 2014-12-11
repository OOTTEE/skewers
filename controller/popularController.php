<?php
include_once(getcwd().'/../lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');


function index(){
	if(isUserLoginWhithRole('popular')){
		$GLOBALS['conf'] = (new Configuracion())->get();
		//filtro por accion del usuario (parametro action recibido por GET o POST
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'votar' ){
			votar();
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
//voto concurso popular
function votar(){
	if($GLOBALS['conf']->votacionesPopulares == '0'){
		addNotificacion('Las votaciones estan desactivadas','info');
		redirecionar('/');
	}else{
		include_once($GLOBALS['LAYOUT_PATH'].'header.php');
		include_once($GLOBALS['LAYOUT_PATH'].'loginNavPopular.php');
		include_once($GLOBALS['TEMPLATES_PATH'].'popular/votar.php'); 
		include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
	}
}

	


index();