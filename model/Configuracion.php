<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php');
class Configuracion extends Model{
	public $logo;
	public $nombre;
	public $descripcion;
	public $imagen;
	public $f_inicio;
	public $f_fin;
	public $votacionesFinalistas ;
	public $votacionesGanadores ;
	public $votacionesPopulares ;
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
		$this->votacionesFinalistas=$resul['votacionesFinalistas'];
		$this->votacionesGanadores=$resul['votacionesGanadores'];
		$this->votacionesPopulares=$resul['votacionesPopulares'];
		
		return $this;
	}
	
	
	/*
	*	Esta funcion modifica todos los atributos de la configuracion de la pagina
	*	Es necesario pasar todos los parametros
	*/
	public function set($params){
		$sentencia = $GLOBALS['DB']->prepare("UPDATE `configuracion` SET `nombre` = :nombre, 
																		`descripcion` = :descripcion, 
																		`f_inicio` = :f_inicio, 
																		`f_fin` = :f_fin,
																		`votacionesFinalistas` = :votacionesFinalistas,
																		`votacionesGanadores` = :votacionesGanadores,
																		`votacionesPopulares` = :votacionesPopulares ".
																		(isset($params['imagen'])? ", `imagen` = :imagen ": '').
																		(isset($params['logo'])? ", `logo` = :logo " : '').
																	"WHERE `id` = :id ");

		$argumentos = array(':nombre' => $params['nombre'],
							':descripcion' => $params['descripcion'],
							':f_inicio' => $params['f_inicio'],
							':f_fin' => $params['f_fin'],
							':votacionesFinalistas' => $params['votacionesFinalistas'],
							':votacionesGanadores' => $params['votacionesGanadores'],
							':votacionesPopulares' => $params['votacionesPopulares'],
							':id' => $this->id);
		if(isset($params['imagen'])){
			$argumentos[':imagen'] = $params['imagen'];
		}
		if(isset($params['logo'])){
			$argumentos[':logo'] = $params['logo'];
		}
		$sentencia->execute($argumentos);

		if($sentencia->rowCount() > 0)
			return true;
		else
			return false;

	}
	
	
	
}