<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php');
class Pincho extends Model{
	public pincho_id;
	public usuario_id;
	public indredientes;
	public nombre;
	public precio;
	public finalista;
	public imagen;
	public descripcion;
	public validado;
	
	function getPincho($id){
	
	}
	
	function register(){
		$sentencia = $GLOBALS['DB']->prepare("INSERT INTO `pinchos`(`usuario_id`, `ingredientes`, `nombre`, `precio`, `finalista`, `imagen`, `descripcion`, `validado`) 
												VALUES (:usuario_id,
														:ingredientes,
														:nombre,
														:precio,
														:finalista,
														:imagen,
														:descripcion,
														:validado)");

		$sentencia->execute(array(':usuario_id' => $params['usuario_id'],
								':ingredientes' => $params['ingredientes'],
								':nombre' => $params['nombre'],
								':precio' => $params['precio'],
								':finalista' => $params['finalista'],
								':imagen' => $params['imagen'],
								':descripcion' => $params['descripcion'],
								':validado' => 0));
	
	}
	

}