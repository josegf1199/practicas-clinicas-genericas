<div id="bloqueAdmin">

<h1>Asignar lugar de prácticas</h1>

<fieldset>

<legend>Práctica Clínica</legend>

<p><strong>Código: </strong><?php echo $practica['Practica']['codigo']; ?></p>
<p><strong>Nombre: </strong><?php echo $practica['Practica']['nombre']; ?></p>
<p><strong>Curso: </strong><?php echo $practica['Practica']['curso'].'º'; ?></p>
</fieldset>

<?php echo $form->create('Lp', array('url'=>array('controller'=>'lps','action'=>'agregar',$practica['Practica']['id']))); ?>

<fieldset>

<legend>Información</legend>

<?php
		echo $form->hidden('Lp.id_practica', array('value'=>$practica['Practica']['id']));
		
		echo $form->input('Lp.id_place', array(
					'label' => 'Lugares',
					'between'=>'<br/>',
					'type'=>'select',
					'options' => $lugares
					));
		       
?>

</fieldset>

<?php
echo $form->end('Guardar');
?>
<div id="volver">
    <?php echo $html->link('<< Volver', array('controller'=>'lps', 'action'=>'admin', $practica['Practica']['id'])) ?>
</div>

</div>