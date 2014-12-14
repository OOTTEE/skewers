<?php
include_once('../lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');
include_once($GLOBALS['MODEL_PATH'].'Asignacion.php');
include_once($GLOBALS['MODEL_PATH'].'Pincho.php');

$GLOBALS['conf']=(new Configuracion())->get();
/*
*	Author: Hector Novoa Novoa
*	Controlador de votacion de finalistas y ganadores
*
*/



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
		redirecionar($GLOBALS['INDEX']);		
	}
	closeServerSession();
}
/*
*	Author: Hector Novoa Novoa
*	Inicio de Usuario jurado profesional
*
*/
function inicio(){

	
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavProfesional.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'profesional/index.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}

/*
*	Author: Hector Novoa Novoa
*	Votado de finalistas mostrando una lista con los pinchos finalistas
*
*/
function votarFinalista(){
	$Asignacion=new Asignacion();
	$Pinchos=$Asignacion->getListAsignaciones($_SESSION['user']['usuario_id']);
	if($Pinchos==false || $GLOBALS['conf']->votacionesFinalistas == 0){
		addNotificacion('En este momento no tienes pinchos asignados para votar', 'warning');
		inicio();
	}else{
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavProfesional.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'profesional/votarFinalistas.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
	}

}
/*
*	Author: Hector Novoa Novoa
*	Votado de ganadores mostrando una lista con los pinchos finalistas
*
*/
function votarPremiados(){

	$pin=new Pincho();
	$finalistas=$pin->getPinchoFinalistasLimitById($_SESSION['user']['usuario_id']);

	if($finalistas==false || $GLOBALS['conf']->votacionesGanadores ==0 || $GLOBALS['conf']->votacionesFinalistas ==1 ){
		addNotificacion('Concurso no disponible','warning');
		inicio();
	}else{
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavProfesional.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'profesional/votarPremiados.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
	}




}

index();
