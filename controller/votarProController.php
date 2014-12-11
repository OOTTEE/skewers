<?php
include_once(getcwd().'/../lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');
include_once($GLOBALS['MODEL_PATH'].'Pincho.php');
include_once($GLOBALS['MODEL_PATH'].'PuntuacionFinalista.php');
include_once($GLOBALS['MODEL_PATH'].'PuntuacionGanadores.php');

/*
*	Author: Hector Novoa Novoa
*	Controlador que permite votar  y registrar la nota asignada tanto a los finalistas  como a los ganadores
*
*/


function index(){
	if(isUserLoginWhithRole('profesional') && isset($_REQUEST['action'])){
		$GLOBALS['conf'] = (new Configuracion())->get();
		
		if($_REQUEST['action']== 'votarF'){
				votaFinalistas();
		}else if($_REQUEST['action']== 'registrarF'){
				registrarFinalistas();
				redirecionar('/controller/profesionalController.php?action=votarFinalistas');
		}else if($_REQUEST['action']== 'votarP'){		
				votaPremiado();
		}else if($_REQUEST['action']== 'registrarP'){
				registraPremiado();
				redirecionar('/controller/profesionalController.php?action=votarPremiados');
		}else{
				redirecionar('/');
		}
	}else{	

		redirecionar('/');		
	}
	closeServerSession();
}
/*
*	Author: Hector Novoa Novoa
*	Muestra la informacion del pincho seleccionado en el controlador profesionalControler.php permitiendo
*   seleccionar la nota asignada al pincho.
*
*/

function votaFinalistas(){
	$Pincho= new Pincho();
	$Pincho->pincho_id=$_POST['pincho_id'];
	$InfoPincho=$Pincho->getPincho();
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavProfesional.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'votarProfesional/votarPinchoFinalista.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');	
	
}

/*
*	Author: Hector Novoa Novoa
*	Registra la puntuacion asignada a un pincho el la funcion votaFinalistas()
*
*/
function registrarFinalistas(){
		$Puntuacion= new PuntuacionFinalista();
		$Puntuacion->register(array(
			'usuario_id' => $_SESSION['user']['usuario_id'],
			'pincho_id' => $_POST['pincho_id'],
			'nota' => $_POST['nota']));	

}
/*
*	Author: Hector Novoa Novoa
*	Muestra la informacion del pincho seleccionado en el controlador profesionalControler.php permitiendo
*   seleccionar la nota asignada al pincho que participa ya como finalista.
*
*/
function votaPremiado(){
print_r($_POST['pincho_id']);
	$Pincho= new Pincho();
	$Pincho->pincho_id=$_POST['pincho_id'];
	$InfoPincho=$Pincho->getPincho();
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavProfesional.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'votarProfesional/votarPinchoPremiado.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');	


}

/*
*	Author: Hector Novoa Novoa
*	Registra la puntuacion asignada a un pincho el la funcion votaPremiado()
*
*/

function registraPremiado(){
		$Puntuacion= new PuntuacionGanadores();
		
		$Puntuacion->register(array(
			'usuario_id' => $_SESSION['user']['usuario_id'],
			'pincho_id' => $_POST['pincho_id'],
			'nota' => $_POST['nota']));	



}
index();