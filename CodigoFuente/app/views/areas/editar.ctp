
<div id="bloqueAdmin">

<h1>Editar área de prácticas</h1>

<?php echo $form->create('Area', array('controller'=>'areas','action'=>'editar')); ?>

<?php echo $form->hidden('Area.id'); ?>

<fieldset>

<legend>Información</legend>

<?php
        echo $form->input('Area.nombre', array('between'=>'<br />', 'label'=>'Nombre', 'size'=>100));
	    
?>

</fieldset>

<?php
echo $form->end('Guardar');
?>
<div id="volver">
    <?php echo $html->link('<< Volver', array('controller'=>'places', 'action'=>'admin')) ?>
</div>

</div>
