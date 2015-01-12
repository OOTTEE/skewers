<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina de concurso de pinchos">
    <meta name="author" content="ABP-G19">
    <link rel="icon" href="../../favicon.ico">
    <title>Skewers</title>
	<link rel="stylesheet" href=<?php echo $GLOBALS['BOOTSTRAP_URL']."css/bootstrap.min.css"?>>
	<link rel="stylesheet" href=<?php echo $GLOBALS['BOOTSTRAP_URL']."css/bootstrap-theme.min.css"?>>	
	<link rel="stylesheet" href=<?php echo $GLOBALS['CSS_URL']."estilo.css"?>>
	</head>
	<body>
		<div class="container cuerpo">
			<div class="row">
				<?php foreach($votos as $voto):?>
					<div class="col-md-6 col-sm-6 col-xs-6  col-lg-6">
						<table class="table">
							<tr>
								<th>
									<?= $_SESSION['user']['name'] ?>
								</th>
								<th>
									Codigo
								</th>
							</tr>
							<tr>
								<td>
									<?= $voto['nombre']; ?>
								</td>
								<td>
									<?= $voto['pincho_id'].'-'.$voto['codigo_id'] ?>
								</td>
							</tr>
						</table>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</body>
</html>
	