<?php
include_once(getcwd().'/../lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');
include_once($GLOBALS['MODEL_PATH'].'Pincho.php');
include_once($GLOBALS['MODEL_PATH'].'Voto.php');

function index(){
	if(isUserLoginWhithRole('popular')){
		$GLOBALS['conf'] = (new Configuracion())->get();
		//filtro por accion del usuario (parametro action recibido por GET o POST
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'votar' ){
			votar();
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'consultarVotaciones' ){
			consultarVotaciones();
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'realizarConsultaVotacion' ){
			realizarConsultaVotacion();
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
//consultar votaciones del miembro del jurado popular
function consultarVotaciones(){
	if($GLOBALS['conf']->votacionesPopulares == '0'){
		addNotificacion('Las votaciones estan desactivadas','info');
		redirecionar('/');
	}else{
		$voto = new Voto();
		$pinchosVotados = $voto->getPinchoVotadoByUser($_SESSION['user']['usuario_id']);
		$pinchosNoVotados = $voto->getPinchoNoVotadoByUser($_SESSION['user']['usuario_id']);	
		for($i = 0; $i < count($pinchosVotados); $i++){				
			$Pincho = new Pincho();				
			$Pincho->pincho_id=$pinchosVotados[$i][1];			
			$PinchosVotados[] = $Pincho->getPincho();
		}
		for($i = 0; $i < count($pinchosNoVotados); $i++){				
			$Pincho = new Pincho();				
			$Pincho->pincho_id=$pinchosNoVotados[$i][0];			
			$PinchosNoVotados[] = $Pincho->getPincho();
		}
		include_once($GLOBALS['LAYOUT_PATH'].'header.php');
		include_once($GLOBALS['LAYOUT_PATH'].'loginNavPopular.php');
		include_once($GLOBALS['TEMPLATES_PATH'].'popular/consultarVotaciones.php'); 
		include_once($GLOBALS['LAYOUT_PATH'].'footer.php');	
		
		
			
		
		
	}
}
//muestra la informacion del pincho votado
function realizarConsultaVotacion(){
	$Pi=new Pincho();
	$Pi->pincho_id=$_GET['idPincho'];
	$PiInfo=$Pi->getPincho();
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavPopular.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'popular/mostrarDatosPincho.php'); 
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
index();
