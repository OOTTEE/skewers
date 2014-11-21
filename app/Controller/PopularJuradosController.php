<?php 
class PopularJuradosController extends AppController {
    public $components = array('Session');
	
	public function add(){
		//Filtro por tipo de formulario POST
        if ($this->request->is('post')) {
			if($this->PopularJurado->Usuario->save($this->request->data)){
					//Ponemos un mensaje de confirmacion 
					$this->Session->setFlash('Usuario Registrado', 'default', array(), 'good');
					//Redirigimos siempre que realizamos un POST, en este caso a /localhost
					$this->redirect(array('controller' => 'Pages', 'action' => 'display'));
			}
			//Ponemos un mensaje de confirmacion 
			$this->Session->setFlash($this->PopularJurado->Usuario->validationErrors['user'][0], 'default', array(), 'bad');
			//Redirigimos siempre que realizamos un POST, en este caso a /localhost
			$this->redirect(array('controller' => 'Pages', 'action' => 'display'));
		}
	}
}