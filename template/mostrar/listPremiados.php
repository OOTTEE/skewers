<div class="container">
<h1>Premiados</h1>
<?php
	foreach($PiInf as $row):
?>

	<div class="panel panel-default">
		<div class="panel-heading"><h3><?= $row['nombre'] ?></h3></div>

		<div class="container">
			
			<h5>Del restaurante:  <?= $row['name']?></h5><h5>Votos:  <?= $row['votos']?></h5>
			
		</div>
	</div>	
	
<?php
	endforeach;

?>
</div>