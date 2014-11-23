<?php 

App::import('model','Configuracion');

class AdministradoresController extends AppController {
    public $components = array('Session');
	
	//Añadimos la accion de add(añadir nuevo usuario) en el ambito publico de la aplicación
	public function beforeFilter(){
		//Cambiamos el nombre del modelo por defecto.
		$this->modelClass='Administrador';
		
		parent::beforeFilter();
		//Añadimos la accion add al ambiente publico
		$this->Auth->allow('add');
		if($this->Auth->user() != null and $this->Auth->user()['role'] != 'administrador'){
			//Si un usuario intenta acceder fuera de su ambito, se le cierra la sesion.
			return $this->redirect($this->Auth->logout());
		}
	}
	
	public function index(){

	}
	
	public function configuracion(){
		$config= (new Configuracion())->findById(1);
		$this->set('config',$config['Configuracion']);
	}
}