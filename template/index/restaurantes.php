<div class="container">
<h1>Establecimientos Participantes</h1>
<div class="row">
	<?php foreach($Establecimientos as $row): ?>
		<a href="<?= $GLOBALS['CONTROLLER_URL'].'mostrarController.php?action=pincho&usuario_id='.$row['usuario_id']?>" >
			<div class="col-md-3 text-center">
				<h5 class="restauranteTitleList" ><?= $row['name'] ?></h5>
				<div class="pincho" height="120">
					<img src="<?= (isset($row['imagen']) AND $row['imagen']!='' AND url_exists($row['imagen']) )? $row['imagen'] : $GLOBALS['IMGPINCHO_URL'].'no_imagen.png'  ?>"  height="120" width="120" class="img-responsive" style="margin: 0px auto;">
				</div>
			</div>
		</a>
	<?php endforeach;?>
</div>
