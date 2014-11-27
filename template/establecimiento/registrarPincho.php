<div class="container">
	<form class="form-signin" role="form"  Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'pinchoController.php';?>" >
		<h2 class="form-signin-heading">Registro Pincho</h2>
		<label for="inputNombre" class="sr-only">Nombre del Pincho</label>
		<input type="text" id="inputNombre" class="form-control" placeholder="Nombre del pincho" name="Nombre" required autofocus>
		<label for="inputIngredientes" class="sr-only">Ingredientes</label>
		<input type="text" id="inputPhone" class="form-control" placeholder="Ingredientes" name="ingredientes" required>
		<label for="inputPrecio" class="sr-only">Precio</label>
		<input type="text" id="inputEmail" class="form-control" placeholder="Precio" name="precio" required>
		<label for="inputDescripcion" class="sr-only">Descripción</label>
		<textarea id="inputDescripcion"  class="form-control"  placeholder="Descripcion" name="username" required></textarea>
		<label for="inputPassword" class="sr-only">imagen</label>
		<input type="file" id="inputPassword" class="form-control" placeholder="Password" name="password" >
		<button class="btn btn-lg btn-primary btn-block" type="submit"  value="register" name="action" >Registrar</button>
	</form>
</div> 