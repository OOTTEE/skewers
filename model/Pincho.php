<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php');
class Pincho extends Model{
	public $pincho_id;
	public $usuario_id;
	public $indredientes;
	public $nombre;
	public $precio;
	public $finalista;
	public $imagen;
	public $descripcion;
	public $validado;
	
	public function getPincho($id){
		$sentencia= $GLOBALS['DB']->prepare('SELECT pincho_id,usuario_id,ingredientes,nombre,precio,finalista,imagen,descripcion,validado
								FROM pinchos
								WHERE usuario_id = ?' );
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
	
	public function register(){
		$sentencia = $GLOBALS['DB']->prepare("INSERT INTO `pinchos`(`usuario_id`, `ingredientes`, `nombre`, `precio`, `finalista`, `imagen`, `descripcion`, `validado`) 
												VALUES (:usuario_id,
														:ingredientes,
														:nombre,
														:precio,
														:finalista,
														:imagen,
														:descripcion,
														:validado)");

		$sentencia->execute(array(':usuario_id' => $params['usuario_id'],
								':ingredientes' => $params['ingredientes'],
								':nombre' => $params['nombre'],
								':precio' => $params['precio'],
								':finalista' => $params['finalista'],
								':imagen' => $params['imagen'],
								':descripcion' => $params['descripcion'],
								':validado' => '0'));
	
	}
	
	public function votar(){
		$sentencia = $GLOBALS['DB']->prepare("INSERT INTO `votos`(`codigo_id`, `usuario_id`) 
									VALUES($_REQUEST['pincho'], $_SESSION['usuario_id'])");
		
		if($sentencia->execute()){ echo "votado"}
		else{
		echo "fallo en la votacion"}
	}
}