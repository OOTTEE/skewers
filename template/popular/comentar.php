<h1>Comentar pincho</h1>
<br>
<form Method="GET" action="<?php echo $GLOBALS['CONTROLLER_URL'].'pinchoController.php' ?>" >
	Introduce el codigo del pincho que quiera comentar: <input type="text" name="codigo_pincho"><br>
	Comentario: <input type="text" name="comentario"><br>
	<button type="submit" name="action" value="comentarPincho" >Comentar</button>
</form>
