    <div class="jumbotron">
      <div class="container">
        <h1>Formulario de Alta de Jurado Profesional</h1>
        <p>Rellene los campos para dar de alta un nuevo miembro del Jurado Profesional</p>    
      </div>
    </div>

      <form Method="POST" id="validarPassword"  role="form"  Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php';?>" >
   <div class="container">
		<h2 class="form-signin-heading">Registro de Jurado Profesional</h2>
		<div class="form-group">
			<label for="inputUser" class="sr-only">Nombre Completo</label>
			<input type="text" id="inputName" class="form-control" placeholder="Nombre del miembro del Jurado Profesional" name="name" required autofocus>
		</div>
		
		<div class="form-group">
		<label for="inputPhone" class="sr-only">Telefono</label>
		<input type="text" id="inputPhone" class="form-control" placeholder="Telefono" name="phone" required>
		</div>
		
		<div class="form-group">
		<label for="inputEmail" class="sr-only">Correo Electronico</label>
		<input type="email" id="inputEmail" class="form-control" placeholder="Correo electronico" name="email" required>
		</div>
		
		<div class="form-group">
		<label for="inputUser" class="sr-only">Usuario</label>
		<input type="text" id="inputUser" class="form-control" placeholder="Nombre de usuario" name="username" required>
		</div>
		
		<div class="form-group">
		<label for="inputPassword1" class="sr-only">Repita Contraseña</label>
		<input type="password" id="inputPassword1" class="form-control" placeholder="Contraseña"required>
		</div>	
		<div class="form-group">
		<label for="inputPassword2" class="sr-only">Repita Contraseña</label>
		<input type="password" id="inputPassword2" class="form-control" placeholder="Repita Contraseña" required>
		</div>	
		<input type="hidden" id="inputPassword3" class="form-control" placeholder="Contraseña" name="password" >
		<button class="btn btn-lg btn-primary btn-block"  type="submit"  value="register" name="action" >Alta Jurado Profesional</button>
	</form>
    </div>
