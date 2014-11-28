<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php');
class Asignacion extends Model{
	$pincho_id;
	$usuario_id;
		
	public function getListAllAsignaciones($usuario_id){
		$sentencia= $GLOBALS['DB']->prepare("SELECT u.usuario_id, u.name AS nombreUsuario, u.username, p.pincho_id, p.nombre AS nombrePincho, p.pincho_id
											FROM users u
											LEFT JOIN asignaciones a ON u.usuario_id = a.usuario_id
											LEFT JOIN pinchos p ON a.pincho_id = p.pincho_id
											WHERE u.role = 'profesional'");
		$sentencia=$GLOBALS['DB']->execute(array($usuario_id));
		
		if($sentencia->rowCount() > 0){
			return sentencia->fetchall();
		}
		
		return false;
		
	}
	
	public function getListAsignaciones($usuario_id){
		$sentencia= $GLOBALS['DB']->prepare('SELECT usuario_id, pincho_id
											 FROM asignaciones
											 WHERE usuario_id = ? ');
		$sentencia=$GLOBALS['DB']->execute(array($usuario_id));
		
		if($sentencia->rowCount() > 0){
			return sentencia->fetchall();
		}
		
		return false;
	}
	
	public function get($usuario_id, $pincho_id){
		$sentencia= $GLOBALS['DB']->prepare('SELECT usuario_id, pincho_id
											 FROM asignaciones
											 WHERE usuario_id = ? AND pincho_id = ? ');
		$sentencia=$GLOBALS['DB']->execute(array($usuario_id, $pincho_id));
		
		if($sentencia->rowCount() == 1){
			$resul=$sentencia->fetchall()[0];
			$this->pincho_id=$resul['pincho_id'];
			$this->usuario_id=$resul['usuario_id'];			
			return $this;
		}
		return false;
	}
	
	public function create($pincho_id, $usuario_id){
		
		$sentencia = $GLOBALS['DB']->prepare("INSERT INTO asignaciones (usuario_id, pincho_id) 
											VALUES (:usuario_id, :pincho_id) ");

		$sentencia->execute(array(':usuario_id' =>$usuario_id,
							':pincho_id' =>$pincho_id));
		
		if($sentencia->rowCount() == 0){
			return false
		}else{
			return true;
		}	
	}
	
	public function delete($pincho_id, $usuario_id){
		
		$sentencia = $GLOBALS['DB']->prepare("DELETE FROM asignaciones 
											  WHERE usuario_id = ? AND pincho_id = ? ");
											  
		$sentencia = $GLOBALS['DB']->execute(array($usuario_id, $pincho_id));
		
		if($sentencia->rowCount() == 0){
			return false
		}else{
			return true;
		}	
	}

}