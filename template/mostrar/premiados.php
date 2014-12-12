<div class="container">
      <!-- Example row of columns -->
	<form role="form"  Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'mostrarController.php';?>" > 
		<div class="row">
			<div class="col-md-4">
			  <h2>Concurso Profesional </h2>
			  <p>Pinchos ganadores del concurso profesional</p>
			  <p><button class="btn btn-lg btn-primary btn-block" type="submit"  value="ganaProfesional" name="action" >Ver</button>
			</div>
			<div class="col-md-4">
			  <h2>Concurso Popular</h2>
			  <p>Pinchos ganadores del concurso popular</p>
			  <p><button class="btn btn-lg btn-primary btn-block" type="submit"  value="ganaPopular" name="action" >Ver</button>
		   </div>
		  </div>
		</form>
 </div>