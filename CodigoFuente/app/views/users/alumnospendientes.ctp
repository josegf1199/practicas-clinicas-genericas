<div id="bloqueAdmin">
		
	<h1>Listado de Alumnos pendientes de validación</h1>
		
	<?php
		if(!empty($alumnos))
		{
		echo $form->create('User', array('controller'=>'users','action'=>'alumnospendientes'));	
		}
	?>
		<table>
	    <thead>
	        <tr>
	            <th>Nombre</th>
	            <th>Apellidos</th>
	            <th>Dni</th>
	            <th>Cursos de prácticas</th>
	            <th>Validar</th>
	        </tr>
	    </thead>
	    <tbody>
	        <?php 
	       	if(!empty($alumnos))
			{

			$contador=0;

	    	foreach($alumnos as $alumno): 
	    	
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
	        
	            <td><?php echo $alumno['User']['nombre']; ?></td>
	            <td><?php echo $alumno['User']['apellidos']; ?></td>
	            <td><?php echo $alumno['User']['dni']; ?></td>
	            <td>
	            <?php 
					if(empty($alumno['User']['info']))
					{
						echo 'No ha seleccionado cursos';
					}
					else
					{
						echo ' | ';

						$cursos = unserialize($alumno['User']['info']);

						foreach($cursos as $cursos=>$selec)
						{
							if($selec)
							{
								echo $cursos.'º';
								echo ' | ';
							}
						}
					}
				 ?></td>	            
	            <td>
	            <?php
	            
	            	echo $form->input('User.matricula.'.$alumno['User']['id'], array('label'=>false,'type'=>'checkbox'));
					
	            ?>	
	            </td>
	        </tr>
	        <?php endforeach; 
	        }
			?>
	    </tbody>
	</table>
		
	<?php
	if(!empty($alumnos))
	{
    	echo $form->end('Guardar');
	}
	else
	{
	?>
		<p>No existen alumnos pendientes de validación<p>
	<?php
	}
    ?>
	
	
	<div id="volver">
		<?php 
			echo $html->link('<< Volver', array('controller'=>'users', 'action'=>'admin'));
		?>
	</div>

</div>