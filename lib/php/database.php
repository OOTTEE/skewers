<?php
function connection(){
	$mysqli = new mysqli('localhost','skewersUser','skewersPass','skewersDB');

	if ($mysqli->connect_errno) {
		printf("Fall� la conexi�n: %s\n", $mysqli->connect_error);
		die();
	}
	return $mysqli;
	
}

function closeConnection($mysqli){
	$mysqli->close();
}