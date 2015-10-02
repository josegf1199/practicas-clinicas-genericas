<?php echo $javascript->link('funciones'); ?>

<div id="bloqueAdmin">

	<h1>Alta de nuevos alumnos</h1>
	
	<?php
    	echo $form->create('User', array('controller'=>'users','action'=>'registro'));
	?>
	
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
	    echo $form->input('User.email', array('size'=>'80','label'=>'E-mail *','between'=>'<br/>'));
	    ?>
	</fieldset>


<fieldset>
	<legend>Datos de Acceso</legend>
    <?php    
    
    echo $form->hidden('User.bloqueado', array('value'=>1));
    echo $form->input('User.username', array('size' => '20', 'label'=>'Nombre de Usuario *','between'=>'<br/>'));
    echo $form->input('User.passwd', array('type' => 'password', 'size'=>'20', 'label'=>'Contraseña *','between'=>'<br/>'));
    echo $form->input('User.passwd2', array('type'=> 'password', 'size' => '20', 'label'=>'Repite Contraseña *','between'=>'<br/>'));
    
	echo $form->input('User.status', array(
				'label' => 'Tipo de usuario *',
				'between'=>'<br/>',
				'type'=>'select',
				'empty'=>'-',
				'onchange' => 'cargarTipoUsuario(this)',
				'options' => array(
					'1'=>'Alumno',
					'5'=>'Tutor'
					) 
				));
				
				// Oculta o muestra el combo para elegir contenidos
				if ($this->data['User']['status']==1) 
				{		
					$displayCursos= 'block';
				} 
				else 
				{
					$displayCursos = 'none';
				}


    ?>
    
</fieldset>

<div id="comboCursos" style="display:<?php echo $displayCursos; ?>;">
	<fieldset>
		<legend>Cursos de prácticas</legend>
		<p>Por favor seleccione los cursos en los que vaya a realizar prácticas clínicas</p>
		<?php    
		echo $form->input('User.info.4', array('label'=>'4º','type'=>'checkbox'));
		echo $form->input('User.info.5', array('label'=>'5º','type'=>'checkbox'));
		echo $form->input('User.info.6', array('label'=>'6º','type'=>'checkbox'));
	    ?>
	</fieldset>
</div>

<fieldset>
	<legend>Código de seguridad</legend>
	<?php	
	echo $html->image("captcha/".$captcha_src, array("id"=>'captcha'));
	echo $form->input('User.code_captcha', array('label'=>false));
	?>	
</fieldset>

<?php
    echo $form->end('Guardar');
?>


    <div class="comentarioLOPD">
    	El tratamiento de los datos personales y el envío de comunicaciones por medios electrónicos están ajustados a la normativa establecida en la Ley Orgánica 15/1999,13 de diciembre, de Protección de Datos de Carácter Personal (B.O.E 14/12/1999) y en la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y de Comercio Electrónico (B.O.E. 12/07/2002).
    </div>
    
    <div id="volver">
        <?php echo $html->link('<< Volver', array('controller'=>'portadas', 'action'=>'index')); ?>
    </div>
</div>