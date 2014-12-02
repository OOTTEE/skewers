 <div class="jumbotron">
      <div class="container">
        <h1>Formulario de eliminacion de usuarios</h1>
        <p>Seleccione el usuario que desea eleminar</p>    
      </div>
    </div>

    <div class="container">
      
	
<form class="form-signin" role="form"  Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php';?>" >
	<?php 
	for($i = 0; $i < $countUsers; $i++){
		print_r($idUsers[$i][0]);
		echo("<br>");
		?>
		<li><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php?action=eliminarUsuario&nameUser='.$idUsers[$i][0]?>">ELIMINAR<span class="glyphicon glyphicon-cog" aria-hidden="true"/></a></li><?php
		
	}

	 ?>
    </div>
