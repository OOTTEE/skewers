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
								WHERE pincho_id = ?' );
		$sentencia->execute(array($id));
		$resul=$sentencia->fetchall();
		
		if(count($resul) == 0){
			return false;
		}
		
		$resul = $resul[0];
	
		$this->usuario_id=$resul['usuario_id'];
		$this->imagen=$resul['imagen'];
		$this->pincho_id=$resul['pincho_id'];
		$this->descripcion=$resul['descripcion'];
		$this->ingredientes=$resul['ingredientes'];
		$this->nombre=$resul['nombre'];
		$this->precio=$resul['precio'];
		$this->finalista=$resul['finalista'];
		$this->validado=$resul['validado'];
		return $this;
	}
	
	public function getPinchoByUsuarioId($id){
		$sentencia = $GLOBALS['DB']->prepare('SELECT pincho_id,usuario_id,ingredientes,nombre,precio,finalista,imagen,descripcion,validado
								FROM pinchos
								WHERE usuario_id = ?' );
		$sentencia->execute(array($id));
		$resul=$sentencia->fetchall();
		
		if(count($resul) == 0){
			return false;
		}
		
		$resul = $resul[0];
	
		
		$this->usuario_id=$resul['usuario_id'];
		$this->imagen=$resul['imagen'];
		$this->pincho_id=$resul['pincho_id'];
		$this->descripcion=$resul['descripcion'];
		$this->ingredientes=$resul['ingredientes'];
		$this->nombre=$resul['nombre'];
		$this->precio=$resul['precio'];
		$this->finalista=$resul['finalista'];
		$this->validado=$resul['validado'];
		return $this;
	}
	
	public function register($params){
		$sentencia = $GLOBALS['DB']->prepare("INSERT INTO `pinchos`(`usuario_id`, `ingredientes`, `nombre`, `precio`, `finalista`, `imagen`, `descripcion`, `validado`) 
												VALUES (:usuario_id,
														:ingredientes,
														:nombre,
														:precio,
														:finalista,
														:imagen,
														:descripcion,
														:validado)");

		$argumentos = array(':usuario_id' => $params['usuario_id'],
								':ingredientes' => $params['ingredientes'],
								':nombre' => $params['nombre'],
								':precio' => $params['precio'],
								':finalista' => false,
								':imagen' => $params['imagen'],
								':descripcion' => $params['descripcion'],
								':validado' => false);
		$sentencia->execute($argumentos);
		
	}
	
	public function votar(){
		//Este codigo produce error, 
		//Por otra parate no puedes usar en los modelo variables $REQUEST $_GET $_POST o $_SESSION
		//Aqui variables pasadas o contenidas en el propio modelo.
		/*$sentencia = $GLOBALS['DB']->prepare("INSERT INTO `votos`(`codigo_id`, `usuario_id`) 
									VALUES($_REQUEST['pincho'], $_SESSION['usuario_id'])");
		
		if($sentencia->execute()){ echo "votado"}
		else{
		echo "fallo en la votacion"}*/
		
		//Cuando termines devuelve un true o un false
	}
}