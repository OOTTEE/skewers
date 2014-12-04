
<h1>Votar pincho</h1>

<form Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'votosController.php' ?>" >
		Introduce tres pinchos que has probado y marca el que mas te gusta.<br>
		Introducir primer pincho:<input type="text" name="codigo_1"><input name="votado" type="radio" value="1"><br>
		Introducir segundo pincho:<input type="text" name="codigo_2"><input name="votado" type="radio" value="2"><br>
		Introducir tercer pincho:<input type="text" name="codigo_3"><input name="votado" type="radio" value="3"><br><br>
		<button type="submit" name="action" value="registrarVotoPopular" >Votar</button>
</form>