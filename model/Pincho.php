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
	
	public function getPincho(){
		$sentencia= $GLOBALS['DB']->prepare('SELECT pincho_id,usuario_id,ingredientes,nombre,precio,finalista,imagen,descripcion,validado
								FROM pinchos
								WHERE pincho_id = ?' );
		$sentencia->execute(array($this->pincho_id));
		$result=$sentencia->fetchall(PDO::FETCH_CLASS, "Pincho");
		
		
		if($sentencia->rowCount() == 1){
			$result = $result[0];
			$this->usuario_id=$result->usuario_id;
			$this->imagen=$result->imagen;
			$this->pincho_id=$result->pincho_id;
			$this->descripcion=$result->descripcion;
			$this->ingredientes=$result->ingredientes;
			$this->nombre=$result->nombre;
			$this->precio=$result->precio;
			$this->finalista=$result->finalista;
			$this->validado=$result->validado;
			return $this;
		}else{
			return false;
		}		
	}
	
	public function getPinchoByUsuarioId(){
		$sentencia = $GLOBALS['DB']->prepare('SELECT pincho_id,usuario_id,ingredientes,nombre,precio,finalista,imagen,descripcion,validado
								FROM pinchos
								WHERE usuario_id = ?' );
		$sentencia->execute(array($this->usuario_id));
		$result=$sentencia->fetchall(PDO::FETCH_CLASS, "Pincho");
		
		if($sentencia->rowCount() == 1){
			$result = $result[0];
			$this->usuario_id=$result->usuario_id;
			$this->imagen=$result->imagen;
			$this->pincho_id=$result->pincho_id;
			$this->descripcion=$result->descripcion;
			$this->ingredientes=$result->ingredientes;
			$this->nombre=$result->nombre;
			$this->precio=$result->precio;
			$this->finalista=$result->finalista;
			$this->validado=$result->validado;
			return $this;
		}else{
			return false;
		}		
	}
	
	public function register($params){
		if(isset($params)){
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
			if($sentencia->rowCount() == 1){
				return true;
			}else{
				return false;
			}
		}
		return false;
	}
	
	
	public function edit($params){
		if(isset($this->usuario_id)){
			$sentencia = $GLOBALS['DB']->prepare("UPDATE `pinchos` SET
												`ingredientes` = :ingredientes,
												`nombre` = :nombre ,
												`precio` = :precio ,".
												((isset($params['imagen']))? '`imagen` = :imagen ,' : '').
												"`descripcion` = :descripcion
												WHERE `usuario_id` = :usuario_id");

			$argumentos = array(':ingredientes' => $params['ingredientes'],
									':nombre' => $params['nombre'],
									':precio' => $params['precio'],
									':descripcion' => $params['descripcion'],
									':usuario_id' => $this->usuario_id);
			if(isset($params['imagen'])){
				$argumentos[':imagen'] = $params['imagen'];
			}
			$sentencia->execute($argumentos);
						
			if($sentencia->rowCount() == 1){
				return true;
			}else{
				return false;
			}
		}
		return false;
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

	//FUNCIONES PINCHO
	public function validarPincho($idPincho){
		 GLOBAL $DB;	
		/* Ejecuta una sentencia preparada pasando un array de valores */
		
		$sentencia = $DB->prepare("UPDATE pinchos SET validado=1 WHERE pincho_id=?");		
		$sentencia->execute(array($idPincho));
		if($sentencia->rowCount() > 0) 
			return true;
		else 
			return false;
	}
	
	public function getPinchos(){		
		$sentencia2= $GLOBALS['DB']->prepare('SELECT * 
								FROM pinchos
								WHERE validado = 0 ');
		$sentencia2->execute();
		$resul2=$sentencia2->fetchall(); 
		return $resul2;
			
	}
	public function countPinchos(){
		$sentencia= $GLOBALS['DB']->prepare('SELECT  COUNT(*) as Number FROM pinchos WHERE validado = 0 ');
		$sentencia->execute();
		$resul=$sentencia->fetchall()[0];
		
		
		
		return $resul;
	}

	// FIN
}
