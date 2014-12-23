	<div class="jumbotron" id="imgPrincipal">
      <div class="container">
		<img src="<?= $GLOBALS['IMGCONCURSO_URL'].$GLOBALS['conf']->imagen;?>" class="img-responsive" alt="Responsive image">
      </div>
	</div>


    <div class="container">
      <hr>
				<?= $GLOBALS['conf']->descripcion;?>
      <hr>
	</div>


	<?php include_once($GLOBALS['LAYOUT_PATH'].'bottonMenu.php'); ?>
