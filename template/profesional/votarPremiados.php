 <div class="jumbotron">
      <div class="container">
        <h1>Votacion de los pinchos premiados</h1>
        <p>Seleccione el pincho que quiere votar.</p>    
      </div>
    </div>

    <div class="container">
	
		<?php foreach($Pinchos as $pincho):?>
			<a href="<?php echo $GLOBALS['CONTROLLER_URL'].'profesionalController.php?action=mostrarDatosPinchoPremiados&idPincho='.$pincho['pincho_id']?>">
				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<?= $pincho['nombre'] ?> <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"/>
						</div>	
					</div>
				</div>
			</a>
		<?php endforeach; ?>

    </div>
