 <div class="jumbotron">
      <div class="container">
        <h1>Resultado de la modificacion</h1>
        <p>Se muestra un mensaje si se ha modificado el usuario o no</p>    
      </div>
    </div>

    <div class="container">
	<form class="form-signin" role="form"  Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php';?>" >      
	<?php 	echo "Pinchos_id : "; print_r($datosPincho[0][0]); echo "<br>";
		echo "Usuario_id : "; print_r($datosPincho[0][1]); echo "<br>";
		echo "Ingredientes : "; print_r($datosPincho[0][2]); echo "<br>";
		echo "Nombre : "; print_r($datosPincho[0][3]); echo "<br>";
		echo "Precio : "; print_r($datosPincho[0][4]); echo "€";echo "<br>";
		echo "Finalista : "; if($datosPincho[0][5]==0)
					echo "No";
				     else 
					echo "Si";

; echo "<br>";
		if($datosPincho[0][6]<>null){
			echo "Imagen : "; print_r($datosPincho[0][6]);echo "<br>";
		}
		echo "Descripcion : "; print_r($datosPincho[0][7]);echo "<br>";
		?>
<input type="hidden" name="pincho_id" value="<?php print_r($datosPincho[0][0]) ?>">
<button class="btn btn-lg btn-primary btn-block" type="submit"  value="validar" name="action" >VALIDAR PINCHO</button>
<button class="btn btn-lg btn-primary btn-block" type="submit"  value="volver" name="action" >VOLVER</button>
		
	</form>
<?php

			
?>
    </div>
