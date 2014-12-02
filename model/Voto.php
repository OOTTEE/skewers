<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php');
class Voto extends Model{
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
