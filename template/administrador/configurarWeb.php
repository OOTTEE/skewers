<div class="container">
	<form role="form"  Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'pinchoController.php';?>" >
		<h2 class="form-signin-heading">Configurar Web</h2>
		
		
		<div class="form-group">
			<label for="inputNombre" class="sr-only">Nombre del Concurso</label>
			<input type="text" id="inputNombre" class="form-control" placeholder="Nombre del Concurso" name="nombreConcurso" required autofocus>
		</div>
		
		<div class="form-group">
			<label for="inputFechaInicio" class="sr-only">Fecha de Inicio</label>
			<input type="text" id="inputFechaInicio" class="form-control" placeholder="Fecha de Inicio" name="fechaInicio" required>			
		</div>
		
		<div class="form-group">
			<label for="inputFechaFin" class="sr-only">Fecha de Fin</label>
			<input type="text" id="inputFechaFin" class="form-control" placeholder="Fecha de Fin" name="fechaFin" required>
		</div>
		
		<div class="form-group">
			<label for="inputDescripcion" class="sr-only">Descripción</label>
			<textarea id="inputDescripcion"  class="form-control"  placeholder="Descripcion" name="descripcionConcurso" required></textarea>			
		</div>
		
		<div class="form-group">
			<label for="inputLogo">Logo</label>
			<input type="file" id="inputLogo" name="logoConcurso" >
			<p class="help-block">Logo del concurso(Formatos: jpg, png)</p>
		</div>
		
		<div class="form-group">
			<label for="inputImagen">Imagen del Concurso</label>
			<input type="file" id="inputImagen" name="imagenConcurso" >
			<p class="help-block">Imagen de portada del concurso (Formatos: jpg, png)</p>
		</div>
		
		<button class="btn btn-lg btn-primary btn-block" type="submit"  value="editarConcurso" name="action" >Editar <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
	</form>
</div> 