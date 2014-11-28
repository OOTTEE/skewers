<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php');
class Configuracion extends Model{
	public $logo;
	public $nombre;
	public $descripcion;
	public $imagen;
	public $f_inicio;
	public $f_fin;
	private $id;
	
	function __construct(){
       parent::__construct();
	   $this->id=1;
	}
	
	/**
	*	Se recupera la informacion de configuracion de la pagina web, se debuelve el mismo objeto actualizado.
	*/
	public function get(){
		$sentencia = $GLOBALS['DB']->prepare('SELECT *
								FROM configuracion
								WHERE id = ? ');
		$sentencia->execute(array($this->id));
		$resul=$sentencia->fetchall()[0];
		
		$this->logo=$resul['logo'];
		$this->nombre=$resul['nombre'];
		$this->descripcion=$resul['descripcion'];
		$this->imagen=$resul['imagen'];
		$this->f_inicio=$resul['f_inicio'];
		$this->f_fin=$resul['f_fin'];
		
		return $this;
	}
	
	
	/*
	*	Esta funcion modifica todos los atributos de la configuracion de la pagina
	*	Es necesario pasar todos los parametros
	*/
	public function set($params){
		if(isset($params['logo']) AND isset($params['nombre']) AND isset($params['descripcion']) AND
		   isset($params['imagen']) AND isset($params['f_inicio']) AND isset($params['f_fin'])){
			$sentencia = $GLOBALS['DB']->prepare("UPDATE `configuracion` SET `logo` = :logo,
																			`nombre` = :nombre, 
																			`descripcion` = :descripcion, 
																			`imagen` = :imagen, 
																			`f_inicio` = :f_inicio, 
																			`f_fin` = :f_fin
																		WHERE `id` = :id ");

			$argumentos = array(':logo' => $params['logo'],
								':nombre' => $params['nombre'],
								':descripcion' => $params['descripcion'],
								':imagen' => $params['imagen'],
								':f_inicio' => $params['f_inicio'],
								':f_fin' => $params['f_fin'],
								':id' => $this->id);
			$sentencia->execute($argumentos);
			
			return true;
		}else{
			return false;
		}
	}
	
	
	
}