<div class="container">
	<form class="form-signin" role="form"  Method="POST" action="<?php echo $CONTROLLER_URL.'usersController.php';?>" >
		<h2 class="form-signin-heading">Registro</h2>
		<label for="inputUser" class="sr-only">Nombre Completo</label>
		<input type="text" id="inputName" class="form-control" placeholder="Nombre" name="name" required autofocus>
		<label for="inputPhone" class="sr-only">Telefono</label>
		<input type="text" id="inputPhone" class="form-control" placeholder="Phone" name="phone" required>
		<label for="inputEmail" class="sr-only">Correo Electronico</label>
		<input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required>
		<label for="inputUser" class="sr-only">Usuario</label>
		<input type="text" id="inputUser" class="form-control" placeholder="username" name="username" required>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
		<div class="checkbox">
		  <label>
			<input type="checkbox" name="type" value="establecimiento"> Establecimiento
		  </label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit"  value="register" name="action" >Registrar</button>
	</form>
</div> 