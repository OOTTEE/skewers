    <div class="jumbotron">
      <div class="container">
        <h1>Formulario de Alta de Jurado Profesional</h1>
        <p>Rellene los campos para dar de alta un nuevo miembro del Jurado Profesional</p>    
      </div>
    </div>

   <div class="container">
      <form class="form-signin" role="form"  Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php';?>" >
		<h2 class="form-signin-heading">Registro de Jurado Profesional</h2>
		<label for="inputUser" class="sr-only">Nombre Completo</label>
		<input type="text" id="inputName" class="form-control" placeholder="Nombre del miembro del Jurado Profesional" name="name" required autofocus>
		<label for="inputPhone" class="sr-only">Telefono</label>
		<input type="text" id="inputPhone" class="form-control" placeholder="Telefono" name="phone" required>
		<label for="inputEmail" class="sr-only">Correo Electronico</label>
		<input type="email" id="inputEmail" class="form-control" placeholder="Correo electronico" name="email" required>
		<label for="inputUser" class="sr-only">Usuario</label>
		<input type="text" id="inputUser" class="form-control" placeholder="Nombre de usuario" name="username" required>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" name="password" required>
		
		<button class="btn btn-lg btn-primary btn-block" type="submit"  value="register" name="action" >Alta Jurado Profesional</button>
	</form>
    </div>
