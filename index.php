<?php 
	require_once('./lib/php/includes.php');
	require_once($TEMPLATES.'header.php');
	require_once($MODEL.'User.php');
	
	
	connection();
	
	$user = new User();
	
	if(isset($_SESSION['login'] )){
		
		header($CONTROLLER.'usersControl.php');
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
		
	require_once($TEMPLATES.'footer.php');
	
?>
