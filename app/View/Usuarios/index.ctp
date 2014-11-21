<!-- File: /app/View/Usuarios/index.ctp -->
<?php foreach ($usuarios as $user): ?>
	<tr>
		<td><?php echo $user['Usuario']['codUsuario']; ?></td>
		<td><?php echo $user['Usuario']['alias']; ?></td>
		<td><?php echo $user['Usuario']['password']; ?></td>
		<td><?php echo $user['Usuario']['nombreUsuario']; ?></td>
	</tr>
<?php endforeach; ?>