<div class="container">
		<h2><?=$PiInfo->nombre ?></h2>
		<img src=<?= $PiInfo->imagen ?> height="320" width="400">
		<div class="form-group">
			<label for="descripcion" >Descripcion</label>
			<textarea id="descripcion" class="form-control"  placeholder="Descripcion" name="descripcion" readonly >
			<?=$PiInfo->descripcion ?>
			</textarea>
		</div>
		<div class="form-group">
			<label for="descripcion" >Ingredientes</label>
			<input type="text" id="descripcion" class="form-control"  placeholder="Descripcion" name="descripcion" value="<?=$PiInfo->ingredientes ?>" readonly >
		</div>
		<div class="form-group">
			<label for="horario" >Precio</label>
			<input type="text" id="horario" class="form-control"  placeholder="horario" name="horario" value="<?=$PiInfo->precio ?>" readonly >
		</div>


		<div class="form-group">	
		<form class="form-horizontal" role="form" method="POST" action="<?php echo '/controller/mostrarController.php?action=restaurante'?>">
				<label for="boton" ></label>
				<button type="submit" class="btn btn-default" name="usuario_id" value="<?=$PiInfo->usuario_id ?>" id="boton" >Localizacion</button>
		</form>
		</div>
		<div class="form-group">	
			<form class="form-horizontal" role="form" method="POST" action="<?php echo '/index.php?action=pinchos'?>">
					<label for="boton" ></label>
					<button type="submit" class="btn btn-lg btn-primary btn-block" name="usuario_id" id="boton" >Mas Pinchos</button>
			</form>
		</div>
</div> 