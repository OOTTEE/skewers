<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');
include_once($GLOBALS['MODEL_PATH'].'Pincho.php');
include_once($GLOBALS['MODEL_PATH'].'PuntuacionFinalista.php');

function index(){
	if(isUserLoginWhithRole('profesional') && isset($_REQUEST['action'])){
		$GLOBALS['conf'] = (new Configuracion())->get();
		
		if($_REQUEST['action']== 'votar'){
				votaFinalistas();
		}else if($_REQUEST['action']== 'registrar'){
				registrarFinalistas();
				redirecionar('/controller/profesionalController.php?action=votarFinalistas');
		}else{
				redirecionar('/');
		}
	}else{	
		redirecionar('/');		
	}
	closeServerSession();
}


function votaFinalistas(){
	$Pincho= new Pincho();
	$Pincho->pincho_id=$_POST['pincho_id'];
	$InfoPincho=$Pincho->getPincho();
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavProfesional.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'votarProfesional/votarPinchoFinalista.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');	
	
}
function registrarFinalistas(){
		$Puntuacion= new PuntuacionFinalista();
		$Puntuacion->register(array(
			'usuario_id' => $_SESSION['user']['usuario_id'],
			'pincho_id' => $_POST['pincho_id'],
			'nota' => $_POST['nota']));	

}
index();