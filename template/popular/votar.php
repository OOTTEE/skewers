<h1>Votar pincho</h1>

<form Method="POST" action="/controller/votarController.php" >
	  <div class="col-lg-6">
		<div class="input-group">
		  <span class="input-group-addon">
			<input type="radio" name="like" value="id_pincho" >
		  </span>
		  <input type="text" class="form-control">
		</div><!-- /input-group -->
	  </div><!-- /.col-lg-6 -->
	  <div class="col-lg-6">
		<div class="input-group">
		  <span class="input-group-addon">
			<input type="radio" name="like" value="id_pincho" >
		  </span>
		  <input type="text" class="form-control">
		</div><!-- /input-group -->
	  </div><!-- /.col-lg-6 -->
	 <div class="col-lg-6">
		<div class="input-group">
		  <span class="input-group-addon">
			<input type="radio" name="like" value="id_pincho" >
		  </span>
		  <input type="text" class="form-control" >
		</div><!-- /input-group -->
	 </div>
		<button type="submit" name="action" value="registrarVotoPopular" >Votar</button>
</form>