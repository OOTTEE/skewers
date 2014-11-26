<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php';
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
	
	
	
	public function getUser($id){
		
		
		$sentencia= $GLOBALS['DB']->prepare(SELECT usuario_id, name, username, role, phone
								FROM users
								WHERE username = ? );
		$sentencia=$GLOBALS['DB']->execute(array($id));
		$resul=$sentencia->fetchall()[0];
		$object= new User();
		
		$object->usuario_id=$resul['usuario_id'];
		$object->name=$resul['name'];
		$object->user=$resul['username'];
		$object->role=$resul['role'];
		$object->phone=$resul['phone'];
		
		return $object;
			
	}

}