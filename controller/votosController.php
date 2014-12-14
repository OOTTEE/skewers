<?php
include_once('../lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'Voto.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');


function index(){
	if(isUserLoginWhithRole('establecimiento')){
		$GLOBALS['conf'] = (new Configuracion())->get();
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'generarCodigos' ){
			generarCodigos();
		}else{
			redirecionar($GLOBALS['INDEX']);	
		}
	}else if(isUserLoginWhithRole('popular')){	
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'registrarVotoPopular' ){
			registrarVotoPopular();
		}else{
			redirecionar($GLOBALS['INDEX']);		
		}
	}else{
		redirecionar($GLOBALS['INDEX']);		
	}
	closeServerSession();
}


function generarCodigos(){

	$voto = new Voto();
	$voto->pincho_id = $_SESSION['user']['usuario_id'];
	$voto->generarVotos($_POST['numCodigos']);
	
	$votos = $voto->getUltimosVotos($_POST['numCodigos']);
	
	include_once($GLOBALS['TEMPLATES_PATH'].'establecimiento/codigos.php');

}

//Aqui realizamos la accion de meter el voto del pincho seleccionado en la tabla votos
//Autor: Javier Lorenzo Martin - Anibal Manuel Garcia Brey
function registrarVotoPopular(){	
	if($GLOBALS['conf']->votacionesPopulares == '1'){
		addNotificacion('Las votaciones estan desactivadas','info');
		redirecionar($GLOBALS['INDEX']);
		return 0;
	}
	
	$pincho1= new Pincho(); 
	$pincho2= new Pincho();
	$pincho3= new Pincho();
	
	if(isset($_POST['codigo_1']) && isset($_POST['codigo_2']) && isset($_POST['codigo_3']) && isset($_POST['votado'])){
		$cod1 = explode('-',$_POST['codigo_1'] );
		$cod2 = explode('-',$_POST['codigo_2'] );
		$cod3 = explode('-',$_POST['codigo_3'] );
		if( count($cod1)===2 AND count($cod3)===2 AND count($cod2)===2){
		
			$voto1= new Voto();
			$voto2= new Voto();
			$voto3= new Voto();
			
			$voto1->pincho_id=intval($cod1[0]);
			$voto2->pincho_id=intval($cod2[0]);
			$voto3->pincho_id=intval($cod3[0]);
			
			$voto1->codigo_id=intval($cod1[1]);
			$voto2->codigo_id=intval($cod2[1]);
			$voto3->codigo_id=intval($cod3[1]);
			
			if($voto1->pincho_id != $voto2->pincho_id AND $voto1->pincho_id != $voto3->pincho_id AND $voto2->pincho_id != $voto3->pincho_id
				AND $voto1->codigo_id != $voto2->codigo_id AND $voto1->codigo_id != $voto3->codigo_id AND $voto2->codigo_id != $voto3->codigo_id){
			
				$fail=false;
				
				if(!$voto1->isAvailable()){
					$fail=true;
					addNotificacion('Codigo 1 no es valido, o ya está usado', 'danger');
				}
				if(!$voto2->isAvailable()){
					$fail=true;
					addNotificacion('Codigo 2 no es valido, o ya está usado', 'danger');
				}
				if(!$voto3->isAvailable()){
					$fail=true;
					addNotificacion('Codigo 3 no es valido, o ya está usado', 'danger');
				}
				
				$voto1->usuario_id = $_SESSION['user']['usuario_id'];
				$voto2->usuario_id = $_SESSION['user']['usuario_id'];
				$voto3->usuario_id = $_SESSION['user']['usuario_id'];
				
				switch($_POST['votado']){
					case 1:
						$voto1->me_gusta = 1;
						break;
					case 2:
						$voto1->me_gusta = 1;
						break;
					case 3:
						$voto1->me_gusta = 1;
						break;
					default:
						$fail = true;
						addNotificacion('Selecciones un pincho para votarlo', 'danger');
						redirecionar($GLOBALS['INDEX']);
						break;
				}
				
				
				if(!$fail){		
					$voto1->registrarVotacion();
					$voto2->registrarVotacion();
					$voto3->registrarVotacion();
					addNotificacion('Votacion realizada', 'success');
					redirecionar($GLOBALS['INDEX']);
				}else{
					addNotificacion('Introduzca 3 códigos correctos.','danger');
					redirecionar($GLOBALS['INDEX']);
				}
			}else{
				addNotificacion('Los códigos no se pueden repetir.','danger');
				redirecionar($GLOBALS['INDEX']);
			}
		}
		else
		{
			addNotificacion('Introduzca 3 códigos correctos.','danger');
			redirecionar($GLOBALS['INDEX']);
		}
	}
	else
	{
		addNotificacion('Introduzca 3 códigos y vote.', 'danger');
		redirecionar($GLOBALS['INDEX']);
	}
	
}

index();
