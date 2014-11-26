<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');


function index(){
	if(isUserLogin()){
		inicio();
	}else{	
		redirecionar('/');		
	}
}

function inicio(){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	
	echo '<h1>popular</h1>';
	
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
index();