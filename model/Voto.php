<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php');
include_once($GLOBALS['MODEL_PATH'].'Pincho.php');

class Voto extends Model{
	public $codigo_id;
	public $pincho_id;
	public $usuario_id;
	public $me_gusta;
	
	/*
	* registra una votacion del concurso popular	
	*/
	
	public function registrarVotacion(){
		$sentencia = $GLOBALS['DB']->prepare("UPDATE `votos` SET `usuario_id`= :usuario_id,
																 `me_gusta`= :me_gusta 
															WHERE `codigo_id` = :codigo_id");

		$argumentos = array(':usuario_id' => $this->usuario_id,
							':codigo_id' => $this->codigo_id,
								':me_gusta' => $this->me_gusta);
								
		$sentencia->execute($argumentos);
		
		if($sentencia->rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}
	/*
	* Funcion que genera los codigos asociados 	a un pincho
	*/
	
	public function generarVotos($numVotos){
	
		$sentencia = $GLOBALS['DB']->prepare("INSERT INTO votos (usuario_id,  pincho_id ) VALUES (NULL, ? )");
		
		for( $x=0; $x<$numVotos; $x++){
			$sentencia->execute(array($this->pincho_id));
		}
		if($sentencia->rowCount() == 0){
			return false;
		}else{
			return true;
		}	
	
	
	}
	/*
	*	Comprueba que un voto estea disponible
	*/
	public function isAvailable(){
		$sentencia= $GLOBALS['DB']->prepare('SELECT usuario_id, pincho_id, me_gusta, codigo_id
								FROM votos
								WHERE codigo_id = ? AND pincho_id = ? AND usuario_id IS NULL' );
		$sentencia->execute(array($this->codigo_id, $this->pincho_id));
		$result=$sentencia->fetchall();
		
		
		if($sentencia->rowCount() == 1){
			$result = $result[0];
			$this->codigo_id=$result['codigo_id'];
			$this->usuario_id=$result['usuario_id'];
			$this->me_gusta=$result['me_gusta'];
			$this->pincho_id=$result['pincho_id'];
			return $this;
		}else{
			return false;
		}	
	}

	
	public function getUltimosVotos($num){
		$sentencia= $GLOBALS['DB']->prepare("SELECT v . * , p.nombre
											FROM votos v, pinchos p
											WHERE v.pincho_id = :pincho_id
											AND p.usuario_id = v.pincho_id
											ORDER BY v.codigo_id DESC 
											LIMIT 0 , $num");
		$sentencia->execute(array( ':pincho_id' => $this->pincho_id ));
		$result=$sentencia->fetchall();
	
		if($sentencia->rowCount() > 0){
			return $result;
		}else{
			return false;
		}	
	}
	public function getResulVotos(){
		$sentencia=$GLOBALS['DB']->prepare('SELECT v.pincho_id,p.nombre,u.name, sum(me_gusta)AS votos 
											FROM votos v ,pinchos p, users u
											WHERE v.pincho_id=p.usuario_id And p.usuario_id=u.usuario_id
											GROUP BY p.pincho_id 
											ORDER BY votos 
											DESC');
		$sentencia->execute();
		return $sentencia->fetchall();
	
	}

}
