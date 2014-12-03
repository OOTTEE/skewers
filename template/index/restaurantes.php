<div class="container">
<h1>Pinchos Restantes</h1>
<?php
	foreach($Establecimientos as $row):
?>

	<div class="panel panel-default">
		<div class="panel-heading"><?= $row['name'] ?></div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'mostrarController.php?action=restaurante'?>">
					<button type="submit" class="btn btn-default" name="usuario_id" value="<?= $row['usuario_id'] ?>">Ver Informacion</button>
				</form>
			</div>
		</div>	
	
<?php
	endforeach;

?>
</div>