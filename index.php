<?php 
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	
	$TEMPLATES = './template/';
	$MODEL = './model/';
	$CONTROLLER = './controller/';
	$LIB = './lib/';
	$LIB_PHP = './lib/php/';
	$BOOTSTRAP = './lib/bootstrap/';
	$CSS = './lib/css/';
	
	include_once($LIB_PHP.'database.php');
	require_once($TEMPLATES.'header.php');
	session_start();
	
	if(isset($_SESSION['login'] )){
		require_once($TEMPLATES.'inicio.php');
	}else{
		require_once($TEMPLATES.'login.php');
	}
	
	
	$DB = connection();
	
	if($users = mysqli_query($DB,'SELECT * FROM users')){
		while ($row = mysqli_fetch_row($users)) {
		}
	}else{
		echo "error en la consulta";
		die();
	}
	
	closeConnection($DB);
		
	require_once($TEMPLATES.'footer.php');
?>
