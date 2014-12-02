<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php');
class Asignacion extends Model{
	public $pincho_id;
	public $usuario_id;
		
	
	
	/**
	*	devuelve una lista de todas las asignaciones de todos los usuario profesionales
	*	la lista está agrupada por usuario.
	*/	
	public function getListAllAsignaciones(){
		$sentencia= $GLOBALS['DB']->prepare("SELECT  u.usuario_id as indice ,u.name as nombreUsuario, u.usuario_id ,p.nombre nombrePincho, p.pincho_id,
		(SELECT a.pincho_id FROM asignaciones a WHERE a.pincho_id = p.pincho_id AND a.usuario_id = u.usuario_id) as asignado
											FROM users u
											LEFT JOIN pinchos p ON 1
											WHERE u.role = 'profesional'
											ORDER BY u.usuario_id ASC, p.pincho_id ASC");
											
		$sentencia->execute();
		
		if($sentencia->rowCount() > 0){
			return $sentencia->fetchall(PDO::FETCH_GROUP);
		}
		
		return false;
		
	}
	
	/**
	*	devuelve una lista de las asignaciones asociadas a un usuario profesional determinado
	*	$usuario_id(int) el id del usuario.
	*/	
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
	
	/**
	*	devuelve una asignacion determinada por el id del usuario profesional y del pincho
	*	$usuario_id(int) el id del usuario.
	*	$pincho_id(int) id del pincho.
	*/
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
	
	
	/**
	*	Crea las asignaciones del los pinchos pasados en un array a un usuario profesional indicado.
	*	$usuario_id(int) el id del usuario al que queremos añadir las asignaciones.
	*	$pincho_id(array(int,..)) id de los pinchos que queremos asociar al usuario.
	*/
	public function create($pincho_id, $usuario_id){
		
		$sentencia = $GLOBALS['DB']->prepare("INSERT INTO asignaciones (usuario_id, pincho_id) VALUES (:usuario_id, :pincho_id) ");
											
		foreach($pincho_id as $p){
			$sentencia->execute(array( ':usuario_id' => $usuario_id, ':pincho_id' => $p));
		}
		
		if($sentencia->rowCount() == 0){
			return false;
		}else{
			return true;
		}	
	}
	
	
	/**
	*	Borra todas las asignaciones de pinchos de un usuario profesional determinado por parametro
	*   $usuario_id(int)  id del usuario
	*/
	public function deleteAllFromUser($usuario_id){
		
		$sentencia = $GLOBALS['DB']->prepare("DELETE FROM  `asignaciones` 
											  WHERE usuario_id = ?");
											  
		$sentencia->execute(array($usuario_id));
		
		if($sentencia->rowCount() == 0){
			return false;
		}else{
			return true;
		}	
	}

}