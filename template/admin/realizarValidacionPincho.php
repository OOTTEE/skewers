 <div class="jumbotron">
      <div class="container">
        <h1>Resultado de la modificacion</h1>
        <p>Se muestra un mensaje si se ha modificado el usuario o no</p>    
      </div>
    </div>

    <div class="container">
	<form class="form-signin" role="form"  Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php';?>" >      
	<?php 	echo "Pinchos_id : ".$pincho->pincho_id."<br>";
		echo "Usuario_id : ".$pincho->usuario_id."<br>";
		echo "Ingredientes : ".$pincho->ingredientes."<br>";
		echo "Nombre : ".$pincho->nombre."<br>";
		echo "Precio : ".$pincho->precio."€";echo "<br>";
		echo "Finalista : "; if($pincho->finalista==0)
					echo "No";
				     else 
					echo "Si";

; echo "<br>";
		if($pincho->imagen<>null){
			echo "Imagen : ".$pincho->imagen."<br>";
		}
		echo "Descripcion : ".$pincho->descripcion."<br>";
		?>
<input type="hidden" name="pincho_id" value="<?php echo $pincho->pincho_id ?>">
<button class="btn btn-lg btn-primary btn-block" type="submit"  value="validar" name="action" >VALIDAR PINCHO</button>
<button class="btn btn-lg btn-primary btn-block" type="submit"  value="volver" name="action" >VOLVER</button>
		
	</form>
<?php

			
?>
    </div>
