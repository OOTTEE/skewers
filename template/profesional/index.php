<div class="container">
      <!-- Example row of columns -->
	<form role="form"  Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'profesionalController.php';?>" > 
		<div class="row">
			<div class="col-md-4">
			  <h2>Votar Finalistas </h2>
			  <p>Vota los pinchos finalistas del concurso</p>
			  <p><button class="btn btn-lg btn-primary btn-block" type="submit"  value="votarFinalistas" name="action" >Votar</button>
			</div>
			<div class="col-md-4">
			  <h2>Votar Premiados </h2>
			  <p>Vota los pinchos premiados del concurso</p>
			  <p><button class="btn btn-lg btn-primary btn-block" type="submit"  value="votarPremiados" name="action" >Votar</button>
		   </div>
		  </div>
		</form>
 </div>