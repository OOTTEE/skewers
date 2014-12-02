<?php
include_once($GLOBALS['MODEL_PATH'].'Pincho.php');
class Establecimiento extends Model{

		public $usuario_id;
		public $imagen;
		public $horario;
		public $descripcion;
		public $web;
		public $direccion;

	public function getEstablecimiento($id){
		$sentencia= $GLOBALS['DB']->prepare('SELECT usuario_id, imagen, horario, descripcion, web,direccion
								FROM establecimientos
								WHERE usuario_id = ?' );
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
	public function getEstablecimientos(){
		$sentencia= $GLOBALS['DB']->prepare('SELECT *
											 FROM establecimientos  e , users u 
											 WHERE e.usuario_id = u.usuario_id');
		$sentencia->execute();
		
		if($sentencia->rowCount() > 0){
			return $sentencia->fetchall();
		}
		
		return false;
	
	}
		public function getEstablecimientosByID($Id){
		$sentencia= $GLOBALS['DB']->prepare('SELECT *
											 FROM establecimientos  e , users u 
											 WHERE e.usuario_id = u.usuario_id=?');
		$sentencia->execute(array($Id));
		
		if($sentencia->rowCount() > 0){
			return $sentencia->fetchall();
		}
		
		return false;
	
	}


	public function register($params){

		/* Ejecuta una sentencia preparada pasando un array de valores */

		$sentencia = $GLOBALS['DB']->prepare("INSERT INTO establecimientos (usuario_id, imagen, horario, descripcion, web,direccion) VALUES (:usuario_id,:imagen , :horario, :descripcion, :web,:direccion)");

		$sentencia->execute(array(':usuario_id' =>$params['usuario_id'],
							':horario' =>$params['horario'],
							':descripcion' =>$params['descripcion'],
							':web' =>$params['web'],
							':imagen' =>"",
							':direccion' =>$params['direccion']));

		if($sentencia->rowCount() == 0){
				return false;
			}else{
				return true;
			}

	}
	public function setImagen($params){
			$sentencia = $GLOBALS['DB']->prepare("UPDATE establecimientos SET imagen=:imagen WHERE usuario_id=:usuario_id");

		$sentencia->execute(array(':usuario_id' => $params['usuario_id'],
					':imagen' =>$params['imagen']));

	}

	public function hasPincho(){
		$pincho = new Pincho();
		$pincho->usuario_id = $this->usuario_id;
		if($pincho->getPinchoByUsuarioId())
			return $pincho;
		else
			return false;

	}
}
