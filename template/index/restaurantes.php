<div class="container">
<h1>Establecimientos Participantes</h1>
	<?php
		foreach($Establecimientos as $row):
	?>
		<div class="container">
			<div class="row" >
				<div class="col-md-4">
					<img src="<?= $row['imagen']?>" class="img-responsive" />
				</div>
				<div class="col-md-8">
					<div class="col-md-12" >
						<h4><strong><?= $row['name'] ?></strong></h4>
					</div>
					<div class="col-md-7" >
						<p>
							<?= $row['descripcion'] ?>
						</p>
					</div>
					<div class="col-md-5" >
						<address>
							<strong>Direccion:</strong>
							<?= $row['direccion'] ?>
							<a href="mailto:#"><?= $row['email'] ?></a>
						</address>
						<a href="<?= $GLOBALS['CONTROLLER_URL'].'mostrarController.php?action=restaurante&usuario_id='.$row['usuario_id']?>" ><button type="button" class="btn btn-default"  >Ver Informacion</button></a>
					</div>
					
				</div>
			</div>
		</div>	
		<hr/>
	<?php
		endforeach;

	?>
</div>