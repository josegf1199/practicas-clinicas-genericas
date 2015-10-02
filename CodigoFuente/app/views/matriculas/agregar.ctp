<div id="bloqueAdmin">

<h1>Crear matrícula de prácticas</h1>

<?php echo $form->create('Matricula', array('url'=>array('controller'=>'matriculas','action'=>'agregar',$idPractica))); ?>

<fieldset>

<legend>Práctica Clínica</legend>

<p><strong>Código: </strong><?php echo $practica['Practica']['codigo']; ?></p>
<p><strong>Práctica: </strong><?php echo $practica['Practica']['nombre']; ?></p>
<p><strong>Curso: </strong><?php echo $practica['Practica']['curso'].'º'; ?></p>
</fieldset>

<fieldset>

<legend>Información</legend>

<?php
		echo $form->hidden('Matricula.id_practica', array('value'=>$idPractica));
		echo $form->hidden('Matricula.bloqueado', array('value'=>0));
		
		echo $form->input('Matricula.id_alumno', array(
					'label' => 'Listado de alumnos',
					'between'=>'<br/>',
					'type'=>'select',
					'options' => $alumnos 
					));
?>

</fieldset>

<?php
echo $form->end('Guardar');
?>
<div id="volver">
    <?php echo $html->link('<< Volver', array('controller'=>'matriculas', 'action'=>'admin', $idPractica)) ?>
</div>

</div>