    <div class="jumbotron">
      <div class="container">
        <h1>Formulario de modificacion de los datos de los usuarios</h1>
        <p>Seleccione el usuario que desea modificar, y a continuacion se le mostraran los datos del usuario</p>    
      </div>
    </div>

    <div class="container">
      
	
<form class="form-signin" role="form"  Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php';?>" >
	<?php 
	for($i = 0; $i < $countUsers; $i++){
		print_r($idUsers[$i][0]);
		echo("<br>");
		?>
		<li><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php?action=modificarUsuario&nameUser='.$idUsers[$i][0]?>">MODIFICAR<span class="glyphicon glyphicon-cog" aria-hidden="true"/></a></li><?php
		
	}

	 ?>
    </div>
