
<div id="bloqueAdmin">

<h1>Sesión de prácticas pendiente de revisión</h1>

<?php echo $form->create('Clase', array('url'=>array('controller'=>'clases','action'=>'editar'))); ?>

<?php echo $form->hidden('Clase.id'); ?>

<fieldset>

<legend>Alumno</legend>

<p><strong>Nombre: </strong><?php echo $alumno['User']['nombre']; ?></p>
<p><strong>Apellidos: </strong><?php echo $alumno['User']['apellidos']; ?></p>
<p><strong>DNI: </strong><?php echo $alumno['User']['dni']; ?></p>

</fieldset>

<fieldset>

<legend>Práctica Clínica</legend>

<p><strong>Código: </strong><?php echo $practica['Practica']['codigo']; ?></p>
<p><strong>Nombre: </strong><?php echo $practica['Practica']['nombre']; ?></p>
<p><strong>Curso: </strong><?php echo $practica['Practica']['curso']; ?></p>
</fieldset>

<fieldset>

<legend>Información</legend>
<p><strong>Lugar: </strong><br/><?php echo $clase['Clase']['lugar']; ?></p>
<br/>
<p><strong>Observaciones del alumno: </strong><br/><?php echo $clase['Clase']['observaciones_alumno']; ?></p>
<br/>
<p><strong>Conocimientos adquiridos: </strong><br/>

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
</p>
<?php
			        
		echo $form->input('Clase.nota', array('size' => '50', 'label'=>'Nota','between'=>'<br/>'));

		echo $form->input('Clase.observaciones_tutor', array('type' => 'textarea', 'label'=>'Observaciones del tutor','between'=>'<br/>'));
		
		echo '<br/>';

		echo $form->input('Clase.revisada', array('label'=>'Revisada','type'=>'checkbox'));    
?>

</fieldset>

<?php
echo $form->end('Guardar');
?>
<div id="volver">
    <?php echo $html->link('<< Volver', array('controller'=>'clases', 'action'=>'admin', $practica['Practica']['id'])) ?>
</div>

</div>
