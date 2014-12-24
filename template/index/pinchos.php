<div class="container">
	<div class="row">
		<h1>Pinchos Participantes</h1>
	</div>
	<div class="row">
		<?php foreach($Pinchos as $row): ?>
			<a href="<?= $GLOBALS['CONTROLLER_URL'].'mostrarController.php?action=pincho&usuario_id='.$row['usuario_id']?>" >
				<div class="col-md-3 text-center">
					<h5 class="pinchoTitleList" ><?= $row['nombre'] ?></h5>
					<div class="pincho" height="120">
						<img src="<?= (isset($row['imagen']) AND $row['imagen']!='' AND url_exists($row['imagen']) )? $row['imagen'] : $GLOBALS['IMGPINCHO_URL'].'no_imagen.png'  ?>"  height="120" width="120" class="img-responsive" style="margin: 0px auto;">
					</div>
				</div>
			</a>
		<?php endforeach;?>
	</div>
</div>
