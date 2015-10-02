
<div id="bloqueAdmin">

<h1>Editar lugar de prácticas</h1>

<fieldset>

<legend>Práctica Clínica</legend>

<p><strong>Código: </strong><?php echo $practica['Practica']['codigo']; ?></p>
<p><strong>Nombre: </strong><?php echo $practica['Practica']['nombre']; ?></p>
<p><strong>Curso: </strong><?php echo $practica['Practica']['curso'].'º'; ?></p>
</fieldset>

<?php echo $form->create('Lp', array('url'=>array('controller'=>'lps','action'=>'editar',$lugar['Lp']['id_practica']))); ?>

<?php echo $form->hidden('Lp.id'); ?>

<fieldset>

<legend>Información</legend>

<?php
        echo $form->input('Lp.id_place', array(
				'label' => 'Lugares',
				'between'=>'<br/>',
				'type'=>'select',
				'default' => $this->data['Lp']['id_place'],
				'options' => $lugares
				));
		    
?>

</fieldset>

<?php
echo $form->end('Guardar');
?>
<div id="volver">
    <?php echo $html->link('<< Volver', array('controller'=>'lps', 'action'=>'admin', $lugar['Lp']['id_practica'])) ?>
</div>

</div>
