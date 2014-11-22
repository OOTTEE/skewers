<?php 
class EstablecimientosController extends AppController {
    public $components = array('Session');
	
	//Añadimos la accion de add(añadir nuevo usuario) en el ambito publico de la aplicación
	public function beforeFilter(){
		parent::beforeFilter();
		//Añadimos la accion add al ambiente publico
		$this->Auth->allow('add');
		if($this->Auth->user() != null and $this->Auth->user()['role'] != 'establecimiento'){
			//Si un usuario intenta acceder fuera de su ambito, se le cierra la sesion.
			return $this->redirect($this->Auth->logout());
		}
	}
	/**	
	*	Añadir nuevo establecimiento.
	*/
	public function add(){
		//Filtro por tipo de formulario POST.
        if ($this->request->is('post')) {
			//Intentamos guardar el nuevo usuario
			$this->request->data['User']['role'] = "establecimiento";
			debug($this->request->data);
			if($this->Establecimiento->User->save($this->request->data)){
				//Tambien agregamos el establecimiento en la tabla de usuarios
				if($this->Establecimiento->save(array('Establecimiento' => array('usuario_id' => $this->Establecimiento->User->id, ' ', ' ',' ')))){					
					//Ponemos un mensaje de confirmacion 
					$this->Session->setFlash('Establecimiento Registrado', 'default', array(), 'good');
					//Redirigimos siempre que realizamos un POST, en este caso a /localhost
					$this->redirect(array('controller' => 'Pages', 'action' => 'display'));
				}	
			}
			//Ponemos un mensaje de error 
			
			$this->Session->setFlash("No se pudo crear el usuario", 'default', array(), 'bad');
			//Redirigimos siempre que realizamos un POST, en este caso a /localhost
			//$this->redirect(array('controller' => 'Pages', 'action' => 'display'));
        }
		
	}
}