<div id="bloqueAdmin">
<h1>Prácticas Clínicas</h1>

<fieldset>

<legend>Práctica Clínica</legend>

<p><strong>Código: </strong><?php echo $practica['Practica']['codigo']; ?></p>
<p><strong>Práctica: </strong><?php echo $practica['Practica']['nombre']; ?></p>
<p><strong>Curso: </strong><?php echo $practica['Practica']['curso'].'º'; ?></p>

</fieldset>

<fieldset>

<legend>Conocimientos adquiridos</legend>

<div class="habilidades">
		
	<?php $aprendido = unserialize($clase['Clase']['conocimientos']);

		if(!empty($aprendido))
		{
			echo '<ul>';
			foreach($aprendido as $habilidad)
			{
				if($habilidad)
				{
					echo '<li>';
					echo $habilidad;
					echo '</li>';
				}
			}
			echo '</ul>';
		} ?>
				
	</div>

</fieldset>

<div id="volver">
		<?php echo $html->link('<< Volver', array('controller'=>'clases', 'action'=>'misclases', $clase['Matricula']['id'])); ?>
</div>

</div>