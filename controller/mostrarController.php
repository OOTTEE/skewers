<?php
include_once('../lib/php/includes.php');
include_once($GLOBALS['MODEL_PATH'].'User.php');
include_once($GLOBALS['MODEL_PATH'].'Configuracion.php');
include_once($GLOBALS['MODEL_PATH'].'Pincho.php');
include_once($GLOBALS['MODEL_PATH'].'Establecimiento.php');
include_once($GLOBALS['MODEL_PATH'].'Voto.php');
include_once($GLOBALS['MODEL_PATH'].'PuntuacionGanadores.php');
include_once($GLOBALS['MODEL_PATH'].'PuntuacionFinalista.php');


/*Author: Hector Novoa Novoa
*	Controlador que permite mostrar la informacion de pinchos y establecimientos participantes en el concurso
*/

function index(){
	$GLOBALS['conf']=(new Configuracion())->get();


	if(!isUserLogin()){
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'restaurante'){
			restaurante('notLoginNav.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pincho'){
			pincho('notLoginNav.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'finalistas'){
			finalistas('notLoginNav.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'premiados'){
			premiados('notLoginNav.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'ganaProfesional'){
			ganadoresPro('notLoginNav.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'ganaPopular'){
			ganadoresPop('notLoginNav.php');
		}else{
			inicio('notLoginNav.php');
		}

	}else if(isUserLoginWhithRole('administrador')){
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'restaurante'){
			restaurante('loginNavAdministrador.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pincho'){
			pincho('loginNavAdministrador.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'finalistas'){
			finalistas('loginNavAdministrador.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'premiados'){
			premiados('loginNavAdministrador.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'ganaProfesional'){
			ganadoresPro('loginNavAdministrador.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'ganaPopular'){
			ganadoresPop('loginNavAdministrador.php');
		}else{
			inicio('loginNavAdministrador.php');
		}
	}else if(isUserLoginWhithRole('profesional')){
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'restaurante'){
			restaurante('loginNavProfesional.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pincho'){
			pincho('loginNavProfesional.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'finalistas'){
			finalistas('loginNavProfesional.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'premiados'){
			premiados('loginNavProfesional.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'ganaProfesional'){
			ganadoresPro('loginNavProfesional.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'ganaPopular'){
			ganadoresPop('loginNavProfesional.php');
		}else{
			inicio('loginNavProfesional.php');
		}
	}else if(isUserLoginWhithRole('popular')){
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'restaurante'){
			restaurante('loginNavPopular.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pincho'){
			pincho('loginNavPopular.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'finalistas'){
			finalistas('loginNavPopular.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'premiados'){
			premiados('loginNavPopular.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'ganaProfesional'){
			ganadoresPro('loginNavPopular.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'ganaPopular'){
			ganadoresPop('loginNavPopular.php');
		}else{
			inicio('loginNavPopular.php');
		}
	}else if(isUserLoginWhithRole('establecimiento')){
		$establecimiento = new Establecimiento();
		$establecimiento->usuario_id = $_SESSION['user']['usuario_id'];
		$GLOBALS['Pincho'] = $establecimiento->hasPincho();
		if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'restaurante'){
			restaurante('loginNavEstablecimiento.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pincho'){
			pincho('loginNavEstablecimiento.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'finalistas'){
			finalistas('loginNavEstablecimiento.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'premiados'){
			premiados('loginNavEstablecimiento.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'ganaProfesional'){
			ganadoresPro('loginNavEstablecimiento.php');
		}else if(isset($_REQUEST['action']) AND $_REQUEST['action'] == 'ganaPopular'){
			ganadoresPop('loginNavEstablecimiento.php');
		}else{
			inicio('loginNavEstablecimiento.php');
		}
	}else{
		redirecionar($GLOBALS['INDEX']);
	}
	session_write_close();
}
/*Author: Hector Novoa Novoa
*	Muestra informacion del establecimiento indicado
*/

function restaurante($nav){

	$Es=new Establecimiento();
	$EsInfo=$Es->getEstablecimientoByID($_REQUEST['usuario_id']);

	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].$nav);
	include_once($GLOBALS['TEMPLATES_PATH'].'mostrar/restauranteInfo.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
}

/*Author: Hector Novoa Novoa
*		Muestra informacion del pincho indicado
*/
function pincho($nav){
	$Pi=new Pincho();
	$Pi->usuario_id=$_REQUEST['usuario_id'];
	$PiInfo=$Pi->getPinchoByUsuarioId();

	if(!isset($PiInfo)){
		addNotificacion('Pincho no registrado o no validado', 'warning');
	}

	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].$nav);
	include_once($GLOBALS['TEMPLATES_PATH'].'mostrar/pinchoInfo.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');


}
/*Author: Hector Novoa Novoa
*		Muestra lista de finalistas
*/
function finalistas($nav){
		$Pi=new Pincho();
	$PiInf=$Pi->getPinchoFinalistas();

	if($PiInf==false || $GLOBALS['conf']->votacionesFinalistas == 1 ){
		addNotificacion('Concurso no finalizado', 'warning');
		redirecionar($GLOBALS['INDEX']);
	}else{
		include_once($GLOBALS['LAYOUT_PATH'].'header.php');
		include_once($GLOBALS['LAYOUT_PATH'].$nav);
		include_once($GLOBALS['TEMPLATES_PATH'].'mostrar/listFinalistas.php');
		include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
	}
}

/*Author: Hector Novoa Novoa
*		Muestra lista de premiados
*/
function premiados($nav){

	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].$nav);
	include_once($GLOBALS['TEMPLATES_PATH'].'mostrar/premiados.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');


}

function ganadoresPro($nav){

	if($GLOBALS['conf']->resultados==0 || $GLOBALS['conf']->votacionesGanadores==1 || $GLOBALS['conf']->votacionesFinalistas==1){
		addNotificacion('Concurso no finalizado. No se pueden mostrar resultados', 'warning');
		redirecionar($GLOBALS['INDEX']);
	}else{
	$vote= new PuntuacionGanadores();
	$PiInf=$vote->getPremiados();

	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].$nav);
	include_once($GLOBALS['TEMPLATES_PATH'].'mostrar/listPremiados.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');
	}
}

function ganadoresPop($nav){

	if($GLOBALS['conf']->resultados==0 ||$GLOBALS['conf']->votacionesPopulares==1){
		addNotificacion('Concurso no finalizado. No se pueden mostrar resultados', 'warning');
		redirecionar($GLOBALS['INDEX']);
	}else{
	$vote= new Voto();
	$PiInf=$vote->getResulVotos();

	include_once($GLOBALS['LAYOUT_PATH'].'header.php');
	include_once($GLOBALS['LAYOUT_PATH'].$nav);
	include_once($GLOBALS['TEMPLATES_PATH'].'mostrar/listPremiados.php');
	include_once($GLOBALS['LAYOUT_PATH'].'footer.php');

	}


}


index();
