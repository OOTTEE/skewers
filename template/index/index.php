	<div class="jumbotron" id="imgPrincipal">
      <div class="container">
		<img src="<?= $GLOBALS['IMGCONCURSO_URL'].$GLOBALS['conf']->imagen;?>" class="img-responsive" alt="Responsive image">
      </div>
	</div>
    

    <div class="container">
      <hr>
	  
				<?= $GLOBALS['conf']->descripcion;?>
	  
      <hr>
	  
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Restaurantes <span class="glyphicon glyphicon-cutlery"/></h2>
          <p>Visete los Restaurantes inscritos</p>
          <p><a class="btn btn-default" href="/?action=restaurantes" role="button">Restaurantes <span class="glyphicon glyphicon-cutlery"/></a></p>
        </div>
        <div class="col-md-4">
          <h2>Pinchos <span class="glyphicon glyphicon-search"/></h2>
          <p>Vea los deliciosos pinchos</p>
          <p><a class="btn btn-default" href="/?action=pinchos" role="button">Pinchos <span class="glyphicon glyphicon-search"/></a></p>
       </div>
        <div class="col-md-4">
          <h2>Finalistas<span class="glyphicon glyphicon-tower"/></h2>
          <p>Finalistas y ganadores del concurso</p>
          <p><a class="btn btn-default" href="/?action=finalistas" role="button">Finalistas <span class="glyphicon glyphicon-tower"/></a></p>
        </div>
      </div>

      <hr>
	  
    </div>