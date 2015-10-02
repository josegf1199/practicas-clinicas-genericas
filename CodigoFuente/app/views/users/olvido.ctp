<div id="bloqueAdmin">
	
	<h1>¿Olvidó su contraseña?</h1>
	
	<p>
	En el caso que haya perdido su contraseña, puede recuperarla fácilmente a través de este formulario. Por favor, siga los pasos que se le indiquen.
	<p/>
	
	<?php
    echo $form->create('User', array('controller'=>'users','action'=>'olvido'));
    ?>
    
    <fieldset>
		<legend>Introduzca su dirección de E-mail</legend>
    <?php
	echo $form->input('User.email', array('size'=>'80','label'=>false));
	?>
	</fieldset>
	
	<fieldset>
		<legend>Código de seguridad</legend>
		<?php	
		echo $html->image("captcha/".$captcha_src, array("id"=>'captcha'));
		echo $form->input('User.code_captcha', array('label'=>false));
		?>	
	</fieldset>
	
	<?php
    echo $form->end('Enviar >>');
	?>

    <div class="comentarioLOPD">
    	El tratamiento de los datos personales y el envío de comunicaciones por medios electrónicos están ajustados a la normativa establecida en la Ley Orgánica 15/1999,13 de diciembre, de Protección de Datos de Carácter Personal (B.O.E 14/12/1999) y en la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y de Comercio Electrónico (B.O.E. 12/07/2002).
    </div>
    
    <div id="volver">
        <?php echo $html->link('<< Volver', array('action'=>'login')); ?>
    </div>

</div>