<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php');
class PuntuacionFinalista extends Model{

		public $usuario_id;
		public $pincho_id;
		public $nota;

	/*
	* Registra en la BD la nota de un pincho para el concurso profesional en la seleccion de finalistas	
	*/
	
	public function register($params){
		if(isset($params)){
			$sentencia = $GLOBALS['DB']->prepare("INSERT INTO `puntuacion_finalistas`(`usuario_id`, `pincho_id`, `nota`) 
													VALUES (:usuario_id,
															:pincho_id,
															:nota)");

			$argumentos = array(':usuario_id' => $params['usuario_id'],
									':pincho_id' => $params['pincho_id'],
									':nota' => $params['nota']);

			$sentencia->execute($argumentos);
			if($sentencia->rowCount() == 1){
				return true;
			}else{
				return false;
			}
		}
		return false;
	}
	/*
	*	Calcula los finalistas y actualiza la tabla pincho indicando cuales son los pinchos finalistas
	*/
	public function calcFinalistas(){
	
		$final=  $GLOBALS['DB']->prepare('SELECT pincho_id, (sum(nota)/count(nota)) AS valor
											From puntuacion_finalistas f
											WHERE 1
											GROUP BY pincho_id
									        ORDER BY valor DESC
											LIMIT 0,10');
											
		$final->execute();
		$finala=$final->fetchall();	
		foreach($finala as $row):
			$sentencia = $GLOBALS['DB']->prepare('UPDATE pinchos SET finalista=1 WHERE pincho_id=?');
			$sentencia->execute(array($row['pincho_id']));
			if($sentencia->rowCount() ==0){
				return false;
			}
		endforeach;
			return true;
		
	
	
	}

}