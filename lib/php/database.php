<?php
function connection(){
	$mysqli = new mysqli('localhost','skewersUser','skewersPass','skewersDB');

	if ($mysqli->connect_errno) {
		printf("Falló la conexión: %s\n", $mysqli->connect_error);
		die();
	}
	return $mysqli;
	
}

function closeConnection($mysqli){
	$mysqli->close();
}