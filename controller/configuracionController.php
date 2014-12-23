<?php
include_once('../lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');
include_once($GLOBALS['MODEL_PATH'].'PuntuacionFinalista.php');

/**
*	Author: Javier Lorenzo Martin
*	Controlador de acciones para la configuración, solo se permite el acceso al usuario administrador
*/
function index(){
	if(isUserLoginWhithRole('administrador')){
		$GLOBALS['conf']=(new Configuracion())->get();
		if($GLOBALS['conf']->votacionesFinalistas == 1 AND $GLOBALS['conf']->votacionesGanadores == 1){
				addNotificacion('<strong>ATENCION: </strong>Tanto como la votación de <u>pinchos finalistas</u>
									y <u>pinchos ganadores</u> se <u>activada</u>.','warning');
		}
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'editarConfiguracion' ){
			editarConfiguracion();
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'calcularFinalistas' ){
			calcularFinalistas();
			redirecionar($GLOBALS['INDEX']);

		}else{
			redirecionar($GLOBALS['INDEX']);
		}
	}else{
		redirecionar($GLOBALS['INDEX']);
	}
	closeServerSession();
}



/**
*	Author: Javier Lorenzo Martin - Hector Novoa Novoa
*	En este caso, se editan la configuracion de la pagina
*	se validan todos los campo, que sean correctos, se notifica al usuario y se calculan los finalistas .
*/

function calcularFinalistas(){
		$fin= new PuntuacionFinalista();
		$res=$fin->calcFinalistas();

		if($res){
			addNotificacion('Finalistas calculados correctamente','success');
		}else{
			addNotificacion('No ha sido posible calcular los finalistas o ya han sido calculados','warning');
		}

}

function editarConfiguracion(){

	$valido=true;
	if($_POST['nombreConcurso'] == ''){
		addNotificacion('El <u>nombre del concurso</u> no puede esta vacio.','danger');
		$valido=false;
	}
	if($_POST['descripcionConcurso'] == ''){
		addNotificacion('La <u>Descripción del concurso</u> se encuentra vacía.','info');
		$valido=false;
	}
	if($_POST['fechaInicio'] == ''){
		addNotificacion('La <u>Fecha de inicio</u> no puede esta vacio.','danger');
		$valido=false;
	}
	if($_POST['fechaFin'] == ''){
		addNotificacion('La <u>fecha de fin</u> no puede esta vacio.','danger');
		$valido=false;
	}
	if($valido){
		$parametros = array('nombre' => $_POST['nombreConcurso'],
							'descripcion' => $_POST['descripcionConcurso'],
							'f_inicio' => $_POST['fechaInicio'],
							'f_fin' => $_POST['fechaFin'],
							'resultados' => ((isset($_POST['resultados']))? 1 : 0),
							'votacionesPopulares' => ((isset($_POST['votacionesPopulares']))? 1 : 0),
							'votacionesFinalistas' => ((isset($_POST['votacionesFinalistas']))? 1 : 0),
							'votacionesGanadores' => ((isset($_POST['votacionesGanadores']))? 1 : 0));

/*		if(!isset($_POST['logoConcurso']))
			addNotificacion('<strong>Informacion: </strong>No ha subido ninguna imagend de <u>Logo</u>.','info');
		else

			$parametros['logo'] = $_POST['logoConcurso'];
			$img=UpImagen(1,'cl');
*/

		/*if(!isset($_POST['imagenConcurso']))
			addNotificacion('<strong>Informacion: </strong>No ha subido ninguna imagend de <u>Concurso</u>.','info');
		else*/
			//$imagen=$_POST['imagenConcurso'];
			//$parametros['imagen'] = $_POST['imagenConcurso'];
			var_dump(basename($_FILES['imagenConcurso']['name']));
			die();
			$img=UpImagen(1,'ci');



		$conf = new Configuracion();
		$res = $conf->set($parametros);
		if(!$res || !$img){
			addNotificacion('<strong>Error: </strong>Se ha producido un error al guardar la configuración.','danger');
		}else{
			addNotificacion('Las configuración se ha guardado <strong><u>Correctamente</u></strong>.','success');

		}
	}
	redirecionarWithParams($GLOBALS['CONTROLLER_URL'].'adminController.php',array(array('action','verConfiguracion')));
}

index();
