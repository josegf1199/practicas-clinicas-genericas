
<div id="bloqueAdmin">

<h1>Editar lugar de prácticas</h1>

<?php echo $form->create('Place', array('controller'=>'places','action'=>'editar')); ?>

<?php echo $form->hidden('Place.id'); ?>

<fieldset>

<legend>Información</legend>

<?php
        echo $form->input('Place.hospital', array('between'=>'<br />', 'label'=>'Hospital', 'size'=>100));
	    
?>

</fieldset>

<?php
echo $form->end('Guardar');
?>
<div id="volver">
    <?php echo $html->link('<< Volver', array('controller'=>'places', 'action'=>'admin')) ?>
</div>

</div>
