<?php
	/**
	*	Redirecciona ha una pagina
	*		 $destino nueva direccion a la que redireccionamos
	*/
	function redirecionar($destino){
	echo 'Location: '.$destino;
		header('Location: '.$destino);
	}

	/**
	*	Redirecciona ha una pagina con los parametros pasados por referencia
	*		$destino nueva direccion a la que redireccionamos
	*		$getParams Array de parametros asociados a la redireccion
	*/
	function redirecionarWithParams($destino, $getParams){
		$parametros='';
		foreach($getParams as $param){
			$parametros .= 	$param[0].'='.$param[1].'&';
		}
		header('Location: '.$destino.'?'.$parametros);
	}

	/*
	*	Verifica que un usuario esta logueado en el sistema
	*/
	function isUserLogin(){
		return (isset($_SESSION['login'] ) AND $_SESSION['login']==true);
	}

	/**
	*	Esta funcion verifica que un usaurio esta logeado en el sistema y si pertenece a un role determinado
	*		$role indica el role ha verificar (establecimiento, popular, profesional, administrador
	*/
	function isUserLoginWhithRole($role){
		return (isset($_SESSION['login'] ) AND $_SESSION['login']==true AND $_SESSION['user']['role']==$role);
	}

	/**
	*	Esta funcion cierra la session del usuario en el servidor
	*/
	function closeServerSession(){
		session_write_close();
	}

	/**
	*	Esta funcion permite mostrar mensajes al usuario
	*		$level indica el tipo de notificacion (success, info, warning, danger)
	*		$message indica el contenido del mensaje a mostrar
	*/
	function addNotificacion($message, $level){
		if(!isset($_SESSION['notificaciones']))
			$_SESSION['notificaciones']=array();
		array_push($_SESSION['notificaciones'],array('level' => $level, 'message' => $message));
	}
	/*
	*	Funcion para el guardado de imagenes
	*/
	function UpImagen($Id,$tipo){
		//Definicion path para cada tipo de imagen
		$Image_Path;
		$Usuario;
		//Definicion Establecemento
		if($tipo=='e'){
		$Image_Path = $GLOBALS['IMGESTABLECIMIENTOS_URL'] . $Id .'_E_'. basename($_FILES['imagen']['name']);
		$Usuario= new Establecimiento();
		  }
		//Definicion Pincho
		if($tipo=='p'){
			$Image_Path = $GLOBALS['IMGPINCHO_URL'] . $Id .'_P_'. basename($_FILES['imagen']['name']);
			$Usuario= new Pincho();
		}
		//Definicion Configuracion
		if($tipo=='ci'){
			$Image_Path = $GLOBALS['IMGCONCURSO_URL'] . $Id .'_CI_'. basename($_FILES['imagen']['name']);
			$Usuario= new Configuracion();
		}
		if($tipo=='cl'){
			$Image_Path = $GLOBALS['IMGCONCURSO_URL'] . $Id .'_CL_'. basename($_FILES['imagen']['name']);
			$Usuario= new Configuracion();
		}
		//Almacenamiento imagen
		if(($_FILES['imagen']['type'] == 'image/jpeg') || ($_FILES['imagen']['type'] == 'image/png') || ($_FILES['imagen']['type'] == 'image/jpg')){

			if($_FILES['imagen']['size'] < 2000000){
				var_dump(move_uploaded_file($_FILES["imagen"]["tmp_name"],$_SERVER['DOCUMENT_ROOT'].$Image_Path));
					if($tipo=='cl'){
						$Usuario->setLogo(array(
						'imagen' => $Image_Path));
						return true;
					}else{ 
						$Usuario->setImagen(array(
						'imagen' => $Image_Path,
						'usuario_id' => $Id));
						return true;					
					}
				}

				else{
					addNotificacion("No se pudo insertar la imagen,Tamaño demasiado grande","Danger");
					return false;
				}
			}else{
				addNotificacion("No se pudo insertar la imagen,Formato no soportado","Danger");
				return false;
			}


}
