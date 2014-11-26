<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($MODEL_PATH.'User.php');

include_once($LAYOUT_PATH.'header.php');
	
include_once($TEMPLATES_PATH.'index/index.php');
	
include_once($LAYOUT_PATH.'footer.php');
	
session_write_close();
?>
