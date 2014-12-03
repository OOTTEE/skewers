<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php');
include_once($GLOBALS['MODEL_PATH'].'Pincho.php');
	public $codigo_id;
	public $pincho_id;
	public $usuario_id;
	public $me_gusta;
	
	public function registrar(){
		$sentencia = $GLOBALS['DB']->prepare("INSERT INTO `votos`(`usuario_id`, `me_gusta`,`pincho_id`) 
												VALUES (:usuario_id,
														:me_gusta,
														:pincho_id)");

		$argumentos = array(':codigo_id' => $this->usuario_id,
								':me_gusta' => $this->me_gusta,
								':pincho_id' => $this->pincho_id);
		$sentencia->execute($argumentos);
		
		if($sentencia->rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}
	
	
}
	
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
