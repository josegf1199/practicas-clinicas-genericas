<div id="bloqueAdmin">

	<h1>Solicitud de matrícula en Prácticas Clínicas</h1>
	
	<?php
	if(!empty($practicas))
	{
	?>
	
	<?php
    	echo $form->create('Matricula', array('controller'=>'matriculas','action'=>'matricular'));
	?>
		
	<fieldset>
		<legend>Elige la práctica</legend>
	    <?php    
	    
	    echo $form->hidden('Matricula.bloqueado', array('value'=>1));
	    echo $form->hidden('Matricula.grupo', array('value'=>0));
	    
	    echo $form->input('Matricula.id_practica', array(
					'label' => 'Listado de prácticas clínicas',
					'between'=>'<br/>',
					'type'=>'select',
					'options' => $practicas 
					));
	        ?>
	    
	</fieldset>
	
	<fieldset>
		<legend>Código de seguridad</legend>
		<?php	
		echo $html->image("captcha/".$captcha_src, array("id"=>'captcha'));
		echo $form->input('Matricula.code_captcha', array('label'=>false));
		?>	
	</fieldset>
	
	<?php
	    echo $form->end('Guardar');
	?>


    <div class="comentarioLOPD">
    	El tratamiento de los datos personales y el envío de comunicaciones por medios electrónicos están ajustados a la normativa establecida en la Ley Orgánica 15/1999,13 de diciembre, de Protección de Datos de Carácter Personal (B.O.E 14/12/1999) y en la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y de Comercio Electrónico (B.O.E. 12/07/2002).
    </div>
    
    <?php
    }
	else
	{
	?>

		<p class="Aviso">
			Actualmente no existe ninguna práctica disponible.
		</p>
	<?php
	}
    ?>
    
    <div id="volver">
        <?php echo $html->link('<< Volver', array('controller'=>'portadas', 'action'=>'index')); ?>
    </div>
</div>