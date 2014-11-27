<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="/"><?php echo $_SESSION['conf']['nombre'];?></a>
	  
	</div>
	<div id="navbar" class="navbar-collapse collapse">
	  <ul class="nav navbar-nav navbar-right">
		<li><p class="navbar-text" href="#"><a href="" ><?php echo $_SESSION['user']['name'];?></a></p></li>
		<?php if($_SESSION['user']['role'] == 'administrador'): ?>
			<li><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php?action=verConfiguracion'?>">Configuracion <span class="glyphicon glyphicon-cog" aria-hidden="true"/></a></li>
		<?php endif; ?>
		<li><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'usersController.php?action=logout'?>">Salir <span class="glyphicon glyphicon-off" aria-hidden="true"/></a></li>
	  </ul>
	</div>
  </div>
</nav>