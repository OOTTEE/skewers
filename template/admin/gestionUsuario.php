    <div class="jumbotron">
      <div class="container">
        <h1>Gestion de Usuarios</h1>
        <p>Seleccione el usuario que quiere dar de alta (Jurado Profesional), modificar sus datos o eliminar</p>    
      </div>
    </div>

    <div class="container">
	<lu>	
	<li><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php?action=VerAltaJuradoProfesional'?>">Ver Formulario de Alta de Jurado Profesional<span class="glyphicon glyphicon-cog" aria-hidden="true"/></a></li>
	<li><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php?action=VerModificarUsuario'?>">Ver Formulario de Modificacion de Usuario<span class="glyphicon glyphicon-cog" aria-hidden="true"/></a></li>
	<li><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php?action=VerEliminarUsuario'?>">Ver Formulario de Eliminacion de Usuario<span class="glyphicon glyphicon-cog" aria-hidden="true"/></a></li>
	</lu>
      
    </div>
