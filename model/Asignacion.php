<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php');
class Asignacion extends Model{
	public $pincho_id;
	public $usuario_id;
		
	public function getListAllAsignaciones(){
		$sentencia= $GLOBALS['DB']->prepare("SELECT u.name as nombreUsuario, u.usuario_id,p.nombre as nombrePincho, p.pincho_id, (SELECT a.pincho_id FROM asignaciones a WHERE a.pincho_id = p.pincho_id AND a.usuario_id = u.usuario_id) as asignado
											FROM users u
											LEFT JOIN pinchos p ON 1
											WHERE u.role = 'profesional'
											ORDER BY u.usuario_id ASC");
											
		$sentencia->execute();
		
		if($sentencia->rowCount() > 0){
			return $sentencia->fetchall();
		}
		
		return false;
		
	}
	
	public function getListAsignaciones($usuario_id){
		$sentencia= $GLOBALS['DB']->prepare('SELECT usuario_id, pincho_id
											 FROM asignaciones
											 WHERE usuario_id = ? ');
		$sentencia->execute(array($usuario_id));
		
		if($sentencia->rowCount() > 0){
			return $sentencia->fetchall();
		}
		
		return false;
	}
	
	public function get($usuario_id, $pincho_id){
		$sentencia= $GLOBALS['DB']->prepare('SELECT usuario_id, pincho_id
											 FROM asignaciones
											 WHERE usuario_id = ? AND pincho_id = ? ');
		$sentencia->execute(array($usuario_id, $pincho_id));
		
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
			return false;
		}else{
			return true;
		}	
	}
	
	public function delete($pincho_id, $usuario_id){
		
		$sentencia = $GLOBALS['DB']->prepare("DELETE FROM asignaciones 
											  WHERE usuario_id = ? AND pincho_id = ? ");
											  
		$sentencia->execute(array($usuario_id, $pincho_id));
		
		if($sentencia->rowCount() == 0){
			return false;
		}else{
			return true;
		}	
	}

}