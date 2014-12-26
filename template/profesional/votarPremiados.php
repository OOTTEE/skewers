<div class="container">
<h1>Pinchos Restantes</h1>
<div class="row">
<?php
	foreach($finalistas as $row):
?>
					<a href="<?= $GLOBALS['CONTROLLER_URL'].'votarProController.php?action=votarP&pincho_id='.$row['pincho_id']?>" >
						<div class="col-md-3 text-center">
							<h5 class="pinchoTitleList" ><?= $row['nombre'] ?></h5>
							<div class="pincho" height="120">
								<img src="<?= (isset($row['imagen']) AND $row['imagen']!='' AND url_exists($row['imagen']) )? $row['imagen'] : $GLOBALS['IMGPINCHO_URL'].'no_imagen.png'  ?>"  height="120" width="120" class="img-responsive" style="margin: 0px auto;">
							</div>
						</div>
					</a>





<?php
/*
?>

	<div class="panel panel-default">
		<div class="panel-heading"><?= $row['nombre'] ?></div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'votarProController.php?action=votarP'?>">
					<button type="submit" class="btn btn-default" name="pincho_id" value="<?= $row['pincho_id'] ?>">Votar</button>
				</form>
			</div>
		</div>

		<?php
		*/
		?>

<?php
	endforeach;

?>
</div>
