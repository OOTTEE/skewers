<?php

/**
*	Clase principal de los modelos, para cada modelo se comprueba que la conexion a la base de datos
*	este creada, de lo contrario se crea.
*	tambien se destrulle la conexion al terminar la ejecucion del modelo.
*/

class Model{
	
	function __construct(){
		if(!isset($GLOBALS['DB'])){				
			try {
				$GLOBALS['DB'] = new PDO($GLOBALS['DB_CONF']['DSN'], $GLOBALS['DB_CONF']['userDB'], $GLOBALS['DB_CONF']['passDB']);
			} catch (PDOException $e) {
				echo 'Falló la conexión: ' . $e->getMessage();
			}
		}			
	}
	
	function __destruct (){
		if(!isset($GLOBALS['DB'])){
			unset($GLOBALS['DB']);
		}
		
	}

}