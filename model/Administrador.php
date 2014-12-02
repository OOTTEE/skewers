<?php
class Administrador extends Model{
		
	public $usuario_id;
	public $name;
	public $user;
	public $password;
	public $role;
	public $phone;
	private $database;
	
	
	public function getUsuarios($id){
		
		
		$sentencia= $GLOBALS['DB']->prepare('SELECT usuario_id, name, username, role, phone
								FROM users
								WHERE usuario_id = ? ');
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
