 <div class="jumbotron">
      <div class="container">
        <h1>Resultado de la modificacion</h1>
        <p>Se muestra un mensaje si se ha modificado el usuario o no</p>    
      </div>
    </div>

    <div class="container">
      <form class="form-signin" role="form"  Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php';?>" >
		<h2 class="form-signin-heading">MODIFICACION DE DATOS</h2>
		<label for="inputUser" class="sr-only"></label><?php echo "Anterior Nombre : ".$datosUsuario->name ?>
		<input type="text" id="inputName" class="form-control" placeholder="Nuevo nombre del usuario" name="name" required autofocus>
		<label for="inputPhone" class="sr-only"></label><?php echo "Anterior Telefono : ".$datosUsuario->phone ?>
		<input type="text" id="inputPhone" class="form-control" placeholder="Nuevo telefono" name="phone" required>
		<label for="inputUser" class="sr-only"></label><?php echo "Anterior Nombre de Usuario : ".$datosUsuario->user ?>
		<input type="text" id="inputUser" class="form-control" placeholder="Nuevo Nombre de usuario" name="username" required>
		<label for="inputPassword" class="sr-only"></label><?php echo "Anterior Contraseña : ".$datosUsuario->password ?>
		<input type="password" id="inputPassword" class="form-control" placeholder="Nueva Contraseña" name="password" required>
		<label for="inputRole" class="sr-only"></label><?php echo "Anterior Rol : ".$datosUsuario->role ?>
		<input type="hidden" name="usuario_id" value="<?php echo $datosUsuario->usuario_id ?>">
		<select name="role">
		<option value="profesional">Jurado Profesional</option>		
		<option value="establecimiento">Establecimiento</option>
		<option value="popular">Jurado Popular</option>		
		</select>
		<button class="btn btn-lg btn-primary btn-block" type="submit"  value="modify" name="action" >MODIFICAR USUARIO</button>
		
	</form>
    </div>
