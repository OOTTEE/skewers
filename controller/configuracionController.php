<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');


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
		}else{	
			redirecionar('/');	
		}
	}else{	
		redirecionar('/');		
	}
	closeServerSession();
}



/**
*	Author: Javier Lorenzo Martin
*	En este caso, se editan la configuracion de la pagina
*	se validan todos los campo, que sean correctos, y se notifica al usuario.
*/

function editarConfiguracion(){
	
	//PENDIENTE EL GUARDADO DE LAS IMAGENES
	if($_POST['nombreConcurso'] == ''){
		addNotificacion('El <u>nombre del concurso</u> no puede esta vacio.','danger');		
	}
	if($_POST['descripcionConcurso'] == ''){
		addNotificacion('La <u>Descripción del concurso</u> se encuentra vacía.','info');		
	}
	if($_POST['fechaInicio'] == ''){
		addNotificacion('La <u>Fecha de inicio</u> no puede esta vacio.','danger');		
	}
	if($_POST['fechaFin'] == ''){
		addNotificacion('La <u>fecha de fin</u> no puede esta vacio.','danger');		
	}
	
	$parametros = array('nombre' => $_POST['nombreConcurso'],
						'descripcion' => $_POST['descripcionConcurso'],
						'f_inicio' => $_POST['fechaInicio'],
						'f_fin' => $_POST['fechaFin'],
						'votacionesPopulares' => ((isset($_POST['votacionesPopulares']))? 1 : 0),
						'votacionesFinalistas' => ((isset($_POST['votacionesFinalistas']))? 1 : 0),
						'votacionesGanadores' => ((isset($_POST['votacionesGanadores']))? 1 : 0));
					
	if(!isset($_POST['logoConcurso']))
		addNotificacion('<strong>Informacion: </strong>No ha subido ninguna imagend de <u>Logo</u>.','info');		
	else
		$parametros['logo'] = $_POST['logoConcurso'];
		
		
	if(!isset($_POST['imagenConcurso']))
		addNotificacion('<strong>Informacion: </strong>No ha subido ninguna imagend de <u>Concurso</u>.','info');	
	else
		$parametros['imagen'] = $_POST['imagenConcurso'];		
		
	$conf = new Configuracion();
	$res = $conf->set($parametros);
	if($res){
		addNotificacion('Las configuración se ha guardado <strong><u>Correctamente</u></strong>.','success');
	}else{
		addNotificacion('<strong>Error: </strong>Se ha producido un error al guardar la configuración.','danger');	
	}

	redirecionarWithParams($GLOBALS['CONTROLLER_URL'].'adminController.php',array(array('action','verConfiguracion')));
}

index();