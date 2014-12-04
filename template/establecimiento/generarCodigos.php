<div class="container">
	<form role="form"  Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'votosController.php';?>"  target="_blank" >
		<h2>Registro Pincho</h2>
		<div class="radio">
		  <label>
			<input type="radio" name="numCodigos" id="optionsRadios1" value="50" checked>
			50 Códigos
		  </label>
		</div>
		<div class="radio">
		  <label>
			<input type="radio" name="numCodigos" id="optionsRadios2" value="100">
			100 Códigos
		  </label>
		</div>
		<div class="radio">
		  <label>
			<input type="radio" name="numCodigos" id="optionsRadios3" value="150">
			150 Códigos
		  </label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit"  value="generarCodigos" name="action" >Editar</button>
	</form>
</div> 