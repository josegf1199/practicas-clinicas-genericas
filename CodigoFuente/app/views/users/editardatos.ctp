<div id="bloqueAdmin">

	<h1>Mis datos</h1>

	<?php
    echo $form->create('User', array('controller'=>'users','action'=>'editardatos'));
    echo $form->hidden('User.id');
	echo $form->hidden('User.nombre');
	echo $form->hidden('User.apellidos');
	echo $form->hidden('User.dni');
?>
<fieldset>
	<legend>Datos de Usuario</legend>
	
	<?php
	echo $form->input('User.username', array('size' => '20', 'label'=>'Nombre de Usuario','between'=>'<br/>'));
    echo $form->input('User.passwd', array('type' => 'password', 'size'=>'20', 'label'=>'Contraseña','between'=>'<br/>'));
    echo $form->input('User.passwd2', array('type'=> 'password', 'size' => '20', 'label'=>'Repite Contraseña','between'=>'<br/>'));
    ?>
</fieldset>

<fieldset>
	<legend>Datos Personales</legend>
		<p>
		<strong>Nombre: </strong><?php echo $this->data['User']['nombre']; ?>
		</p>
		<p>
		<strong>Apellidos: </strong><?php echo $this->data['User']['apellidos']; ?>
		</p>
		<p>
		<strong>Dni: </strong><?php echo $this->data['User']['dni']; ?>
		</p>
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
        <?php echo $html->link('<< Volver', array('controller'=>'portadas','action'=>'index')); ?>
    </div>
</div>