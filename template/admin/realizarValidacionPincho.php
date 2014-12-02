 <div class="jumbotron">
      <div class="container">
        <h1>Resultado de la modificacion</h1>
        <p>Se muestra un mensaje si se ha modificado el usuario o no</p>    
      </div>
    </div>

    <div class="container">
	<form class="form-signin" role="form"  Method="POST" action="<?php echo $GLOBALS['CONTROLLER_URL'].'adminController.php';?>" >
		<div class="panel panel-default">
		  <div class="panel-heading"><?= $pincho->nombre ?></div>
		  <div class="panel-body">
				<table class="table">
					<tr>
						<td>Pinchos_id:</td>
						<td><?= $pincho->pincho_id ?></td>
					</tr>
					<tr>
						<td>Usuario_id:</td>
						<td><?= $pincho->usuario_id ?></td>
					</tr>
					<tr>
						<td>Ingredientes:</td>
						<td><?= $pincho->ingredientes ?></td>
					</tr>
					<tr>
						<td>Precio:</td>
						<td><?= $pincho->precio ?>€</td>
					</tr>
					<tr>
						<td>Finalista:</td>
						<td><?= ($pincho->finalista==0)? 'No' : 'Si' ?></td>
					</tr>
					<tr>
						<td>Imagen:</td>
						<td><?= ($pincho->imagen<>null)? $pincho->imagen : '' ?></td>
					</tr>
					<tr>
						<td>Descripcion:</td>
						<td><?= $pincho->descripcion ?></td>
					</tr>
				</table>
		
				<input type="hidden" name="pincho_id" value="<?php echo $pincho->pincho_id ?>">
				<button class="btn btn-lg btn-primary btn-block" type="submit"  value="validar" name="action" value="" >Validar Pincho <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></button>
				<button class="btn btn-lg btn-primary btn-block" type="submit"  value="volver">Volver</button>
		
		  </div>
		</div>
	</form>
<?php

			
?>
    </div>
