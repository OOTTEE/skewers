<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($MODEL_PATH.'User.php');


function index(){
	if(isUserLogin()){
		inicio();
	}else{	
		redirecionar('/');		
	}
}

function inicio(){
	GLOBAL $LAYOUT_PATH;
	GLOBAL $BOOTSTRAP_URL;
	GLOBAL $CSS_URL;
	include_once($LAYOUT_PATH.'header.php');
	
	echo '<h1>administrador</h1>';
	
	
	include_once($LAYOUT_PATH.'footer.php');
}
index();