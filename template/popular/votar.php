	<div class="jumbotron" id="imgPrincipal">
      <div class="container">
		<h1>Votar</h1>
      </div>
	</div>
    

    <div class="container">
      <hr>
		Por favor introduzca 3 codigos de voto diferentes y seleccione 1 como favorito.
      <hr>
	</div>
	  
    <div class="container">
		  <form role="form" id="validarPassword" Method="POST" action="<?= $GLOBALS['CONTROLLER_URL'].'votosController.php' ?>" >
			<h2>Registro</h2>
			<div class="form-group">
				<label for="inputCod1" >Código 1: </label>
				<div class="input-group">
				  <span class="input-group-addon">
					<input name="votado"  type="radio" value="1">
				  </span>
				<input type="text" id="inputCod1" class="form-control" placeholder="Código 1" name="codigo_1" required autofocus>
				</div>
			</div>
			<div class="form-group">
				<label for="inputCod2" >Código 2: </label>
				<div class="input-group">
				  <span class="input-group-addon">
					<input name="votado"  type="radio" value="2">
				  </span>
				<input type="text" id="inputCod2" class="form-control" placeholder="Código 2" name="codigo_2" required>
				</div>
			</div>
			<div class="form-group">
				<label for="inputCod3" >Código 3: </label>
				<div class="input-group">
				  <span class="input-group-addon">
					<input name="votado"  type="radio" value="3">
				  </span>
				<input type="text" id="inputCod3" class="form-control" placeholder="Código 3" name="codigo_3" required>
				</div>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit"  value="registrarVotoPopular" name="action" >Registrar</button>
		</form>

      <hr>
	  
    </div>