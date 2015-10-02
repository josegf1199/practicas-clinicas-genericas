
<div id="bloqueAdmin">

<h1>Matrícula de prácticas</h1>

<?php echo $form->create('Matricula', array('url'=>array('controller'=>'matriculas','action'=>'editar'))); ?>

<?php echo $form->hidden('Matricula.id'); ?>
<?php echo $form->hidden('Matricula.id_practica'); ?>

<fieldset>

<legend>Alumno</legend>

<p><strong>Nombre: </strong><?php echo $matricula['User']['nombre']; ?></p>
<p><strong>Apellidos: </strong><?php echo $matricula['User']['apellidos']; ?></p>
<p><strong>DNI: </strong><?php echo $matricula['User']['dni']; ?></p>

</fieldset>

<fieldset>

<legend>Práctica Clínica</legend>

<p><strong>Código: </strong><?php echo $matricula['Practica']['codigo']; ?></p>
<p><strong>Práctica: </strong><?php echo $matricula['Practica']['nombre']; ?></p>
<p><strong>Curso: </strong><?php echo $matricula['Practica']['curso'].'º'; ?></p>
</fieldset>

<fieldset>

<legend>Información</legend>

<?php
				
		echo $form->input('Matricula.bloqueado', array('label'=>'Pendiente','type'=>'checkbox'));		    
?>

</fieldset>

<?php
echo $form->end('Guardar');
?>
<div id="volver">
    <?php echo $html->link('<< Volver', array('controller'=>'matriculas', 'action'=>'admin', $matricula['Matricula']['id_practica'])) ?>
</div>

</div>
