<div id="bloqueAdmin">

	<h1>Solicitud de matrícula en Prácticas Clínicas</h1>
	
	<?php
    	echo $form->create('Primera', array('url'=>array('controller'=>'matriculas','action'=>'primeramatricula')));
	?>
	
	<fieldset>
		<legend>Elige las prácticas</legend>
	
		<?php
		$contador = 0;

		foreach ($opciones as $curso => $practicas)
		{
		?>
			<fieldset>
			<legend><?php echo 'Curso '.$curso.'º'; ?></legend>	
			
			<?php
					
			foreach($practicas as $practica)
			{
				$nombre = '('.$practica['Practica']['codigo'].') '.$practica['Practica']['nombre'];
				echo $form->input('Operacion.'.$contador, array('type'=>'checkbox', 'label'=>$nombre, 'value'=>$practica['Practica']['id']));
				$contador++;
			}
			?>
			
			</fieldset>
		<?php
		}	
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
    
    <div id="volver">
        <?php echo $html->link('<< Volver', array('controller'=>'portadas', 'action'=>'index')); ?>
    </div>
</div>