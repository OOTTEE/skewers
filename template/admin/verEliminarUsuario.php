 <div class="jumbotron">
      <div class="container">
        <h1>Formulario de eliminacion de usuarios</h1>
        <p>Seleccione el usuario que desea eleminar</p>    
      </div>
    </div>

    <div class="container">
     
	
	<?php foreach($Users as $usuario):?>
		<div class="col-md-3 text-center">
			<div class="button_example" height="120">
					<a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php?action=eliminarUsuario&nameUser='.$usuario['usuario_id']?>"><?= $usuario['name'] ?> <span class="glyphicon glyphicon-trash" aria-hidden="true"/></a>
				
			</div>
		</div>

		
		
	
	<?php endforeach; ?>
	
    <div class="container">
	
