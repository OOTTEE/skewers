<?php 
class JuradosPopularesController extends AppController {
    public $components = array('Session');
	
	//Añadimos la accion de add(añadir nuevo usuario) en el ambito publico de la aplicación
	public function beforeFilter(){
		//indicamos el nombre del model para este controlador, ya que no usamos el nombre por defecto
		$this->modelClass='JuradoPopular';
		parent::beforeFilter();
		//Añadimos la accion add al ambiente publico
		$this->Auth->allow('add');
		if($this->Auth->user() != null and $this->Auth->user()['role'] != 'popular'){
			//Si un usuario intenta acceder fuera de su ambito, se le cierra la sesion.
			return $this->redirect($this->Auth->logout());
		}
	}
	
	public function index(){
	}
	
	public function add(){
		//Filtro por tipo de formulario POST
        if ($this->request->is('post')) {
			$this->request->data['User']['role'] = "popular";
			if($this->JuradoPopular->User->save($this->request->data)){
					//Ponemos un mensaje de confirmacion 
					$this->Session->setFlash('Usuario Registrado', 'default', array(), 'good');
					//Redirigimos siempre que realizamos un POST, en este caso a /localhost
					$this->redirect(array('controller' => 'Pages', 'action' => 'display'));
			}
			//Ponemos un mensaje de confirmacion 
			$this->Session->setFlash($this->JuradoPopular->User->validationErrors['user'][0], 'default', array(), 'bad');
			//Redirigimos siempre que realizamos un POST, en este caso a /localhost
			$this->redirect(array('controller' => 'Pages', 'action' => 'display'));
		}
	}
}