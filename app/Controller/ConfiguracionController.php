<?php 
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
class ConfiguracionController extends AppController {
    public $components = array('Session');
	//Añadimos la accion de add(añadir nuevo usuario) en el ambito publico de la aplicación
	public function beforeFilter(){
		//indicamos el nombre del model para este controlador, ya que no usamos el nombre por defecto
		$this->modelClass='Configuracion';
		parent::beforeFilter();
		//Añadimos la accion add al ambiente publico
		$this->Auth->allow('edit');
		if($this->Auth->user() != null and $this->Auth->user()['role'] != 'administrador'){
			//Si un usuario intenta acceder fuera de su ambito, se le cierra la sesion.
			return $this->redirect($this->Auth->logout());
		}
	}
	
	public function edit(){
		new Folder('img/imagenes', true, 0755);
		if($this->request->data['Configuracion']['imagen']['name'] != 0){
			$file = new File($this->request->data['Configuracion']['imagen']['tmp_name']);
			$file->copy('img/imagenes/'.$this->request->data['Configuracion']['imagen']['name']);
		}
		if($this->request->data['Configuracion']['logo']['size'] != 0){
			$file = new File($this->request->data['Configuracion']['logo']['tmp_name']);
			$file->copy('img/imagenes/'.$this->request->data['Configuracion']['imagen']['name']);
		}
		$this->request->data['Configuracion']['imagen'] = 'imagenes/'.$this->request->data['Configuracion']['imagen']['name'];
		$this->request->data['Configuracion']['logo'] = 'imagenes/'.$this->request->data['Configuracion']['logo']['name'];
		if($this->Configuracion->save($this->request->data)){
			$this->redirect(array('controller' => 'administradores' , 'action' => 'configuracion'));
		}
	}
}