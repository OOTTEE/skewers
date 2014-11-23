<h1>Configuracion</h1>
<div style="float:left;width: 70%">
	<?php
		echo $this->Form->create('Configuracion', array('url' => '/Configuracion/edit','type' => 'file'));
			echo $this->Form->hidden('id' ,array('value' => $config['id']));
			echo $this->Form->input('nombre',array('label' => 'Nombre del concurso', 'value' => $config['nombre']));
			echo $this->Form->input('logo',	array('label' => 'Logo del concurso', 'type' => 'file'));
			echo $this->Form->input('imagen',array('label' => 'Imagen de portada del concurso', 'type' => 'file'));
			echo $this->Form->input('descripcion',array('label' => 'Descripción del concurso', 'type' => 'textarea', 'value' => $config['descripcion']));
			echo $this->Form->input('f_inicio',array('label' => 'Fecha de inicio del concurso', 'dateFormat' => 'DMY', 'value' => $config['f_inicio']));
			echo $this->Form->input('f_fin',array('label' => 'Fecha de Finalización del concurso','dateFormat' => 'DMY', 'value' => $config['f_fin']));
		echo $this->Form->end('Actualizar');	
	?>
</div>
<div style="float:right;width: 30%">
	<div>
		<h2>Logo</h2>
		<?php 
			if($config['logo'] != ''){
				echo $this->Html->image($config['logo'], array('alt' => 'Logo', 'height' => '150'));?>
				<br/><span><?php echo $config['logo'];}?></span>
	</div>
	<div>
		<h2>Portada</h2>
		<?php 
			if($config['imagen'] != ''){
				echo $this->Html->image($config['imagen'], array('alt' => 'Portada', 'height' => '150'));?>
				<br/><span><?php echo $config['imagen'];}?></span>
	</div>
	
</div>