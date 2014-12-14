<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="<?= $GLOBALS['INDEX'] ?>"><?php echo $GLOBALS['conf']->nombre;?></a>
	</div>
	<div id="navbar" class="navbar-collapse collapse">
	  <ul class="nav navbar-nav navbar-right">
		<li><a href="<?= $GLOBALS['INDEX'] ?>?action=register">Registrate</a></li>
		<li><a href="<?= $GLOBALS['INDEX'] ?>?action=registerEstablecimiento">Establecimiento</a></li>
	  </ul>
	  <form class="navbar-form navbar-right" id="validarPasswordLogin" role="form" Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'usersController.php'; ?>">
		<div class="form-group">
		  <input type="text" placeholder="Usuario"  name="username" class="form-control" required>
		</div>
		<div class="form-group">
		  <input id="pass" type="password" placeholder="Password" class="form-control" required>
		</div>
		<input id="passEncrypt" type="hidden" name="password">
		<button type="submit" class="btn btn-success" value="login" name="action" >Login</button>
	  </form>
	</div>
  </div>
</nav>
<?php include_once($GLOBALS['LAYOUT_PATH'].'notificacion.php'); ?>