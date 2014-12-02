<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');
include_once($GLOBALS['MODEL_PATH'].'Asignacion.php');


function index(){
	if(isUserLoginWhithRole('profesional')){
		$GLOBALS['conf']=(new Configuracion())->get();
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'votarFinalistas' ){
			votarFinalista();
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'votarPremiados' ){
			votarPremiados();
		}else{
			inicio();
		}
	}else{	
		redirecionar('/');		
	}
	closeServerSession();
}

function inicio(){

	
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavProfesional.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'profesional/index.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}
function votarFinalista(){
	$Asignacion=new Asignacion();
	$Pinchos=$Asignacion->getListAsignaciones($_SESSION['user']['usuario_id']);
	
	
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavProfesional.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'profesional/votarFinalistas.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');

}

function votarPremiados(){
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavProfesional.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'profesional/votarPremiados.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');



}

index();