    <div class="jumbotron">
      <div class="container">
        <h1>Validacion de pinchos de los establecimientos</h1>
        <p>Seleccione el pincho que quiere validar para ver su informacion.</p>    
      </div>
    </div>

    <div class="container">
	
      <form class="form-signin" role="form"  Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php';?>" >
	<?php 
	for($i = 0; $i < $numPinchos; $i++){
		print_r($nombresPinchos[$i][0]);
		echo("<br>");
		?>
		<li><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php?action=realizarValidacionPincho&namePincho='.$nombresPinchos[$i][0]?>">VER INFORMACION PINCHO<span class="glyphicon glyphicon-cog" aria-hidden="true"/></a></li><?php
		
	}

	 ?>

    </div>
