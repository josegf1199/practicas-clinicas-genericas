<div id="bloqueAdmin">
<h1>Prácticas Clínicas</h1>
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
            
        foreach($practicas as $practica): 
            
          
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
        		<?php echo $practica['Practica']['codigo']; ?>
        	</td>
            <td>
        		<?php echo $practica['Practica']['nombre']; ?>
        	</td>
        	<td>
        		<?php echo $practica['Practica']['curso'].'º'; ?>
        	</td>
            <td>
            <?php
            
            	if($practica['Practica']['bloqueado']==1)
				{
					echo 'Inactiva';
				}
				else
				{
               	echo $html->image('alumnos.png', array(
                    'alt' => 'Alumnos',
                    'title' => 'Alumnos',
                    'url' => array('controller'=>'matriculas', 'action' => 'misalumnos', $practica['Practica']['id'])
                ));    
				echo ' '; 
                echo $html->image('clases.png', array(
                    'alt' => 'Clases de practicas',
                    'title' => 'Clases de prácticas pendientes de revisión',
                    'url' => array('controller'=>'clases', 'action' => 'admin', $practica['Practica']['id'])
                ));  
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