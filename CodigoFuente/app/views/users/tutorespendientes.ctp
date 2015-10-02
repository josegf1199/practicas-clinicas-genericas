<div id="bloqueAdmin">
		
	<h1>Listado de Tutores pendientes de validación</h1>
		
	<?php
		if(!empty($tutores))
		{
		echo $form->create('User', array('controller'=>'users','action'=>'tutorespendientes'));	
		}
	?>
		<table>
	    <thead>
	        <tr>
	            <th>Nombre</th>
	            <th>Apellidos</th>
	            <th>Dni</th>
	            <th>Validar</th>
	        </tr>
	    </thead>
	    <tbody>
	        <?php 
	       	if(!empty($tutores))
			{

			$contador=0;

	    	foreach($tutores as $tutor): 
	    	
			if($contador%2 == 0)
	        {
	            echo '<tr class="filapar">';	
	        }
	        else
		    {
		        echo '<tr class="filaimpar">';	
		    }
		    $contador++;
	    	
	    	?>
	        
	            <td><?php echo $tutor['User']['nombre']; ?></td>
	            <td><?php echo $tutor['User']['apellidos']; ?></td>
	            <td><?php echo $tutor['User']['dni']; ?></td>
	                      
	            <td>
	            <?php
	            
	            	echo $form->input('User.matricula.'.$tutor['User']['id'], array('label'=>false,'type'=>'checkbox'));
					
	            ?>	
	            </td>
	        </tr>
	        <?php endforeach; 
	        }
			?>
	    </tbody>
	</table>
		
	<?php
	if(!empty($tutores))
	{
    	echo $form->end('Guardar');
	}
	else
	{
	?>
		<p>No existen tutores pendientes de validación<p>
	<?php
	}
    ?>
	
	
	<div id="volver">
		<?php 
			echo $html->link('<< Volver', array('controller'=>'users', 'action'=>'admin'));
		?>
	</div>

</div>