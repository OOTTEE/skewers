    <div class="jumbotron">
      <div class="container">
        <h1>Validacion de pinchos de los establecimientos</h1>
        <p>Seleccione el pincho que quiere validar para ver su informacion.</p>    
      </div>
    </div>

    <div class="container">
	
		<?php foreach($Pinchos as $row):?>
			<a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php?action=realizarValidacionPincho&idPincho='.$row['pincho_id']?>">
				<div class="col-md-3 text-center">
				<h5 class="pinchoTitleList" ><?= $row['nombre'] ?></h5>
				<div class="pincho" height="120">
					<img src="<?= (isset($row['imagen']) AND $row['imagen']!='' AND url_exists($GLOBALS['URL_FOLDER'].$row['imagen']) )? $GLOBALS['URL_FOLDER'].$row['imagen'] : $GLOBALS['IMGPINCHO_URL'].'no_imagen.png'  ?>"  height="120" width="120" class="img-responsive" style="margin: 0px auto;">
				</div>
			</div>
			</a>
		<?php endforeach; ?>

    </div>
