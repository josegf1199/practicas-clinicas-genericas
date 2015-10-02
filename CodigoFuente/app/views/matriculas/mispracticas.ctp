<div id="bloqueAdmin">
<h1>Mis Prácticas Clínicas</h1>
<table>
    <thead>
        <tr>
        	<th>Código</th>
            <th>Nombre</th>
            <th>Curso</th>
            <th>Operaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $contador = 0;

        foreach($asignaturas as $asignatura): 
            
          
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
        		<?php echo $asignatura['Practica']['codigo']; ?>
        	</td>
            <td>
        		<?php echo $asignatura['Practica']['nombre']; ?>
        	</td>
        	<td>
        		<?php echo $asignatura['Practica']['curso'].'º'; ?>
        	</td>
        	<td>
            <?php
            
            	if($asignatura['Practica']['bloqueado']==0)
				{
            		echo $html->image('notas.png', array(
                 	 	'alt' => 'Clases practicas',
                    	'title' => 'Clases prácticas',
                    	'url' => array('controller'=>'clases', 'action' => 'misclases', $asignatura['Matricula']['id'])
                	)); 
				}
				else
				{
					echo 'Inactiva';
				}    
                      	   
            ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div id="volver">
		<?php echo $html->link('<< Volver', array('controller'=>'portadas', 'action'=>'index')); ?>
</div>

</div>