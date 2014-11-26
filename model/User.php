<?php 
class User{
	public $usuario_id;
	public $name;
	public $user;
	public $password;
	public $role;
	public $phone;
	private $database;
	
	function User(){
		 GLOBAL $DB;	
		 try{
			if(!isset($DB)){
				Throw new Exception("<b>Error:</b> No se ha abierto la conexion a la base de datos para el User");
				die();
			}			
		 } catch(Exception $e){
			 echo "<b>line:</b> ".$e->getLine()."<b> - Error:</b> ".$e->getMessage();
		 }
	}
	
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
	
	}

}