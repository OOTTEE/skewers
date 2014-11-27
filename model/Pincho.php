<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php';

class Pincho extends Model{
		
		public $usuario_id;
		public $pincho_id;	
		public $ingredientes;
		public $nombre;
		public $precio;
		public $finalista;
		public $imagen;
		public $descripcion;
		public $validado
		
		
		
public function getPincho($id){
		$sentencia= $GLOBALS['DB']->prepare(SELECT pincho_id,usuario_id,ingredientes,nombre,precio,finalista,imagen,descripcion,validado
								FROM pinchos
								WHERE usuario_id = ? );
		$sentencia=$GLOBALS['DB']->execute(array($id));
		$resul=$sentencia->fetchall()[0];
		$object= new Pincho();
		
		$object->usuario_id=$resul['usuario_id'];
		$object->imagen=$resul['imagen'];
		$object->pincho_id=$resul['pincho_id'];
		$object->descripcion=$resul['descripcion'];
		$object->ingredientes=$resul['ingredientes'];
		$object->nombre=$resul['nombre'];
		$object->precio=$resul['precio'];
		$object->finalista=$resul['finalista'];
		$object->validado=$resul['validado'];
		return $object;

}
public function registrarPincho(){


}


}