<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php');
class User extends Model{
	public $usuario_id;
	public $name;
	public $user;
	public $password;
	public $role;
	public $phone;
	
	/** Autor: Javier Lorenzo Martin
	* 	Esta funcion busca a un usuario en el sistema buscando por username y password
	*	devuelve un array con la informacion del usuario si es correcto si no false
	*   como parametros recibe un array asociativo con el username y el password
	*/
	
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
	
	/** Autor: Javier Lorenzo Martin
	*	Esta funcion creac un usuario a partir de los parametros recividos a traver del array asociativo de entrada
	* 	Como resultado devuelve un false, o el id del ultimo usuario creado.
	*/
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
	
	
	/** Autor: Javier Lorenzo Martin
	*	Esta funcion devuelve un objeto usuario, filtrado por el atributo $this->usuario_id
	*/
	public function getUser(){
		$sentencia= $GLOBALS['DB']->prepare('SELECT *
											FROM users
											WHERE usuario_id = ? ');
		$sentencia->execute(array($this->usuario_id));
		if($sentencia->rowCount() > 0){
			$resul=$sentencia->fetchall()[0];
			$this->usuario_id=$resul['usuario_id'];
			$this->name=$resul['name'];
			$this->user=$resul['username'];
			$this->role=$resul['role'];
			$this->phone=$resul['phone'];
			return $this;
		}else{
			return false;
		}
		
		
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
		$sentencia= $GLOBALS['DB']->prepare('SELECT *
											FROM users
											WHERE role <> "administrador" ');
		$sentencia->execute();
		$result=$sentencia->fetchall(); 
		return $result;
			
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
	//FUNCIONES EDGAR FIN
}

