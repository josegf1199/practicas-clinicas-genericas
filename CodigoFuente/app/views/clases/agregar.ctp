<div id="bloqueAdmin">

<h1>Nueva clase práctica</h1>

<?php echo $form->create('Clase', array('url'=>array('controller'=>'clases','action'=>'agregar',$matricula['Matricula']['id']))); ?>

<fieldset>

<legend>Práctica Clínica</legend>

<p><strong>Código: </strong><?php echo $matricula['Practica']['codigo']; ?></p>
<p><strong>Nombre: </strong><?php echo $matricula['Practica']['nombre']; ?></p>
<p><strong>Curso: </strong><?php echo $matricula['Practica']['curso'].'º'; ?></p>
</fieldset>

<fieldset>

<legend>Alumno</legend>
<p><strong>Nombre: </strong><?php echo $alumno['User']['nombre']; ?></p>
<p><strong>Apellidos: </strong><?php echo $alumno['User']['apellidos']; ?></p>
<p><strong>Dni: </strong><?php echo $alumno['User']['dni']; ?></p>

</fieldset>

<fieldset>

<legend>Información</legend>

<?php
		echo $form->hidden('Clase.id_matricula', array('value'=>$matricula['Matricula']['id']));
		echo $form->hidden('Clase.id_practica', array('value'=>$matricula['Matricula']['id_practica']));
		echo $form->hidden('Clase.revisada', array('value'=>0));
		echo $form->hidden('Clase.nota', array('value'=>'-'));
		
		echo $form->input('Clase.id_tutor', array(
					'label' => 'Tutor de prácticas',
					'between'=>'<br/>',
					'type'=>'select',
					'options' => $tutores 
					));
		echo '<br/>';

		echo $form->input('Clase.lugar', array(
					'label' => 'Lugar de prácticas',
					'between'=>'<br/>',
					'type'=>'select',
					'options' => $lugares
					));
		echo '<br/>';	

		echo $form->input('Clase.fecha',array(
		    'type'=>'date',
		    'dateFormat' => 'DMY',
		    'selected' => null,
		    'attributes' => array(),
		    'empty' => false,
		    'label' => 'Fecha de realización de la práctica',
		    'between' => '<br/>'
		    )
	    );

		echo '<br/>';

		echo $form->input('Clase.observaciones_alumno', array('type' => 'textarea', 'label'=>'Observaciones del alumno','between'=>'<br/>'));
		
		echo '<br/>';
		  
?>

</fieldset>

<fieldset>
	<legend>Conocimientos adquiridos</legend>
	
	<?php
	
	if(!empty($habilidades))
	{
		$contador = 0;
		
		foreach($habilidades as $habilidad)
		{
			$nombre = $habilidad['Conocimiento']['nombre'];
			echo $form->input('Aprendido.'.$contador, array('type'=>'checkbox', 'label'=>$nombre, 'value'=>$nombre));
			$contador++;
		}
	}
	?>
	
</fieldset>

<?php
echo $form->end('Guardar');
?>
<div id="volver">
    <?php echo $html->link('<< Volver', array('controller'=>'clases', 'action'=>'misclases', $matricula['Matricula']['id'])) ?>
</div>

</div>