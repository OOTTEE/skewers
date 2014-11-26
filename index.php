<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($MODEL_PATH.'User.php');

include_once($LAYOUT_PATH.'header.php');
	
	/*
	connection();
	$user = new User();
	
	if(isset($_SESSION['login'] )){
		
		header($CONTROLLER.'usersController.php');
	}else{
		if(isset($_POST['action']) AND $_POST['action'] == 'register' ){
			$user->register(array(
				'name' => $_POST['name'],
				'username' => $_POST['username'],
				'password' => $_POST['password'],
				'role' => (isset($_POST['type'])) ? 'establecimiento' : 'popular',
				'phone' => $_POST['phone']
			));
		}else if(isset($_POST['action']) AND $_POST['action'] = 'login' ){
			if($usuario = $user->isRegister(array('username' => $_POST['username'], 'password' => $_POST['password']))){
				$_SESSION['user'] = $usuario;
				header('Location: '.$CONTROLLER.'usersController.php');
			}else{
				header('./');
			}
		}else
			include_once($TEMPLATES.'login.php');
	}
	
	closeConnection();
	*/
	include_once($TEMPLATES_PATH.'index/index.php');
		
	include_once($LAYOUT_PATH.'footer.php');
	
	session_write_close();
	
?>
