<?php
include_once($GLOBALS['MODEL_PATH'].'Pincho.php');
class Voto extends Model{

	public $codigo_id;
	public $pincho_id;
	public $usuario_id;
	public $me_gusta;
	
	
	public function generarVotos($numVotos){
	
		$sentencia = $GLOBALS['DB']->prepare("INSERT INTO votos (usuario_id,  pincho_id ) VALUES (NULL, ? )");
		
		for( $x=0; $x<$numVotos; $x++){
			$sentencia->execute(array($this->pincho_id));
		}
		
		if($sentencia->rowCount() == 0){
			return false;
		}else{
			return $GLOBALS['DB']->lastInsertId();
		}	
	
	
	}


}