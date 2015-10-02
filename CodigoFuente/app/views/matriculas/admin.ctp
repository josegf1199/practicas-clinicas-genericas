<div id="bloqueAdmin">
<h1>Administrar matrículas de prácticas</h1>

<fieldset>

<legend>Práctica Clínica</legend>

<p><strong>Código: </strong><?php echo $practica['Practica']['codigo']; ?></p>
<p><strong>Práctica: </strong><?php echo $practica['Practica']['nombre']; ?></p>
<p><strong>Curso: </strong><?php echo $practica['Practica']['curso'].'º'; ?></p>
</fieldset>

<table>
    <thead>
        <tr>
        	<th>Alumno</th>
            <th>Validación</th>
            <th>Operaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
           
        if(!empty($matriculas))
        {       
        
        $contador=0;
                    
        foreach($matriculas as $mat): 
        
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
        
        	<td>
        		<?php echo $mat['User']['nombre'].' '.$mat['User']['apellidos']; ?>
        	</td>
            <td>
        		<?php 
        		if($mat['Matricula']['bloqueado']==1)
        		{
        			echo 'Pendiente';
        		}
        		else
        		{
        			echo 'Validada';
        		}
        		?>
        	</td>
            <td><?php
                echo $html->image('editar.png', array(
                    'alt' => 'Editar',
                    'title' => 'Editar',
                    'url' => array('controller'=>'matriculas', 'action' => 'editar', $mat['Matricula']['id'])
                ));     
                echo ' ';
                echo $html->link($html->image('borrar.png', array(
                    'alt' => 'Borrar',
                    'title' => 'Borrar')),
                    array('controller' => 'matriculas', 'action' => 'borrar', $mat['Matricula']['id']),
                    array(
                    'escape'=>false,
                ), '¿Estás seguro de querer borrar la matrícula?');   
                               	   
            ?></td>
        </tr>
        <?php 
        endforeach; 
        }
        ?>
    </tbody>
</table>

<div class="boton">
    <?php echo $html->link('Crear Matrícula', array('action'=>'agregar',$idPractica)) ?>
</div>

<div id="volver">
		<?php echo $html->link('<< Volver', array('controller'=>'practicas', 'action'=>'admin')); ?>
</div>

</div>