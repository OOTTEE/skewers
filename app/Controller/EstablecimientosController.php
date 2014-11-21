<?php 
class EstablecimientosController extends AppController {
    public $components = array('Session');
	
	/**	
	*	Añadir nuevo establecimiento.
	*/
	public function add(){
		//Filtro por tipo de formulario POST.
        if ($this->request->is('post')) {
			//Intentamos guardar el nuevo usuario
			//$this->request->data['Usuario']['role'] = "establecimiento";
			debug($this->request->data);
			if($this->Establecimiento->Usuario->save($this->request->data)){
				//Tambien agregamos el establecimiento en la tabla de usuarios
				if($this->Establecimiento->save(array('Establecimiento' => array('usuario_id' => $this->Establecimiento->Usuario->id, ' ', ' ',' ')))){					
					//Ponemos un mensaje de confirmacion 
					$this->Session->setFlash('Establecimiento Registrado', 'default', array(), 'good');
					//Redirigimos siempre que realizamos un POST, en este caso a /localhost
					$this->redirect(array('controller' => 'Pages', 'action' => 'display'));
				}	
			}
			//Ponemos un mensaje de error 
			
			$this->Session->setFlash("No se pudo crear el usuario", 'default', array(), 'bad');
			//Redirigimos siempre que realizamos un POST, en este caso a /localhost
			$this->redirect(array('controller' => 'Pages', 'action' => 'display'));
        }
		
	}
}