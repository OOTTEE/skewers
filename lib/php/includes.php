<?php
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	
	
	function loadDatabaseConf(){
		$GLOBALS['DB_CONF']['DSN'] = 'mysql:dbname=skewersDB;host=127.0.0.1';
		$GLOBALS['DB_CONF']['userDB'] = 'skewersUser';
		$GLOBALS['DB_CONF']['passDB'] = 'skewersPass'; 
	}
	
	/**
	*	Esta funcion carga los componentes principales de la pagina y variables golbales.
	*/
	function loadConfiguracion(){
		/**
		*	Conjunto de variables globlales que definen las rutas de los distintos componentes del sistema
		*/
		
		$GLOBALS['FOLDER_PATH'] = $_SERVER['DOCUMENT_ROOT'].'';
		$GLOBALS['TEMPLATES_PATH'] = $GLOBALS['FOLDER_PATH'] .'/template/';
		$GLOBALS['LAYOUT_PATH'] = $GLOBALS['FOLDER_PATH'] .'/template/layouts/';
		$GLOBALS['MODEL_PATH'] = $GLOBALS['FOLDER_PATH'] .'/model/';
		$GLOBALS['LIB_PATH'] = $GLOBALS['FOLDER_PATH'] .'/lib/';
		$GLOBALS['LIB_PHP_PATH'] = $GLOBALS['FOLDER_PATH'] .'/lib/php/';
		$GLOBALS['IMAGES_PATH'] = $GLOBALS['FOLDER_PATH'] .'/imagenes/';
		
		/**
		*	Conjunto de variables globlales que definen las URL de los distintos componentes del sistema
		*/
		$GLOBALS['IMGCONCURSO_URL'] = '/imagenes/concurso/';
		$GLOBALS['IMGESTABLECIMIENTOS_URL'] = '/imagenes/establecimiento/';
		$GLOBALS['IMGPINCHO_URL'] = '/imagenes/pincho/';
		$GLOBALS['CONTROLLER_URL'] = '/controller/';
		$GLOBALS['BOOTSTRAP_URL'] = '/lib/bootstrap/';
		$GLOBALS['CSS_URL'] = '/lib/css/';
		$GLOBALS['JS_URL'] = '/lib/js/';
		
		
		$GLOBALS['DB'] = null;
		
		require_once($GLOBALS['LIB_PHP_PATH'].'functions.php');
		
		session_start();
		
	}
	
	loadConfiguracion();
	loadDatabaseConf();
	
	
