<div id="bloqueAdmin">
	
	<h1>¿Olvidó su contraseña?</h1>
	
	<p>
	En el caso que haya perdido su contraseña, puede recuperarla facílmente a traves de este formulario. Por favor, siga los pasos que se le indiquen.
	<p/>
	
	<?php
    echo $form->create('User', array('controller'=>'users','action'=>'newpassword'));
    
    echo $form->hidden('User.id');
    
    echo $form->input('User.passwd', array('type' => 'password', 'size'=>'20', 'label'=>'Introduzca su nueva contraseña:','between'=>'<br/>'));
    echo $form->input('User.passwd2', array('type'=> 'password', 'size' => '20', 'label'=>'Repita la nueva contraseña:','between'=>'<br/>'));
    
    echo $form->end('Guardar');
	?>

    <div class="comentarioLOPD">
    	El tratamiento de los datos personales y el envío de comunicaciones por medios electrónicos están ajustados a la normativa establecida en la Ley Orgánica 15/1999,13 de diciembre, de Protección de Datos de Carácter Personal (B.O.E 14/12/1999) y en la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y de Comercio Electrónico (B.O.E. 12/07/2002).
    </div>

</div>