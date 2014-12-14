<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="<?= $GLOBALS['INDEX'] ?>"><?php echo $GLOBALS['conf']->nombre;?> <small  class="hidden-xs hidden-sm"><?php echo $_SESSION['user']['role'];?></small></a>
	  
	</div>
	<div id="navbar" class="navbar-collapse collapse">
	  <ul class="nav navbar-nav navbar-right">
		<li><p class="navbar-text" href="#"><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php'?>" ><?php echo $_SESSION['user']['name'];?></a></p></li>
		<li><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php?action=verAsignaciones'?>">Asignar Pinchos <span class="glyphicon glyphicon-magnet" aria-hidden="true"/></a></li>
		<li><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php?action=verConfiguracion'?>">Configuracion <span class="glyphicon glyphicon-cog" aria-hidden="true"/></a></li>
		<li><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php?action=validarPinchoEstablecimiento'?>">Validar Pinchos <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"/></a></li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" >
				Usuarios <span class="glyphicon glyphicon-user" aria-hidden="true"/> <span class="caret"/>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php?action=VerAltaJuradoProfesional'?>">Ver Formulario de Alta de Jurado Profesional</a></li>
				<li><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php?action=VerModificarUsuario'?>">Ver Formulario de Modificacion de Usuario</a></li>
				<li><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php?action=VerEliminarUsuario'?>">Ver Formulario de Eliminacion de Usuario</a></li>
			</ul>
		</li>	
		<li><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'usersController.php?action=logout'?>">Salir <span class="glyphicon glyphicon-off" aria-hidden="true"/></a></li>
	  </ul>
	</div>
  </div>
</nav>
<?php include_once($GLOBALS['LAYOUT_PATH'].'notificacion.php'); ?>
