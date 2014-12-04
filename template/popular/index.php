<div class="jumbotron" id="imgPrincipal">
      <div class="container">
		<img src="<?= $GLOBALS['IMGCONCURSO_URL'].$GLOBALS['conf']->imagen;?>" class="img-responsive" alt="Responsive image">
      </div>
	</div>

<div class="container">
	<div class="row">
	<div class="col-md-4">
	  <h2>Votar pincho<span class="glyphicon glyphicon-cutlery"/></h2>
	  <p>Vote los pinchos consumidos</p>
	  <p><a class="btn btn-default" href="<?php echo $GLOBALS['CONTROLLER_URL'].'popularController.php?action=votar' ?>" role="button">Votar<span class="glyphicon glyphicon-cutlery"/></a></p>
	</div>
	<div class="col-md-4">
	  <h2>¿no sabe que probar? <span class="glyphicon glyphicon-search"/></h2>
	  <p>Aqui puedes buscar que pinchos participan en el concurso</p>
	  <p><a class="btn btn-default" href="<?= '/?action=pinchos' ?>" role="button">Buscar<span class="glyphicon glyphicon-search"/></a></p>
	</div>
	<div class="col-md-4">
	  <h2>Comenta tus pinchos<span class="glyphicon glyphicon-pencil"/></h2>
	  <p>Comente los pinchos y comparta sus opiniones</p>
	  <p><a class="btn btn-default" href="<?php echo $GLOBALS['CONTROLLER_URL'].'popularController.php?action=comentar' ?>" role="button">Comentar<span class="glyphicon glyphicon-search"/></a></p>
	</div>
</div>
