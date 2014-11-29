<?php

class Model{
	function __construct(){
		 try{
			if(!isset($GLOBALS['DB'])){				
				try {
					$GLOBALS['DB'] = new PDO($GLOBALS['DB_CONF']['DSN'], $GLOBALS['DB_CONF']['userDB'], $GLOBALS['DB_CONF']['passDB']);
					return true;
				} catch (PDOException $e) {
					echo 'Falló la conexión: ' . $e->getMessage();
					return false;
				}
			}			
		 } catch(Exception $e){
			 echo "<b>line:</b> ".$e->getLine()." - ".$e->getMessage();
		}
	}
	
	function __destruct (){
		 try{
			if(!isset($GLOBALS['DB'])){
				unset($GLOBALS['DB']);
			}			
		 } catch(Exception $e){
			 echo "<b>line:</b> ".$e->getLine()." - ".$e->getMessage();
		}
		
	}

}