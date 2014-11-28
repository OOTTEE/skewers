<div class="container">
	<?php $user_id = 0;
		  $close = false;?>
	<?php foreach($asignaciones as $row): ?>
		<?php 
		if($user_id == $row['usuario_id']){
			?><div class="form-group  col-md-2">
				<div class="input-group">
					<label>
					<input type="checkbox" name="<?= $row['pincho_id'] ?>" value="<?= $row['pincho_id']?>" <?php if($row['asignado'] != NULL){ echo 'checked' ;}?>>
					<?= $row['nombrePincho']?>
					</label>
				</div>
			</div><?php
		}else{
			if($close){
				$close=false;
				echo '<button type="submit" class="btn btn-default">Guardar</button>';
				echo '</form>';
				echo '</div>';
				echo '</div>';
			} 
			$close=true;
			$user_id = $row['usuario_id'];?>
			<div class="panel panel-default">
				<div class="panel-heading"><?= $row['nombreUsuario'] ?></div>
				<div class="panel-body">
					<form class="form-horizontal" role="form">
						<div class="form-group col-md-2">
							<div class="input-group">
								<label>
									<input type="checkbox" name="<?= $row['pincho_id'] ?>" value="<?= $row['pincho_id'] ?>"  <?php if($row['asignado'] != NULL){ echo 'checked' ;}?> >
									
									<?= $row['nombrePincho'] ?>
								</label>
							</div>
						</div>

	<?php } 
		endforeach; ?>
					<button type="submit" class="btn btn-default">Guardar</button>
				</form>
			</div>
		</div>	
</div>