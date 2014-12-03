<div class="container">
		<h2><?=$EsInfo['name'] ?></h2>
		<img src=<?= $EsInfo['imagen'] ?> height="42" width="42">
		<div class="form-group">
			<label for="descripcion" >Descripcion</label>
			<textarea id="descripcion" class="form-control"  placeholder="Descripcion" name="descripcion" readonly >
			<?=$EsInfo['descripcion'] ?>
			</textarea>
		</div>
</div> 