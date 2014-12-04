 <div class="jumbotron">
      <div class="container">
        <h1>Editar usuario</h1>
        <p>Modfique el usuario y guardelo</p>    
      </div>
    </div>

    <div class="container">
      <form class="form-signin" id="validarPassword" role="form"  Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php';?>" >
		<h2 class="form-signin-heading">MODIFICACION DE DATOS</h2>
		<label for="inputUser" class="sr-only">Anterior Nombre</label>
		<input type="text" id="inputName" class="form-control" placeholder="Nuevo nombre del usuario" name="name" value="<?= $datosUsuario->name ?>" required autofocus>
		<label for="inputPhone" class="sr-only">Telefono</label>
		<input type="text" id="inputPhone" class="form-control" placeholder="Nuevo telefono" name="phone" value="<?= $datosUsuario->phone ?>" required>
		<label for="inputUser" class="sr-only">Nombre de Usuario</label>
		<input type="text" id="inputUser" class="form-control" placeholder="Nuevo Nombre de usuario" name="username" value="<?= $datosUsuario->user ?>" required>
		<label for="inputPassword" class="sr-only">Nueva contraseña</label>
		<input type="password" id="inputPassword1" class="form-control" placeholder="Nueva Contraseña" required>
		<label for="inputPassword" class="sr-only">Repita contraseña</label>
		<input type="password" id="inputPassword2" class="form-control" placeholder="Repita contraseña" required>
		<input type="hidden" id="inputPassword3" name="password">
		<label for="inputRole" class="sr-only">Rol: <?= $datosUsuario->role ?></label>
		<input type="hidden" name="usuario_id" value="<?php echo $datosUsuario->usuario_id ?>">
		<select name="role">
		<option value="profesional">Jurado Profesional</option>		
		<option value="establecimiento">Establecimiento</option>
		<option value="popular">Jurado Popular</option>		
		</select>
		<button class="btn btn-lg btn-primary btn-block" type="submit"  value="modify" name="action" >MODIFICAR USUARIO</button>
		
	</form>	
    </div>
	<script>
		
	</script>
