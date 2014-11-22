<?php 
class JuradosProfesionalesController extends AppController {
    public $components = array('Session');
	
	//Añadimos la accion de add(añadir nuevo usuario) en el ambito publico de la aplicación
	public function beforeFilter(){
		//Cambiamos el nombre del modelo por defecto.
		$this->modelClass='JuradoProfesional';
		
		parent::beforeFilter();
		//Añadimos la accion add al ambiente publico
		$this->Auth->allow('add');
		if($this->Auth->user() != null and $this->Auth->user()['role'] != 'profesional'){
			//Si un usuario intenta acceder fuera de su ambito, se le cierra la sesion.
			return $this->redirect($this->Auth->logout());
		}
	}
	
	public function index(){

	}
}