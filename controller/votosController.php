<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Voto.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');


function index(){
	if(isUserLoginWhithRole('establecimiento')){
		$GLOBALS['conf'] = (new Configuracion())->get();
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'registrarVotoPopular' ){
			registrarVotoPopular();
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'generarCodigos' ){
			generarCodigos();
		}else{
			redirecionar('/');	
		}
	}else{	
		redirecionar('/');		
	}
	closeServerSession();
}


function registrarVotoPopular(){
	
}

function generarCodigos(){
	//Validaciones pendientes
	$voto = new Voto();
	$voto->pincho_id = $_SESSION['user']['usuario_id'];
	$voto->generarVotos($_POST['numCodigos']);
	redirecionar('/');
	
}

//Aqui realizamos la accion de meter el voto del pincho seleccionado en la tabla votos
//Autor: Anibal
function registrarVotoPopular()
{	
	$pincho1= new Pincho(); 
	$pincho2= new Pincho();
	$pincho3= new Pincho();
	
	$pincho1->pincho_id = $_REQUEST['id1'];
	$pincho2->pincho_id = $_REQUEST['id2'];
	$pincho3->pincho_id = $_REQUEST['id3'];
	
	if($pincho1->getPincho() && $pincho2->getPincho() && $pincho3->getPincho())
	{
		$voto1= new Voto();
		$voto2= new Voto();
		$voto3= new Voto();
			
		$voto1->pincho_id = $_REQUEST['id1'];
		$voto2->pincho_id = $_REQUEST['id2'];
		$voto3->pincho_id = $_REQUEST['id3'];
		
		$voto1->usuario_id = $_SESSION['user']['usuario_id'];
		$voto2->usuario_id = $_SESSION['user']['usuario_id'];
		$voto3->usuario_id = $_SESSION['user']['usuario_id'];
		
		if(isset($_REQUEST['opcion'])){
			switch ($_REQUEST['opcion']) {
				case 1:
					$voto1->me_gusta = '1';
					break;
				case 2:
					$voto2->me_gusta = '1';
					break;
				case 3:
					$voto3->me_gusta = '1';
					break;
			}
			
			$voto1->registrar();
			$voto2->registrar();
			$voto3->registrar();
		}
	}
	else
	{
		redirecionar('/');
	}
}

index();