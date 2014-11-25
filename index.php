<?php 
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	
	$TEMPLATES = './template/';
	$MODEL = './model/';
	$CONTROLLER = './controller/';
	$LIB = './lib/';
	$LIB_PHP = './lib/php/';
	
	
	include_once($LIB_PHP.'database.php');
	session_start();
	
	$DB = connection();
	
	if($users = $DB->query('SELECT * FROM users')){
		mysqli_free_result($users);
		var_dump($users);
	}else{
		echo "error en la consulta";
		die();
	}
	
	closeConnection($DB);
	
	if(isset($_SESSION['login'] )){
		echo 'login';
	}else{
		echo 'not login';
	}
	
	
	
	require_once($TEMPLATES.'header.php');
	require_once($TEMPLATES.'login.php');
	require_once($TEMPLATES.'footer.php');
?>
