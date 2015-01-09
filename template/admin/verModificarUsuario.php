    <div class="jumbotron">
      <div class="container">
        <h1>Formulario de modificacion de los datos de los usuarios</h1>
        <p>Seleccione el usuario que desea modificar, y a continuacion se le mostraran los datos del usuario</p>    
      </div>
    </div>

    <div class="container">
      
	
	<?php foreach($Users as $row):?>
	<a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php?action=modificarUsuario&usuario_id='.$row['usuario_id']?>">
		
		<div class="col-md-3 text-center">
				<div class="button_example" height="120">
					<?= $row['name'] ?> <span class="glyphicon glyphicon-pencil" aria-hidden="true"/>
				</div>
			</div>
	</a>
	<?php endforeach; ?>
	
	</div>
