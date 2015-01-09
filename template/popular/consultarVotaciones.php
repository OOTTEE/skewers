    <div class="jumbotron">
      <div class="container">
        <h1>Consultar Votaciones</h1>
        <p>Se muestran los pinchos votados, pulse en el para mostrar informacion.</p>    
      </div>
    </div>

    <div class="container">
		<h2>Pinchos Votados</h2>
		<?php foreach($pinchos as $row):?>
			<a href="<?php echo $GLOBALS['CONTROLLER_URL'].'popularController.php?action=realizarConsultaVotacion&idPincho='.$row['pincho_id']?>">
				<div class="col-md-3 text-center">
				<h5 class="pinchoTitleList" ><?= $row['nombre'] ?><?= (isset($row['votado'])) ? '<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"/>' : '' ?></h5>
				<div class="pincho" height="120">
					<img src="<?= (isset($row['imagen']) AND $row['imagen']!='' AND url_exists($row['imagen']) )? $row['imagen'] : $GLOBALS['IMGPINCHO_URL'].'no_imagen.png'  ?>"  height="120" width="120" class="img-responsive" style="margin: 0px auto;">
				</div>
				</div>
			</div>
			</a>
		<?php endforeach; ?>

    </div>



