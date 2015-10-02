
<div id="bloqueAdmin">

<h1>Editar tutor de prácticas</h1>

<fieldset>

<legend>Práctica Clínica</legend>

<p><strong>Código: </strong><?php echo $practica['Practica']['codigo']; ?></p>
<p><strong>Nombre: </strong><?php echo $practica['Practica']['nombre']; ?></p>
<p><strong>Curso: </strong><?php echo $practica['Practica']['curso'].'º'; ?></p>
</fieldset>

<?php echo $form->create('Tutor', array('url'=>array('controller'=>'tutores','action'=>'editar'))); ?>

<?php echo $form->hidden('Tutor.id'); ?>

<fieldset>

<legend>Información</legend>

<?php
        echo $form->input('Tutor.id_user', array(
				'label' => 'Profesor',
				'between'=>'<br/>',
				'type'=>'select',
				'default' => $this->data['Tutor']['id_user'],
				'options' => $tutores
				));
		    
?>

</fieldset>

<?php
echo $form->end('Guardar');
?>
<div id="volver">
    <?php echo $html->link('<< Volver', array('controller'=>'tutores', 'action'=>'admin', $tutor['Tutor']['id_practica'])) ?>
</div>

</div>
