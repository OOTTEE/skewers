<div class="container">
		<h2><?=$EsInfo['name'] ?></h2>
		<img src=<?= $EsInfo['imagen'] ?> height="320" width="400">
		<div class="form-group">
			<label for="descripcion" >Descripcion</label>
			<textarea id="descripcion" class="form-control"  placeholder="Descripcion" name="descripcion" readonly >
			<?=$EsInfo['descripcion'] ?>
			</textarea>
		</div>
		<div class="form-group">
			<label for="descripcion" >Direccion</label>
			<input type="text" id="descripcion" class="form-control"  placeholder="Descripcion" name="descripcion" value="<?=$EsInfo['direccion'] ?>" readonly >
		</div>
		<div class="form-group">
			<label for="horario" >Horario</label>
			<input type="text" id="horario" class="form-control"  placeholder="horario" name="horario" value="<?=$EsInfo['horario'] ?>" readonly >
		</div>
		<div class="form-group">	
			<label for="web" >Web</label>
			<input type="url" id="web" class="form-control"  placeholder="web" name="web" value="<?=$EsInfo['web'] ?>" readonly >
		</div>
		<div class="form-group">	
			<label for="telefono" >Telefono</label>
			<input type="text" id="telefono" class="form-control"  placeholder="telefono" name="telefono" value="<?=$EsInfo['phone'] ?>" readonly >
		</div>
		
		<div class="form-group">	
		<form class="form-horizontal" role="form" method="POST" action="<?php echo '/controller/mostrarController.php?action=pincho'?>">
				<label for="boton1" ></label>
				<button type="submit" class="btn btn-default" name="usuario_id" value="<?=$EsInfo['usuario_id'] ?>" id="boton1" >Pincho</button>
		</form>
		</div>
		
		<div class="form-group">	
			<form class="form-horizontal" role="form" method="POST" action="<?php echo '/index.php?action=restaurantes'?>">
					<label for="boton2" ></label>
					<button type="submit" class="btn btn-lg btn-primary btn-block" name="usuario_id" id="boton2" >Mas Restaurantes</button>
			</form>
		</div>
</div> 