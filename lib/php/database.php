<?php

function connection(){

	GLOBAL $DB;
	$dsn = 'mysql:dbname=skewersDB;host=127.0.0.1';
	$usuario = 'skewersUser';
	$contraseña = 'skewersPass';
	
	try {
		$DB = new PDO($dsn, $usuario, $contraseña);
		return true;
	} catch (PDOException $e) {
		echo 'Falló la conexión: ' . $e->getMessage();
		return false;
	}
}

function closeConnection(){	
	GLOBAL $DB;
	$DB= null;
}