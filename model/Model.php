<?php

class Model{
	function __construct(){
		 try{
			if(!isset($GLOBALS['DB'])){
				Throw new Exception("<b>Error:</b> No se ha abierto la conexion a la base de datos para el User");
				die();
			}			
		 } catch(Exception $e){
			 echo "<b>line:</b> ".$e->getLine()." - ".$e->getMessage();
		}
	}

}