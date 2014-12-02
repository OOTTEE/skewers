<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php');
include_once($GLOBALS['LIB_PHP_PATH'].'database.php');
class Pincho extends Model{
	public $pincho_id;
	public $usuario_id;
	public $ingredientes;
	public $nombre;
	public $precio;
	public $finalista;
	private $imagen;
	private $descripcion;
	private $validado;

	public function countPinchos(){
		$sentencia= $GLOBALS['DB']->prepare('SELECT  COUNT(*) as Number FROM pinchos WHERE validado = 0 ');
		$sentencia->execute();
		$resul=$sentencia->fetchall()[0];
		
		
		
		return $resul;
	}
	public function getPinchos(){
		$sentencia1= $GLOBALS['DB']->prepare('SELECT  COUNT(*) as Number FROM pinchos WHERE validado = 0 ');
		$sentencia1->execute();
		$resul1=$sentencia1->fetchall()[0];
		$countUsers = $resul1;
		$sentencia2= $GLOBALS['DB']->prepare('SELECT nombre 
								FROM pinchos
								WHERE validado = 0 ');
		$sentencia2->execute();
		$resul2=$sentencia2->fetchall(); 
		return $resul2;
			
	}
	public function getPincho($nombrePincho){
		$sentencia2= $GLOBALS['DB']->prepare('SELECT pincho_id, usuario_id, ingredientes, nombre, precio, finalista, imagen, descripcion  
								FROM pinchos
								WHERE nombre = ? ');
		$sentencia2->execute(array($nombrePincho));
		$resul2=$sentencia2->fetchall(); 
		return $resul2;
	}
	public function validarPincho($idPincho){
		 GLOBAL $DB;	
		/* Ejecuta una sentencia preparada pasando un array de valores */
		
		$sentencia = $DB->prepare("UPDATE pinchos SET validado=1 WHERE pincho_id=?");
	
		try{		
			$sentencia->execute(array($idPincho));
			return "PINCHO VALIDADO";
		}
		catch(PDOException $e){
			return "PINCHO NO VALIDADO";
		}
	}

}
