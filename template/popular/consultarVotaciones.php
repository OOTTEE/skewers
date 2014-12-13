    <div class="jumbotron">
      <div class="container">
        <h1>Consultar Votaciones</h1>
        <p>Se muestran los pinchos votados, pulse en el para mostrar informacion.</p>    
      </div>
    </div>

    <div class="container">
		<h2>Pinchos Votados</h2>
		<?php foreach($pinchos as $pincho):?>
			<a href="<?php echo $GLOBALS['CONTROLLER_URL'].'popularController.php?action=realizarConsultaVotacion&idPincho='.$pincho['pincho_id']?>">
				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<?= $pincho['nombre'] ?> <?= (isset($pincho['votado'])) ? '<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"/>' : '' ?>
						</div>	
					</div>
				</div>
			</a>
		<?php endforeach; ?>

    </div>
