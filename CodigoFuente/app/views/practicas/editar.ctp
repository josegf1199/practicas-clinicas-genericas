<div id="bloqueAdmin">

<h1>Añadir Práctica</h1>

<?php echo $form->create('Practica', array('controller'=>'practicas','action'=>'editar')); ?>

<?php echo $form->hidden('Practica.id'); ?>

<fieldset>

<legend>Información</legend>

<?php
        echo $form->input('Practica.nombre', array('between'=>'<br />', 'label'=>'Nombre', 'size'=>100));
        echo $form->input('Practica.codigo', array('between'=>'<br />', 'label'=>'Código', 'size'=>100));
        
        echo $form->input('Practica.bloqueado', array('label'=>'Bloqueada','type'=>'checkbox'));
        
        echo $form->input('Practica.curso', array(
				'label' => 'Curso',
				'between'=>'<br/>',
				'default' => $this->data['Practica']['curso'],
				'type'=>'select',
				'options' => array(
					'4'=>'4º',
					'5'=>'5º',
					'6'=>'6º'
					) 
				));
			
?>

</fieldset>

<?php
echo $form->end('Guardar');
?>
<div id="volver">
    <?php echo $html->link('<< Volver', array('controller'=>'practicas', 'action'=>'admin')) ?>
</div>

</div>