<div class="container">
      <!-- Example row of columns -->
	<form role="form"  Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'mostrarController.php';?>" > 
		<div class="row">
			<div class="col-md-4">
			  <h2>Finalistas </h2>
			  <p>Pinchos finalistas del concurso</p>
			  <p><button class="btn btn-lg btn-primary btn-block" type="submit"  value="finalistas" name="action" >Ver</button>
			</div>
			<div class="col-md-4">
			  <h2>Premiados </h2>
			  <p>Pinchos premiados del concurso</p>
			  <p><button class="btn btn-lg btn-primary btn-block" type="submit"  value="premiados" name="action" >Ver</button>
		   </div>
		  </div>
		</form>
 </div>