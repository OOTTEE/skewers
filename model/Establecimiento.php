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