<?php

function connection(){

	GLOBAL $DB;
	$dsn = 'mysql:dbname=skewersDB;host=127.0.0.1';
	$usuario = 'skewersUser';
	$contrase�a = 'skewersPass';
	
	try {
		$DB = new PDO($dsn, $usuario, $contrase�a);
		return true;
	} catch (PDOException $e) {
		echo 'Fall� la conexi�n: ' . $e->getMessage();
		return false;
	}
}

function closeConnection(){	
	GLOBAL $DB;
	$DB= null;
}