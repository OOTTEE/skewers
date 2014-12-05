<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php');
class PuntuacionFinalista extends Model{

		public $usuario_id;
		public $pincho_id;
		public $nota;

	public function getNota($id){
		$sentencia= $GLOBALS['DB']->prepare('SELECT usuario_id, pincho_id, nota
								FROM puntuacion_finalistas
								WHERE pincho_id = ?' );
		$sentencia->execute(array($id));
		$resul=$sentencia->fetchall()[0];

		$this->usuario_id=$resul['usuario_id'];
		$this->imagen=$resul['imagen'];
		$this->horario=$resul['horario'];
		$this->descripcion=$resul['descripcion'];
		$this->web=$resul['web'];
		$this->direccion=$resul['direccion'];
		return $this;

	}
	
	
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