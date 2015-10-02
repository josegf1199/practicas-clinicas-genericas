<div id="bloqueContenido">

		<div class="bloqueLogin">
<?php
		
		$Usuario=$session->read('Auth.User');
			
		if(!empty($Usuario))
		{
			?>
			<div class="bienvenida">Bienvenido</div>
			<div class="saludo"><?php echo $Usuario['username']; ?></div>
			<?php
			if ($Usuario['status']==10) 
			{
				echo $html->link('Administración',array('controller'=>'users','action'=>'panelControl'));
		    }
			else if($Usuario['status']==5)
			{
				echo $html->link('Mis datos',array('controller'=>'users','action'=>'editardatos'));
				echo $html->link('Mis practicas',array('controller'=>'practicas','action'=>'admintutores'));
			}
			else
			{
				if(empty($matriculado))
				{
					echo $html->link('Mis datos',array('controller'=>'users','action'=>'editardatos'));
					echo $html->link('Elegir prácticas',array('controller'=>'matriculas','action'=>'primeramatricula'));
				}
				else
				{
					echo $html->link('Mis datos',array('controller'=>'users','action'=>'editardatos'));
					echo $html->link('Mis practicas',array('controller'=>'matriculas','action'=>'mispracticas'));
					echo $html->link('Solicitar nuevas prácticas',array('controller'=>'matriculas','action'=>'matricular'));
				}
	        }
			
	        echo $html->link('Cerrar sesión',array('controller'=>'users','action'=>'logout'));
		}
		else
		{
			echo $form->create('User', array('controller'=>'users','action'=>'identificar'));
	        echo $form->input('username', array('between'=>'<br/>', 'label'=>'Usuario'));
	        echo $form->input('password', array('between'=>'<br/>', 'label'=>'Contraseña'));
	        echo $form->end('Entrar >>');
	        ?>
	        <div class="registro">
        		<?php echo $html->link('Regístrate',array('controller'=>'users','action'=>'registro'));?>
			</div>
			<div class="registro">
        		<?php echo $html->link('Olvidé mi contraseña',array('controller'=>'users','action'=>'olvido'));?>
			</div>
	    <?php    
        } 
        ?>
		</div>
</div>