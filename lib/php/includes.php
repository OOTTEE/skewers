<?php
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	
	$GLOBALS['TEMPLATES_PATH'] = $_SERVER['DOCUMENT_ROOT'].'/template/';
	$GLOBALS['LAYOUT_PATH'] = $_SERVER['DOCUMENT_ROOT'].'/template/layouts/';
	$GLOBALS['MODEL_PATH'] = $_SERVER['DOCUMENT_ROOT'].'/model/';
	$GLOBALS['LIB_PATH'] = $_SERVER['DOCUMENT_ROOT'].'/lib/';
	$GLOBALS['LIB_PHP_PATH'] = $_SERVER['DOCUMENT_ROOT'].'/lib/php/';
	
	$GLOBALS['CONTROLLER_URL'] = '/controller/';
	$GLOBALS['BOOTSTRAP_URL'] = '/lib/bootstrap/';
	$GLOBALS['CSS_URL'] = '/lib/css/';
	
	$GLOBALS['DB'] = null;
	include_once($LIB_PHP_PATH.'database.php');
	
	function redirecionar($destino){
		header('Location: '.$destino);
	}
	function redirecionarWithParams($destino, $getParams){
		$parametros='';
		foreach($getParams as $param){
			$parametros .= 	$param[0].'='.$param[1].'&';
		}
		header('Location: '.$destino.'?'.$parametros);
	}
	
	function isUserLogin(){
		return (isset($_SESSION['login'] ) AND $_SESSION['login']==true);
	}
	
	session_start();