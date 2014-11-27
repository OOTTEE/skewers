<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');


// CONTROLADOR DE ACCIONES 

function index(){
	if(isUserLoginWhithRole('administrador')){
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
	connection();
	$conf = (new Configuracion())->get();
	closeConnection();

	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavAdministrador.php');
	include_once($GLOBALS['TEMPLATES_PATH'].'configuracion/configurarWeb.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}

function editarConfiguracion(){

	//PENDIENTE EL GUARDADO DE LAS IMAGENES
	connection();
	$conf = new Configuracion();
	$conf->set(array('logo' => isset($_POST['logoConcurso']) ? $_POST['logoConcurso'] : '',
					'nombre' => $_POST['nombreConcurso'],
					'descripcion' => $_POST['descripcionConcurso'],
					'imagen' => isset($_POST['imagenConcurso']) ? $_POST['imagenConcurso'] : '',
					'f_inicio' => $_POST['fechaInicio'],
					'f_fin' => $_POST['fechaFin'])
				);
	closeConnection();
	redirecionar($GLOBALS['CONTROLLER_URL'].'configuracionController.php');
}

index();