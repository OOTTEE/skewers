<?php include_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/includes.php'); ?>
<h1>Votar pincho</h1>

<form Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'votarController.php' ?>" >
		Introduce tres pinchos que has probado y marca el que mas te gusta.<br>
		Introducir primer pincho:<input type="text" name="id1"><input name="opcion" type="radio" value="1"><br>
		Introducir segundo pincho:<input type="text" name="id2"><input name="opcion" type="radio" value="2"><br>
		Introducir tercer pincho:<input type="text" name="id3"><input name="opcion" type="radio" value="3"><br><br>

		
		
		<button type="submit" name="action" value="registrarVotoPopular" >Votar</button>
</form>