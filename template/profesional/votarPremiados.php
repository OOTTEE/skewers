<div class="container">
<h1>Pinchos Restantes</h1>
<?php
	foreach($finalistas as $row):
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
	endforeach;

?>
</div>
