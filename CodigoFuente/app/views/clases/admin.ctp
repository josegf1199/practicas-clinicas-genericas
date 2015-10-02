<div id="bloqueAdmin">
<h1>Sesiones de Prácticas Clínicas pendientes de revisión</h1>

<fieldset>

	<legend>Práctica Clínica</legend>
	
	<p><strong>Código: </strong><?php echo $practica['Practica']['codigo']; ?></p>
	<p><strong>Practica: </strong><?php echo $practica['Practica']['nombre']; ?></p>
	<p><strong>Curso: </strong><?php echo $practica['Practica']['curso'].'º'; ?></p>
	
</fieldset>

<table>
    <thead>
        <tr>
        	<th>Fecha</th>
            <th>Lugar</th>
            <th>Alumno</th>
            <th>Operaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
           
        if(!empty($clases))
        {       
        
        $contador=0;
                    
        foreach($clases as $clase): 
        
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
        		<?php echo $clase['Clase']['fecha']; ?>
        	</td>
        
        	<td>
        		<?php echo $clase['Clase']['lugar']; ?>
        	</td>
        
        	<td>
        		<?php echo $clase['User']['nombre'].' '.$clase['User']['apellidos']; ?>
        	</td>
            
            <td><?php
                echo $html->image('editar.png', array(
                    'alt' => 'Editar',
                    'title' => 'Editar',
                    'url' => array('controller'=>'clases', 'action' => 'editar', $clase['Clase']['id'])
                ));     
                echo ' ';
                echo $html->link($html->image('borrar.png', array(
                    'alt' => 'Borrar',
                    'title' => 'Borrar')),
                    array('controller' => 'clases', 'action' => 'borrar', $clase['Clase']['id']),
                    array(
                    'escape'=>false,
                ), '¿Estás seguro de querer borrar la clase práctica?');   
                               	   
            ?></td>
        </tr>
        <?php 
        endforeach; 
        }
        ?>
    </tbody>
</table>

<div id="volver">
		<?php echo $html->link('<< Volver', array('controller'=>'practicas', 'action'=>'admintutores')); ?>
</div>

</div>