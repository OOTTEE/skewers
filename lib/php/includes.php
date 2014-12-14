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
		// URL_FOLDER => indica la carpeta en la que se encuentra el proyecto
		// si se encuentra en /var/www/pagina/  $URL_FOLDER = /pagina/
		$GLOBALS['URL_FOLDER'] = '/'; 
		
		$GLOBALS['FOLDER_PATH'] = $_SERVER['DOCUMENT_ROOT'].$GLOBALS['URL_FOLDER'];
		$GLOBALS['TEMPLATES_PATH'] = $GLOBALS['FOLDER_PATH'] .'template/';
		$GLOBALS['LAYOUT_PATH'] = $GLOBALS['FOLDER_PATH'] .'template/layouts/';
		$GLOBALS['MODEL_PATH'] = $GLOBALS['FOLDER_PATH'] .'model/';
		$GLOBALS['LIB_PATH'] = $GLOBALS['FOLDER_PATH'] .'lib/';
		$GLOBALS['LIB_PHP_PATH'] = $GLOBALS['FOLDER_PATH'] .'lib/php/';
		$GLOBALS['IMAGES_PATH'] = $GLOBALS['FOLDER_PATH'] .'imagenes/';
		
		/**
		*	Conjunto de variables globlales que definen las URL de los distintos componentes del sistema
		*/
		
		$GLOBALS['INDEX'] = $GLOBALS['URL_FOLDER'];
		$GLOBALS['IMGCONCURSO_URL'] = $GLOBALS['URL_FOLDER'].'imagenes/concurso/';
		$GLOBALS['IMGESTABLECIMIENTOS_URL'] = $GLOBALS['URL_FOLDER'].'imagenes/establecimiento/';
		$GLOBALS['IMGPINCHO_URL'] = $GLOBALS['URL_FOLDER'].'imagenes/pincho/';
		$GLOBALS['CONTROLLER_URL'] = $GLOBALS['URL_FOLDER'].'controller/';
		$GLOBALS['BOOTSTRAP_URL'] = $GLOBALS['URL_FOLDER'].'lib/bootstrap/';
		$GLOBALS['CSS_URL'] = $GLOBALS['URL_FOLDER'].'lib/css/';
		$GLOBALS['JS_URL'] = $GLOBALS['URL_FOLDER'].'lib/js/';
		
		
		
		$GLOBALS['DB'] = null;
		
		require_once($GLOBALS['LIB_PHP_PATH'].'functions.php');
		
		session_start();
		
	}
	
	loadConfiguracion();
	loadDatabaseConf();
	
	
