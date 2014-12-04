    <div class="jumbotron">
      <div class="container">
        <h1>Formulario de modificacion de los datos de los usuarios</h1>
        <p>Seleccione el usuario que desea modificar, y a continuacion se le mostraran los datos del usuario</p>    
      </div>
    </div>

    <div class="container">
      
	
	<?php foreach($Users as $usuario):?>
	<a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php?action=modificarUsuario&usuario_id='.$usuario['usuario_id']?>">
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?= $usuario['name'] ?> <span class="glyphicon glyphicon-pencil" aria-hidden="true"/>
				</div>	
			</div>
		</div>
	</a>
	<?php endforeach; ?>
	
	</div>
