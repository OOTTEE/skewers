<div class="container">
<?php
	foreach($asignaciones as $row):
?>
	<div class="panel panel-default">
				<div class="panel-heading"><?= $row['0']['nombreUsuario'] ?></div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'asignacionesController.php?action=editarAsignaciones'?>">
<?php	
		foreach($row as $x):
?>			
						<div class="form-group col-md-2">
							<div class="input-group">
								<label>
									<input type="checkbox" name="<?= $x['pincho_id'] ?>" value="<?= $x['pincho_id'] ?>"  <?php if($x['asignado'] != NULL){ echo 'checked' ;}?> >
									
									<?= $x['nombrePincho'] ?>
								</label>
							</div>
						</div>
<?php
		endforeach;
?>					
					<button type="submit" class="btn btn-default" name="usuario_id" value="<?= $row['0']['usuario_id'] ?>">Guardar</button>
				</form>
			</div>
		</div>	
		
<?php
	endforeach;

?>
</div>