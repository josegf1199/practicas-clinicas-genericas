<div id="bloqueAdmin">
	<h1>
		Panel de Administración
	</h1>
	
	<ul>
		<?php
		if($status==10)
		{
		?>
		<li><?php echo $html->link('Prácticas clínicas', array('controller'=>'practicas', 'action'=>'admin'));?></li>
		<li><?php echo $html->link('Hospitales y áreas', array('controller'=>'places', 'action'=>'admin'));?></li>
		<li><?php echo $html->link('Usuarios', array('controller'=>'users', 'action'=>'admin')); ?></li>
		<?php
		}
		else if($status==5)
		{
		?>
		<li><?php echo $html->link('Prácticas', array('controller'=>'practicas', 'action'=>'admin'));?></li>
		<?php
		}
		?>
	</ul>
	
	<div class="boton">
	    <?php echo $html->link('Terminar Sesión', array('action'=>'logout')) ?>
	</div>
</div>

