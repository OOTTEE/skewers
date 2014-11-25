<?php
$database='127.0.0.1';
$user='skewersUser';
$pass='skewersPass';
$server='skewersDB';

function connection(){
	$mysqli = new mysqli($database='localhost',$user='skewersUser',$pass='skewersPass',$server='skewersDB');

	if ($mysqli->connect_errno) {
		printf("Falló la conexión: %s\n", $mysqli->connect_error);
		die();
	}
	return $mysqli;
	
}

function closeConnection($mysqli){
	$mysqli->close();
}