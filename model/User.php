<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php');
class User extends Model{
	public $usuario_id;
	public $name;
	public $user;
	public $password;
	public $role;
	public $phone;
	private $database;
	
	
	
	
	public function isRegister($params){
			
		/* Ejecuta una sentencia preparada pasando un array de valores */
		$sentencia = $GLOBALS['DB']->prepare('SELECT usuario_id, name, username, role, phone
								FROM users
								WHERE username = :username AND password = :password');
		$sentencia->execute(array(':username' => $params['username'],
									':password' => $params['password']));
		$user = $sentencia->fetchAll()[0];				
		if(count($user == 1))
			return $user;
		else
			return false;
	}
	
	public function register($params){
			
		/* Ejecuta una sentencia preparada pasando un array de valores */
		
		$sentencia = $GLOBALS['DB']->prepare("INSERT INTO users (name, username, password, role, phone,email) VALUES (:name, :username, :password, :role, :phone, :email)");

		$sentencia->execute(array(':name' =>$params['name'],
							':username' =>$params['username'],
							':password' =>$params['password'],
							':role' =>$params['role'],
							':phone' =>$params['phone'],
							':email' =>$params['email']));
							
		if($sentencia->rowCount() == 0){
			return false;
		}else{
			return $GLOBALS['DB']->lastInsertId();
		}	
	}
	
	
	
	public function getUser($id){
		$sentencia= $GLOBALS['DB']->prepare('SELECT usuario_id, name, username, role, phone
								FROM users
								WHERE usuario_id = ? ');
		//MANTENER $sentencia->execute(array($id)); y boorrar este comentario
		$sentencia->execute(array($id));
		$resul=$sentencia->fetchall()[0];
		
		
		$this->usuario_id=$resul['usuario_id'];
		$this->name=$resul['name'];
		$this->user=$resul['username'];
		$this->role=$resul['role'];
		$this->phone=$resul['phone'];
		
		return $this;
	}

	//FUNCIONES EDGAR
	public function modifyUser($usuario_id, $name, $username, $password, $role, $phone){
		GLOBAL $DB;	
		$sentencia = $DB->prepare("UPDATE users SET name=?, username=?, password=?, phone=?, role=? WHERE usuario_id=?");			
		$sentencia->execute(array($name,$username, $password, $phone, $role,$usuario_id));			
		if($sentencia->rowCount() > 0) 
			return true;
		else 
			return false;
	}
	
	public function countUsers(){
		$sentencia= $GLOBALS['DB']->prepare('SELECT  COUNT(*) as Number FROM users WHERE role <> "administrador" ');
		$sentencia->execute();
		$resul=$sentencia->fetchall()[0];
		
		
		
		return $resul;
	}
	public function getUsers(){
		$sentencia1= $GLOBALS['DB']->prepare('SELECT  COUNT(*) as Number FROM users WHERE role <> "administrador" ');
		$sentencia1->execute();
		$resul1=$sentencia1->fetchall()[0];
		$countUsers = $resul1;
		$sentencia2= $GLOBALS['DB']->prepare('SELECT name 
								FROM users
								WHERE role <> "administrador" ');
		$sentencia2->execute();
		$resul2=$sentencia2->fetchall(); 
		return $resul2;
			
	}
	public function deleteUser($nameUser){
		$sentencia= $GLOBALS['DB']->prepare('DELETE FROM users WHERE name = ? ');
		
			$sentencia->execute(array($nameUser));
			if($sentencia->rowCount() > 0) 
				return true;

			else 
				return false;
		
		
	}
	public function getName($id){
		$sentencia= $GLOBALS['DB']->prepare('SELECT  name FROM users WHERE usuario_id = ? ');
		$sentencia->execute(array($id));
		$resul=$sentencia->fetchall()[0];
		$name = $resul['name'];
		
		
		return $name;
	}
	public function getID($nameUser){
		$sentencia= $GLOBALS['DB']->prepare('SELECT  usuario_id FROM users WHERE name = ? ');
		$sentencia->execute(array($nameUser));
		$resul=$sentencia->fetchall()[0];
		$id = $resul['usuario_id'];
		
		
		return $id;
	}
	//FUNCIONES EDGAR FIN
}

