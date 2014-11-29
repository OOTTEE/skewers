<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');


// CONTROLADOR DE ACCIONES 

function index(){
	if(isUserLoginWhithRole('administrador')){
		$GLOBALS['conf'] = (new Configuracion())->get();
		if($GLOBALS['conf']->votacionesFinalistas == 1 AND $GLOBALS['conf']->votacionesGanadores == 1){
				addNotificacion('<strong>ATENCION: </strong>Tanto como la votación de <u>pinchos finalistas</u> 
									y <u>pinchos ganadores</u> se <u>activada</u>.','warning');
		}	
		inicio();
	}else{	
		redirecionar('/');		
	}
	closeServerSession();
}

// FUNCIONES (CASOS DE USO); 

function inicio(){
	
	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].'loginNavAdministrador.php');
	
	include_once($GLOBALS['TEMPLATES_PATH'].'index/index.php');
	echo '<h1>administrador</h1>';
	
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}


index();