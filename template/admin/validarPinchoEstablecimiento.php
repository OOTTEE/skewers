    <div class="jumbotron">
      <div class="container">
        <h1>Validacion de pinchos de los establecimientos</h1>
        <p>Seleccione el pincho que quiere validar para ver su informacion.</p>    
      </div>
    </div>

    <div class="container">
	
		<?php foreach($Pinchos as $pincho):?>
			<a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php?action=realizarValidacionPincho&idPincho='.$pincho['pincho_id']?>">
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
