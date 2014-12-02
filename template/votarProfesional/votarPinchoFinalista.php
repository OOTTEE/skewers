<div class="container">
	<form role="form"  Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'votarFinalistasController.php?action=registrar';?>" >
		<h2><?=$InfoPincho->nombre ?></h2>
		<img src=<?=$InfoPincho->imagen ?> height="42" width="42">
		<div class="form-group">
			<label for="descripcion" >Descripcion</label>
			<textarea id="descripcion" class="form-control"  placeholder="Descripcion" name="descripcion" readonly >
			<?=$InfoPincho->descripcion?>
			</textarea>
			<textarea id="descripcion" class="form-control"  placeholder="Descripcion" name="descripcion" readonly >
			Ingredientes:
			<?=$InfoPincho->ingredientes?>
			</textarea>
			<textarea id="descripcion" class="form-control"  placeholder="Descripcion" name="descripcion" readonly >
			Precio:
			<?=$InfoPincho->precio?>
			</textarea>
		</div>
		
		<div class="form-group">
		<label for="nota" >Nota</label>
		<select class"form-control" id="nota" name="nota">
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option>4</option>
		<option>5</option>
		</select>
		</div>
		<input type="hidden"   name="pincho_id" value=<?=$InfoPincho->pincho_id ?> >
		<button class="btn btn-lg btn-primary btn-block" type="submit"  value="register" name="action" >Votar</button>
	</form>
</div> 