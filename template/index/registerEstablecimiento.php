<div class="container">
	<form  role="form" id="validarPassword" Method="POST" enctype="multipart/form-data" action="<?php echo $GLOBALS['CONTROLLER_URL'].'establecimientoController.php';?>" >
		<h2>Registro de Establecimiento</h2>
		<div class="form-group">
			<label for="inputName" >Nombre Completo</label>
			<input type="text" id="inputName" class="form-control" placeholder="Nombre" name="name"  autofocus>
		</div>
		
		<div class="form-group">
			<label for="inputPhone" >Telefono</label>
			<input type="text" id="inputPhone" class="form-control" placeholder="Phone" name="phone" >
		</div>
		
		<div class="form-group">
			<label for="inputEmail" >Correo Electronico</label>
			<input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" >
		</div>
		
		<div class="form-group">
			<label for="inputUser" >Usuario</label>
			<input type="text" id="inputUser" class="form-control" placeholder="username" name="username" >
		</div>
		
		<div class="form-group">
			<label for="inputPassword" >Contraseña</label>
			<input type="password" id="inputPassword1" class="form-control" placeholder="Password" >
		</div>
		
		<div class="form-group">
			<label for="inputPassword" >Repita la contraseña</label>
			<input type="password" id="inputPassword2" class="form-control" placeholder="Password" >
		</div>
		
		<input type="hidden" id="inputPassword3" class="form-control" placeholder="Password" name="password">
		
		<div class="form-group">
			<label for="web" >Pagina web</label>
			<input type="url" id="inputWeb" class="form-control" placeholder="Web" name="web">
		</div>
		
		<div class="form-group">
			<label for="direccion" >Direccion</label>
			<input type="text" id="inputDireccion" class="form-control" placeholder="Direccion" name="direccion" >
		</div>
		 
		<div class="form-group">
			<label for="horario" >Horario</label>
			<input type="text" id="inputTime" class="form-control" placeholder="Horario" name="horario" >
		</div>
		
		<div class="form-group">
		
		<label for="imagen" >Imagen</label>
			<input type="file" id="imagen" class="form-control" placeholder="Imagen" name="imagen" >
			<p class="help-block">Imagen del Establecimiento (Formatos: jpg, png)</p>
		</div>
		
		<div class="form-group">
			<label for="descripcion" >descripcion</label>
			<textarea id="descripcion" class="form-control"  placeholder="Descripcion" name="descripcion" ></textarea>
		</div>
		
		<button class="btn btn-lg btn-primary btn-block" type="submit"  value="registerEstablecimiento" name="action" >Registrar establecimiento</button>
	</form>
</div>