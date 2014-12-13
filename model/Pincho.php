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
	/*
	*	Devuelve un objeto con todos los datos asociados a un pincho indicado
	*/
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
	/*
	*	Devuelve los pinchos finalistas que un jurado profesional todavia no ha votado
	*/
		public function getPinchoFinalistasLimitById($usuario_id){
		$sentencia= $GLOBALS['DB']->prepare('SELECT p.nombre , u.name , p.pincho_id
											FROM  pinchos p , users u
											WHERE u.usuario_id=p.usuario_id AND p.pincho_id NOT IN ( SELECT g.pincho_id 																				
																															FROM puntuacion_ganadores g 
																															WHERE g.usuario_id= ?)' );
		$sentencia->execute(array($usuario_id));
		
		if($sentencia->rowCount() > 0){
			return $sentencia->fetchall();
		}
		
		return false;
		
		
		}
	/*
	*		Devuelve los pinchos finalistas del concurso profesional
	*/
		public function getPinchoFinalistas(){
		$sentencia= $GLOBALS['DB']->prepare('SELECT p.nombre , u.name , p.pincho_id
				FROM pinchos p , users u
				WHERE  u.usuario_id=p.usuario_id AND p.finalista=1' );
		$sentencia->execute();
		
		if($sentencia->rowCount() > 0){
		return $sentencia->fetchall();
		}
		return false;
}	/*
	*	Devuelve un array conn los datos de los pinchos validados en el sistema
	*/
		public function getPinchosArray(){
		$sentencia= $GLOBALS['DB']->prepare('SELECT *
											 FROM pinchos
											 WHERE validado=1');
		$sentencia->execute();
		
		if($sentencia->rowCount() > 0){
			return $sentencia->fetchall();
		}
		
		return false;
	
	}
	/*
	*	Devuelve un objeto con todos los datos de un pincho asociado a un usuario
	*/
	
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
	/*
	*	Registra un pincho en la BD
	*/
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
									':imagen' => "",
									':descripcion' => $params['descripcion'],
									':validado' => false);
			$sentencia->execute($argumentos);
			if($sentencia->rowCount() == 1){
				$this->usuario_id=$params['usuario_id'];
				$this->getPinchoByUsuarioId();
				return $this;
			}else{
				return false;
			}
		}
		return false;
	}
	/*
	*	 Actualiza la informacion asociada a un pincho
	*/
	
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
	/*
	*	Almacena la imagen de un pincho
	*/
	public function setImagen($params){
			$sentencia = $GLOBALS['DB']->prepare("UPDATE pinchos SET imagen=:imagen WHERE usuario_id=:usuario_id");

		$sentencia->execute(array(':usuario_id' => $params['usuario_id'],
					':imagen' =>$params['imagen']));
	
	}

	/*
	*	Valida un pincho registrado en el sistema
	*/
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
	/*
	*	Devuelve un array con la informacion de los pinchos no validados
	*/
	public function getPinchos(){		
		$sentencia= $GLOBALS['DB']->prepare('SELECT * 
								FROM pinchos
								WHERE validado = 0 ');
		$sentencia->execute();
		$result=$sentencia->fetchall(); 
		return $result;
			
	}
	
	public function getPinchosByPopularUser($popular_id){
	
		$sentencia= $GLOBALS['DB']->prepare('select p.* ,
												(SELECT v.usuario_id FROM votos v WHERE v.pincho_id=p.pincho_id AND v.usuario_id = :popular_id ) as votado
											from pinchos p ' );
		$sentencia->execute(array('popular_id' => $popular_id));
		
		return $sentencia->fetchall();
	}
	


	
}
