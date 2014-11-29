<div class="container">
	<form role="form"  Method="POST" action="<?= $GLOBALS['CONTROLLER_URL'].'configuracionController.php';?>" >
		<h2>Configurar Web</h2>
		
		<div class="form-group">
			<label for="inputNombre" class="sr-only">Nombre del Concurso</label>
			<input type="text" id="inputNombre" class="form-control" placeholder="Nombre del Concurso" name="nombreConcurso" value="<?= $conf->nombre ?>" required autofocus>
		</div>
		
		<div class="form-group">
			<label for="inputFechaInicio" class="sr-only">Fecha de Inicio</label>
			<input type="date" id="inputFechaInicio" class="form-control" placeholder="Fecha de Inicio" name="fechaInicio" value="<?= $conf->f_inicio ?>" required>			
		</div>
		
		<div class="form-group">
			<label for="inputFechaFin" class="sr-only">Fecha de Fin</label>
			<input type="date" id="inputFechaFin" class="form-control" placeholder="Fecha de Fin" name="fechaFin" value="<?= $conf->f_fin ?>" required>
		</div>
		<div class="input-group">
			<label>
				<input type="checkbox" name="votacionesFinalistas" value="<?= $conf->votacionesFinalistas?>"  <?php if( $conf->votacionesFinalistas == 1){ echo 'checked' ;}?> >
				
				Activar Votaciones Finalistas
			</label>
		</div>
		<div class="input-group">
			<label>
				<input type="checkbox" name="votacionesGanadores" value="<?= $conf->votacionesFinalistas?>"  <?php if( $conf->votacionesGanadores == 1){ echo 'checked' ;}?> >
				
				Activar Votaciones Ganadores
			</label>
		</div>
		<div class="input-group">
			<label>
				<input type="checkbox" name="votacionesPopulares" value="<?= $conf->votacionesPopulares?>"  <?php if( $conf->votacionesPopulares == 1){ echo 'checked' ;}?> >
				
				Activar Votaciones Populares
			</label>
		</div>
		
		<div class="form-group">
			<label for="inputDescripcion" class="sr-only">Descripción</label>
			<textarea id="inputDescripcion"  class="form-control"  placeholder="Descripcion" name="descripcionConcurso" > <?= $conf->descripcion ?></textarea>			
		</div>
		
		<div class="form-group">
			<label for="inputLogo">Logo</label>
			<input type="file" id="inputLogo" class="form-control"  name="logoConcurso" >
			<p class="help-block">Logo del concurso(Formatos: jpg, png)</p>
		</div>
		
		<div class="form-group">
			<label for="inputImagen">Imagen del Concurso</label>
			<input type="file" id="inputImagen"  class="form-control" name="imagenConcurso" >
			<p class="help-block">Imagen de portada del concurso (Formatos: jpg, png)</p>
		</div>
		
		<button class="btn btn-lg btn-primary btn-block" type="submit"  value="editarConfiguracion" name="action" >Editar <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
	</form>
</div> 