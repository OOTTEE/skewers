<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="/"><?php echo $GLOBALS['conf']->nombre;?> <small class="hidden-xs hidden-sm"><?php echo $_SESSION['user']['role'];?></small></a>
	  
	</div>
	<div id="navbar" class="navbar-collapse collapse">
	  <ul class="nav navbar-nav navbar-right">
		<li><p class="navbar-text" href="#"><a href="" ><?php echo $_SESSION['user']['name'];?></a></p></li>
		<?php if($Pincho != false):?>
			<?php if(!$Pincho->validado):?>
				<li><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'establecimientoController.php?action=verPincho'?>">Editar Pincho <span class="glyphicon glyphicon-cutlery" aria-hidden="true"/></a></li>
			<?php endif;?>
		<?php else: ?>
			<li><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'establecimientoController.php?action=registrarPincho'?>">Registrar Pincho <span class="glyphicon glyphicon-cutlery" aria-hidden="true"/></a></li>
		<?php endif;?>
		<li><a href="<?php echo $GLOBALS['CONTROLLER_URL'].'usersController.php?action=logout'?>">Salir <span class="glyphicon glyphicon-off" aria-hidden="true"/></a></li>
	  </ul>
	</div>
  </div>
</nav>
<?php include_once($GLOBALS['LAYOUT_PATH'].'notificacion.php'); ?>