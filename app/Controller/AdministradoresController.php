<?php 
class AdministradoresController extends AppController {
    public $components = array('Session');
	
	//A�adimos la accion de add(a�adir nuevo usuario) en el ambito publico de la aplicaci�n
	public function beforeFilter(){
		//Cambiamos el nombre del modelo por defecto.
		$this->modelClass='Administrador';
		
		parent::beforeFilter();
		//A�adimos la accion add al ambiente publico
		$this->Auth->allow('add');
		if($this->Auth->user() != null and $this->Auth->user()['role'] != 'administrador'){
			//Si un usuario intenta acceder fuera de su ambito, se le cierra la sesion.
			return $this->redirect($this->Auth->logout());
		}
	}
	
	public function index(){

	}
}