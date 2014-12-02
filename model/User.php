<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php');
include_once($GLOBALS['LIB_PHP_PATH'].'database.php');
class User extends Model{
	public $usuario_id;
	public $name;
	public $user;
	public $password;
	public $role;
	public $phone;
	private $database;
	
	
	
	
	public function isRegister($params){
		GLOBAL $DB;	
		/* Ejecuta una sentencia preparada pasando un array de valores */
		$sentencia = $DB->prepare('SELECT usuario_id, name, username, role, phone
								FROM users
								WHERE username = :username AND password = :password');
		$sentencia->execute(array(':username' => $params['username'],
									':password' => $params['password']));
		$user = $sentencia->fetchAll();				
		if(count($user == 1))
			return $user;
		else
			return false;
	}
	
	public function register($params){
		 GLOBAL $DB;	
		/* Ejecuta una sentencia preparada pasando un array de valores */
		
		$sentencia = $DB->prepare("INSERT INTO users (name, username, password, role, phone) VALUES (:name, :username, :password, :role, :phone)");

		$sentencia->execute(array(':name' =>$params['name'],
							':username' =>$params['username'],
							':password' =>$params['password'],
							':role' =>$params['role'],
							':phone' =>$params['phone']));
	
		print_r($sentencia->fetch(PDO::FETCH_ASSOC));
	}
	public function modifyUser($usuario_id, $name, $username, $password, $phone, $role){
		 GLOBAL $DB;	
		/* Ejecuta una sentencia preparada pasando un array de valores */
		
		$sentencia = $DB->prepare("UPDATE users SET name=?, username=?, password=?, phone=?, role=? WHERE usuario_id=?");
	
		try{		
			$sentencia->execute(array($name,$username, $password, $phone, $role,$usuario_id));
			return "REALIZADO";
		}
		catch(PDOException $e){
			return "NO REALIZADO";
		}
	}
	
	
	
	public function getUser($id){
		
		
		$sentencia= $GLOBALS['DB']->prepare('SELECT usuario_id, name, username, role, phone, password
								FROM users
								WHERE usuario_id = ? ');
		$sentencia->execute(array($id));
		$resul=$sentencia->fetchall()[0];
		$object= new User();
		
		$object->usuario_id=$resul['usuario_id'];
		$object->name=$resul['name'];
		$object->user=$resul['username'];
		$object->password=$resul['password'];
		$object->role=$resul['role'];
		$object->phone=$resul['phone'];
		
		return $object;
			
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
}
