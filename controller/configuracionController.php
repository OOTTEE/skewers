<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');


// CONTROLADOR DE ACCIONES 

function index(){
	if(isUserLoginWhithRole('administrador')){
		$GLOBALS['conf']=(new Configuracion())->get();		
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'editarConfiguracion' ){
			editarConfiguracion();
		}else{
			verConfiguracion();
		}
	}else{	
		redirecionar('/');		
	}
	closeServerSession();
}



function verConfiguracion(){
	
	$conf = (new Configuracion())->get();

	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavAdministrador.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'configuracion/configurarWeb.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}

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
	
	if(isset($_POST['votacionesFinalistas']) AND isset($_POST['votacionesGanadores'])){
		addNotificacion('<strong>ATENCION: </strong>Tanto como la votación de <u>pinchos finalistas</u> 
							y <u>pinchos ganadores</u> se <u>activada</u>.','warning');
	}
	redirecionar($GLOBALS['CONTROLLER_URL'].'configuracionController.php');
}

index();