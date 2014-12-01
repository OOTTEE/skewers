<div class="container">
	<form role="form"  Method="POST" action="<?php echo $CONTROLLER_URL.'usersController.php';?>" >
		<h2>Registro</h2>
		<div class="form-group">
			<label for="inputName" >Nombre Completo</label>
			<input type="text" id="inputName" class="form-control" placeholder="Nombre" name="name" required autofocus>
		</div>
		
		<div class="form-group">
			<label for="inputPhone" >Telefono</label>
			<input type="text" id="inputPhone" class="form-control" placeholder="Phone" name="phone" required>
		</div>
		
		<div class="form-group">
			<label for="inputEmail" >Correo Electronico</label>
			<input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required>
		</div>
		
		<div class="form-group">
			<label for="inputUser" >Usuario</label>
			<input type="text" id="inputUser" class="form-control" placeholder="username" name="username" required>
		</div>
		
		<div class="form-group">
			<label for="inputPassword1" >Contraseña</label>
			<input type="password" id="inputPassword1" class="form-control" placeholder="Password" required>
		</div>
		<div class="form-group">
			<label for="inputPassword2" >Repita la contraseña</label>
			<input type="password" id="inputPassword2" class="form-control" placeholder="Password" required>
		</div>
		<input type="hidden" id="inputPassword3" name="password" >
		<button class="btn btn-lg btn-primary btn-block" type="submit"  value="register" name="action" >Registrar</button>
	</form>
</div> 