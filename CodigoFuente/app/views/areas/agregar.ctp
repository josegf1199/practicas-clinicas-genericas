<div id="bloqueAdmin">

<h1>Añadir área de prácticas</h1>

<?php echo $form->create('Area', array('controller'=>'areas','action'=>'agregar', $lugar)); ?>

<fieldset>

<legend>Información</legend>

<?php
		echo $form->hidden('Area.id_place', array('value'=>$lugar));
        echo $form->input('Area.nombre', array('between'=>'<br />', 'label'=>'Nombre', 'size'=>100));
 
?>

</fieldset>

<?php
echo $form->end('Guardar');
?>
<div id="volver">
    <?php echo $html->link('<< Volver', array('controller'=>'areas', 'action'=>'admin', $lugar)) ?>
</div>

</div>