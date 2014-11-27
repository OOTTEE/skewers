<div class="container">
	<form class="form-signin" role="form"  Method="POST" enctype="multipart/form-data" action="<?php echo $CONTROLLER_URL.'establecimientoController.php';?>" >
		<h2 class="form-signin-heading">Registro de Establecimiento</h2>
		<label for="inputName" class="sr-only">Nombre Completo</label>
		<input type="text" id="inputName" class="form-control" placeholder="Nombre" name="name" required autofocus>
		<label for="inputPhone" class="sr-only">Telefono</label>
		<input type="text" id="inputPhone" class="form-control" placeholder="Phone" name="phone" required>
		<label for="inputEmail" class="sr-only">Correo Electronico</label>
		<input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required>
		<label for="inputUser" class="sr-only">Usuario</label>
		<input type="text" id="inputUser" class="form-control" placeholder="username" name="username" required>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
		
		<label for="web" class="sr-only">Pagina web</label>
		<input type="url" id="inputWeb" class="form-control" placeholder="Web" name="web">
		<label for="direccion" class="sr-only">Direccion</label>
		<input type="text" id="inputDireccion" class="form-control" placeholder="Direccion" name="direccion" required>
		<label for="horario" class="sr-only">Horario</label>
		<input type="text" id="inputTime" class="form-control" placeholder="Horario" name="horario" required>
		
		<label for="imagen" class="sr-only">Imagen</label>
		<input type="file" id="imagen" class="form-control" placeholder="Imagen" name="imagen" required>
		<label for="descripcion" class="sr-only">descripcion</label>
		<textarea id="descripcion" class="form-control"  placeholder="Descripcion" name="descripcion" required>
			
		</textarea>
		
		<button class="btn btn-lg btn-primary btn-block" type="submit"  value="registerEstablecimiento" name="action" >Registrar establecimiento</button>
	</form>
</div>