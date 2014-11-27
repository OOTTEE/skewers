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
		$sentencia=$GLOBALS['DB']->execute(array($id));
		$resul=$sentencia->fetchall()[0];
		$object= new Establecimiento();
		
		$object->usuario_id=$resul['usuario_id'];
		$object->imagen=$resul['imagen'];
		$object->horario=$resul['horario'];
		$object->descripcion=$resul['descripcion'];
		$object->web=$resul['web'];
		$object->direccion=$resul['direccion'];
		return $object;
			
	}
	
	public function registerEstablecimiento($params){
	
	
	
	}
	
	public function hasPincho(){
		$pincho = new Pincho();
		if($pincho->getPinchoByUsuarioId($_SESSION['user']['usuario_id']))
			return true;
		else
			return false;
			
	}
		
		
		


}