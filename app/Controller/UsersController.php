<?php 
class UsersController extends AppController {
    public $components = array('Session');
	
	public function index(){
		switch ($this->Auth->user()[role]) {
			case 'popular':
				return $this->redirect(array('controller' => 'JuradosPopulares', 'action' => 'index'));
				break;
			case 'establecimiento':
				return $this->redirect(array('controller' => 'Establecimientos', 'action' => 'index'));
				break;
			case 'profesional':
				return $this->redirect(array('controller' => 'JuradosProfesionales', 'action' => 'index'));
				break;
			case 'administrador':
				return $this->redirect(array('controller' => 'Administradores', 'action' => 'index'));
				break;
			default:
				return $this->redirect($this->Auth->logout());
		}
	}

	public function login(){
		if ($this->request->is('post')) {
			//$this->Auth->authorize = true;
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			}
			$this->Session->setFlash(__('Invalid username or password, try again'));
		}
	}
	
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
}