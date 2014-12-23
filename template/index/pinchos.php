<div class="container">
<h1>Pinchos Participantes</h1>
	<div class="panel panel-default">
			<div class="panel-body">
					<?php
					foreach($Pinchos as $row):
						?>
						<a href="<?= $GLOBALS['CONTROLLER_URL'].'mostrarController.php?action=pincho&usuario_id='.$row['usuario_id']?>" >
								<button type="submit" class="btn btn-default" name="usuario_id" value="<?= $row['usuario_id'] ?>">
										<div class="panel-header"><?= $row['nombre'] ?></div>
												<img src="<?= $row['imagen']  ?>"  height="120" width="120" responsive>
								</button>
						</a>
					<?php
				endforeach;
				?>
			</div>

		</div>


</div>
