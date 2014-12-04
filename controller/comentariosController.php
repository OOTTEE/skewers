<?php
	include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
	include_once($GLOBALS['MODEL_PATH'].'Pincho.php');
	include_once($GLOBALS['MODEL_PATH'].'Comentario.php');
	
	function index(){
	if(isUserLoginWhithRole('popular')){
		$GLOBALS['conf']=(new Configuracion())->get();
		//filtro por accion del usuario (parametro action recibido por GET o POST
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'registrarPincho' ){
			echo 'registrar';
			registrarPincho();
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'editarPincho' ){
			echo 'editar';
			editarPincho();
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'consultarPincho' ){
			echo 'consultarPincho';
			consultarPincho();
		}else{
			redirecionar('/');		
		}
	}else{	
		redirecionar('/');		
	}
	
}