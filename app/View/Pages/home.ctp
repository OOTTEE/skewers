<h2>Skewers</h2>
<?php
echo $this->Session->flash('good');
echo $this->Session->flash('bad');
?>
<div id="login"  style="float:left; width: 33%;">
	<h3>Loguin</h3>
	<?php  
		echo $this->Form->create('User', array('action' => 'login'));
			echo $this->Form->input('User.username',	array('label' => 'Nombre de usuario'));	
			echo $this->Form->input('User.password',	array('label' => 'Contraseña'));
		echo $this->Form->end('Login');	
	?>
</div>
<div id="register"  style="float:left; width: 33%;">
	<h3>Registrar Jurado Popular</h3>
	<?php  
		//Creamos un formulario, en este caso POST, 
		//como creamos un usuario indicamos el nombre del modelo Usuario, y la accion(funcion del controlador a utilizar) add()
		echo $this->Form->create('JuradosPopulares', array('action' => 'add'));
			//inputText con label, el nombre del campo debe ser el mismo que el nombre del campo en la BD
			echo $this->Form->input('User.name',array('label' => 'Nombre completo'));
			echo $this->Form->input('User.username',array('label' => 'Nombre de usuario'));
			echo $this->Form->input('User.password',	array('label' => 'Contraseña'));
			//cerramos el form con un submit con el texto Register
		echo $this->Form->end('Registrarse');	
	?>
</div>
<div id="register" style="float:left; width: 33%;">
	<h3>Registrar Establecimiento</h3>
	<?php  
		echo $this->Form->create('Establecimiento', array('action' => 'add'));
			echo $this->Form->input('User.name',	array('label' => 'Nombre completo'));
			echo $this->Form->input('User.username',	array('label' => 'Nombre de usuario'));
			echo $this->Form->input('User.password',	array('label' => 'Contraseña'));
		echo $this->Form->end('Registrarse');	
	?>
</div>