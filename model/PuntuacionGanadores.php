<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php');
class PuntuacionGanadores extends Model{

		public $usuario_id;
		public $pincho_id;
		public $nota;

	public function getNota($id){
		$sentencia= $GLOBALS['DB']->prepare('SELECT usuario_id, pincho_id, nota
								FROM puntuacion_ganadores
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
			$sentencia = $GLOBALS['DB']->prepare("INSERT INTO `puntuacion_ganadores`(`usuario_id`, `pincho_id`, `nota`) 
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
	public function getPremiados(){
		$sentencia=$GLOBALS['DB']->prepare('SELECT p.pincho_id,p.nombre,u.name ,(sum(nota)/count(nota))AS votos 
											FROM puntuacion_ganadores g, pinchos p , users u
											WHERE g.pincho_id=p.pincho_id And p.usuario_id=u.usuario_id
											GROUP BY g.pincho_id 
											ORDER BY votos 
											DESC');
		$sentencia->execute();
		return $sentencia->fetchall();
	
}



}