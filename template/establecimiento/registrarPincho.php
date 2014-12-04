<div class="container">
	<form role="form"  Method="POST" enctype="multipart/form-data"   action="<?php echo $GLOBALS['CONTROLLER_URL'].'pinchoController.php';?>" >
		<h2>Registro Pincho</h2>
		<div class="form-group">
			<label for="inputNombre">Nombre del Pincho</label>
			<input type="text" id="inputNombre" class="form-control" placeholder="Nombre del pincho" name="nombrePincho" required autofocus>
		</div>
		
		<div class="form-group">
			<label for="inputIngredientes" >Ingredientes</label>
			<input type="text" id="inputPhone" class="form-control" placeholder="Ingredientes" name="ingredientes" required>
		</div>
		
		<div class="form-group">
			<label for="inputPrecio" >Precio</label>
			<input type="text" id="inputEmail" class="form-control" placeholder="Precio" name="precio" required>
		</div>
		
		<div class="form-group">
			<label for="inputDescripcion" >Descripción</label>
			<textarea id="inputDescripcion"  class="form-control"  placeholder="Descripcion" name="descripcionPincho" required></textarea>	
		</div>
		
		<div class="form-group">
			<label for="inputPassword">imagen</label>
			<input type="file" id="inputPassword" name="imagen" >
			<p class="help-block">Imagen del Pincho (Formatos: jpg, png, jpeg)</p>
		</div>
		
		<button class="btn btn-lg btn-primary btn-block" type="submit"  value="registrarPincho" name="action" >Registrar</button>
	</form>
</div> 