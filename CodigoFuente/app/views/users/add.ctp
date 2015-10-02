<div id="bloqueAdmin">

	<h1>Nuevo Usuario</h1>

	<?php
    echo $form->create('User', array('controller'=>'users','action'=>'add'));
?>
<fieldset>
	<legend>Datos de Usuario</legend>
<?php
	echo $form->input('User.username', array('size' => '20', 'label'=>'Usuario *','between'=>'<br/>'));
    echo $form->input('User.passwd', array('type' => 'password', 'size'=>'20', 'label'=>'Contraseña *','between'=>'<br/>'));
    echo $form->input('User.passwd2', array('type'=> 'password', 'size' => '20', 'label'=>'Repita Contraseña *','between'=>'<br/>'));
    
    echo $form->hidden('User.bloqueado', array('value'=>0));
    
    echo $form->input('User.status', array(
				'label' => 'Tipo de usuario',
				'between'=>'<br/>',
				'type'=>'select',
				'options' => array(
					'10'=>'Administrador',
					'5'=>'Tutor',
					'1'=>'Alumno'
					) 
				));
	?>
      
    </fieldset>
    	   
    <fieldset>
	<legend>Datos Personales</legend>
		<?php    
		echo $form->input('User.nombre', array('size' => '50', 'label'=>'Nombre *','between'=>'<br/>'));
	    echo $form->input('User.apellidos', array('size' => '50', 'label'=>'Apellidos *','between'=>'<br/>'));
	    echo $form->input('User.dni', array('size' => '50', 'label'=>'Dni *','between'=>'<br/>'));
	    ?>
	</fieldset>
	<fieldset>
		<legend>Datos de Contacto</legend>
	    <?php
	    echo $form->input('User.telefono', array('size'=>'30','label'=>'Teléfono','between'=>'<br/>'));
	    echo $form->input('User.email', array('size'=>'80','label'=>'E-mail de la UGR *','between'=>'<br/>'));
	    
		?>
	</fieldset>
		
    <?php
    echo $form->end('Guardar');
    ?>
    <div id="volver">
        <?php echo $html->link('<< Volver', array('action'=>'admin')); ?>
    </div>
</div>