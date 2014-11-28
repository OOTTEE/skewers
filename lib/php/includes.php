<?php
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	
	
	/**
	*	Esta funcion carga los componentes principales de la pagina y variables golbales.
	*/
	function loadComponentes(){
		$GLOBALS['TEMPLATES_PATH'] = $_SERVER['DOCUMENT_ROOT'].'/template/';
		$GLOBALS['LAYOUT_PATH'] = $_SERVER['DOCUMENT_ROOT'].'/template/layouts/';
		$GLOBALS['MODEL_PATH'] = $_SERVER['DOCUMENT_ROOT'].'/model/';
		$GLOBALS['LIB_PATH'] = $_SERVER['DOCUMENT_ROOT'].'/lib/';
		$GLOBALS['LIB_PHP_PATH'] = $_SERVER['DOCUMENT_ROOT'].'/lib/php/';
		$GLOBALS['IMAGES_PATH'] = $_SERVER['DOCUMENT_ROOT'].'/imagenes/';
		$GLOBALS['IMGESTABLECIMIENTOS_URL'] = '/imagenes/establecimiento/';
		
		
		$GLOBALS['IMGPINCHO_URL'] = '/imagenes/pincho/';
		$GLOBALS['CONTROLLER_URL'] = '/controller/';
		$GLOBALS['BOOTSTRAP_URL'] = '/lib/bootstrap/';
		$GLOBALS['CSS_URL'] = '/lib/css/';
		
		
		
		$GLOBALS['DB'] = null;
		include_once($GLOBALS['LIB_PHP_PATH'].'database.php');
		
		session_start();
		
		/**VARIABLES TEMPORALES A REEMPLAZAR POR CONTENIDO DE LA BD**/
		$_SESSION['conf']['nombre'] = "Concurso de pinchos de ourense";
	}
		
	/**
	*	Redirecciona ha una pagina 
	*		 $destino nueva direccion a la que redireccionamos
	*/
	function redirecionar($destino){
		header('Location: '.$destino);
	}
	
	/**
	*	Redirecciona ha una pagina con los parametros pasados por referencia
	*		$destino nueva direccion a la que redireccionamos
	*		$getParams Array de parametros asociados a la redireccion
	*/
	function redirecionarWithParams($destino, $getParams){
		$parametros='';
		foreach($getParams as $param){
			$parametros .= 	$param[0].'='.$param[1].'&';
		}
		header('Location: '.$destino.'?'.$parametros);
	}
	
	/*
	*	Verifica que un usuario esta logueado en el sistema
	*/
	function isUserLogin(){
		return (isset($_SESSION['login'] ) AND $_SESSION['login']==true);
	}
	
	/**
	*	Esta funcion verifica que un usaurio esta logeado en el sistema y si pertenece a un role determinado
	*		$role indica el role ha verificar (establecimiento, popular, profesional, administrador	
	*/
	function isUserLoginWhithRole($role){
		return (isset($_SESSION['login'] ) AND $_SESSION['login']==true AND $_SESSION['user']['role']==$role);
	}
	
	/**
	*	Esta funcion cierra la session del usuario en el servidor
	*/
	function closeServerSession(){
		session_write_close();
	}
	
	/**
	*	Esta funcion permite mostrar mensajes al usuario
	*		$level indica el tipo de notificacion (success, info, warning, danger)
	*		$message indica el contenido del mensaje a mostrar
	*/
	function addNotificacion($message, $level){
		if(!isset($_SESSION['notificaciones']))
			$_SESSION['notificaciones']=array();
		array_push($_SESSION['notificaciones'],array('level' => $level, 'message' => $message));	
	}
	
	loadComponentes();
	
	