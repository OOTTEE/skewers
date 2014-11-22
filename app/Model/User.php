<?php 
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public $validate = array(
		'name' => array(
			'rule' =>'/[a-zA-Z0-9 ]*/i',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Campo Vacio'
		),
        'password' => array(
			'rule' => array('minLength', 4),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'minimo 8 caracteres/digitos'
        ),
		'username' => array(
			'requiredIsUnique' => array(
				'rule' => 'isUnique',
				'message' => 'El nombre de usuario se encuentra en uso.'
			),
			'requiredAlphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'required' => true,
				'message' => 'El nombre de usuario solo puede contener letras y caracteres'
			)
		)
	);
	
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
		}
		return true;
	}
}