<?php
include_once($GLOBALS['MODEL_PATH'].'Pincho.php');
class Establecimiento extends Model{

		public $usuario_id;
		public $imagen;
		public $horario;
		public $descripcion;
		public $web;
		public $direccion;

	/*
	*	Devuelve un objeto con todos los datos asociados a un establecimiento que se le pasa por parametros
	*/
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
	/*
	*	Devuelve un array con todos los datos de todos los establecimientos registrados en el sistema	
	*/
	public function getEstablecimientos(){
		$sentencia= $GLOBALS['DB']->prepare('SELECT * 
											FROM establecimientos  e , users u 
											WHERE e.usuario_id = u.usuario_id AND e.usuario_id In (SELECT usuario_id 
																									FROM pinchos 
																									WHERE validado=1)');
		$sentencia->execute();

		if($sentencia->rowCount() > 0){
			return $sentencia->fetchall();
		}
		
		return false;
	
	}
	/*
	*	Devuelve un array con los datos de un establecimiento indicado	
	*/
	public function getEstablecimientoByID($Id){
		$sentencia= $GLOBALS['DB']->prepare('SELECT *
											 FROM establecimientos  e , users u 
											 WHERE e.usuario_id = u.usuario_id AND e.usuario_id = ? ');
		$sentencia->execute(array($Id));
		$resul=$sentencia->fetchall()[0];
		
			return $resul;
	}

	/*
	*	metodo que recibe por parametro los datos del establecimiento a registrar en la base de datos
	*/
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
	/*
	*	almacena en la BD la imagen  de un establecimiento	
	*/
	public function setImagen($params){
			$sentencia = $GLOBALS['DB']->prepare("UPDATE establecimientos SET imagen=:imagen WHERE usuario_id=:usuario_id");

		$sentencia->execute(array(':usuario_id' => $params['usuario_id'],
					':imagen' =>$params['imagen']));

	}
	/*
	*	Devuelve los pinchos asociados a un establecimiento
	*/
	public function hasPincho(){
		$pincho = new Pincho();
		$pincho->usuario_id = $this->usuario_id;
		if($pincho->getPinchoByUsuarioId())
			return $pincho;
		else
			return false;

	}
}
