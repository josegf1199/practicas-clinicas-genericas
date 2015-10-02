<div id="bloqueAdmin">

	<h1>Editar Usuario</h1>

	<?php
    echo $form->create('User', array('controller'=>'users','action'=>'editar'));
    echo $form->hidden('User.id');
?>
<fieldset>
	<legend>Datos de Usuario</legend>
<?php
	echo $form->input('User.username', array('size' => '20', 'label'=>'Nombre de Usuario','between'=>'<br/>'));
    echo $form->input('passwd', array('type' => 'password', 'size'=>'20', 'label'=>'Contraseña','between'=>'<br/>'));
    echo $form->input('passwd2', array('type'=> 'password', 'size' => '20', 'label'=>'Repite Contraseña','between'=>'<br/>'));
       				
	echo $form->input('User.status', array(
				'label' => 'Tipo de usuario',
				'between'=>'<br/>',
				'default'=>$this->data['User']['status'],
				'type'=>'select',
				'options' => array(
					'10'=>'Administrador',
					'5'=>'Tutor',
					'1'=>'Alumno'
					) 
				));
				
	echo '<br/>';
						
	echo $form->input('User.bloqueado', array('label'=>'Bloqueado','type'=>'checkbox'));
				
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