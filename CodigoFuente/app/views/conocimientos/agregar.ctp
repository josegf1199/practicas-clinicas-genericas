<div id="bloqueAdmin">

<h1>Añadir habilidad de prácticas</h1>

<fieldset>

<legend>Práctica Clínica</legend>

<p><strong>Código: </strong><?php echo $practica['Practica']['codigo']; ?></p>
<p><strong>Nombre: </strong><?php echo $practica['Practica']['nombre']; ?></p>
<p><strong>Curso: </strong><?php echo $practica['Practica']['curso'].'º'; ?></p>
</fieldset>

<?php echo $form->create('Conocimiento', array('url'=>array('controller'=>'conocimientos','action'=>'agregar',$idPractica))); ?>

<fieldset>

<legend>Habilidad</legend>

<?php
	echo $form->hidden('Conocimiento.id_practica', array('value'=>$idPractica));
    echo $form->input('Conocimiento.nombre', array('type'=>'textarea', 'label'=>false));
?>

</fieldset>

<?php
echo $form->end('Guardar');
?>
<div id="volver">
    <?php echo $html->link('<< Volver', array('controller'=>'conocimientos', 'action'=>'admin', $idPractica)) ?>
</div>

</div>