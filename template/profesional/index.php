<div class="container">
 	<div class="jumbotron" id="imgPrincipal">
      <div class="container">
		<!--img src="<?= $GLOBALS['IMGCONCURSO_URL'].$GLOBALS['conf']->imagen;?>" class="img-responsive" alt="Responsive image"-->
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-4">
			  <h2>Votar Finalistas </h2>
			  <p>Vota los pinchos finalistas del concurso</p>
			  <a><button class="btn btn-lg btn-primary btn-block" type="button"  <?= $GLOBALS['CONTROLLER_URL'].'profesionalController.php?action=votarPremiados';?> >Votar</button></a>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-4">
			  <h2>Votar Premiados </h2>
			  <p>Vota los pinchos premiados del concurso</p>
			  <a><button class="btn btn-lg btn-primary btn-block" type="button"  href=<?= $GLOBALS['CONTROLLER_URL'].'profesionalController.php?action=votarPremiados';?> >Votar</button></a>
		   </div>
		 </div>
      </div>
	</div>
    

    <div class="container">
      <hr>
				<?= $GLOBALS['conf']->descripcion;?>
      <hr>
	</div>
	  
 
	<?php include_once($GLOBALS['LAYOUT_PATH'].'bottonMenu.php'); ?>