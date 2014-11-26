<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');

include_once($LAYOUT_PATH.'header.php');

include_once($LAYOUT_PATH.'notLoginNav.php');
	
if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'register'){
	include_once($TEMPLATES_PATH.'index/register.php');
}else{
	include_once($TEMPLATES_PATH.'index/index.php');
}
	
include_once($LAYOUT_PATH.'footer.php');
	
session_write_close();
?>
