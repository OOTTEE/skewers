<div class="container">
<h1>Pinchos Participantes</h1>
<?php
	foreach($Pinchos as $row):
?>

	<div class="panel panel-default">
		<div class="panel-heading"><?= $row['nombre'] ?></div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'mostrarController.php?action=pincho'?>">
					<button type="submit" class="btn btn-default" name="usuario_id" value="<?= $row['usuario_id'] ?>">Ver Informacion</button>
				</form>
			</div>
		</div>	
	
<?php
	endforeach;

?>
</div>