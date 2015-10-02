<div id="bloqueAdmin">

<div id="excel">
		<?php
		echo $html->image('excel.png', array(
	            'alt' => 'Exportar a Excel',
	            'title' => 'Exportar a Excel',
	            'url' => array('controller'=>'clases', 'action' => 'exceltotal', $idPractica)
	    	));
	    ?>
	</div>

<h1>Mis alumnos de Prácticas Clínicas</h1>
<table>
    <thead>
        <tr>
        	<th>Nombre</th>
            <th>Apellidos</th>
            <th>Dni</th>
            <th>Email</th>
            <th>Operaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $contador = 0;
            
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
        	   
        
        	<td>
        		<?php echo $alumno['User']['nombre']; ?>
        	</td>
            <td>
        		<?php echo $alumno['User']['apellidos']; ?>
        	</td>
        	<td>
        		<?php echo $alumno['User']['dni']; ?>
        	</td>
        	<td>
        		<?php echo $alumno['User']['email']; ?>
        	</td>
        	<td>
            <?php
            	echo $html->image('notas.png', array(
                    'alt' => 'Clases practicas',
                    'title' => 'Clases prácticas',
                    'url' => array('controller'=>'clases', 'action' => 'clasesalumno', $alumno['Matricula']['id_alumno'], $alumno['Matricula']['id_practica'])
                ));     
                echo ' ';  
				echo $html->image('tabla.png', array(
                    'alt' => 'Exportar a excel',
                    'title' => 'Exportar a Excel',
                    'url' => array('controller'=>'clases', 'action' => 'excel', $alumno['Matricula']['id_alumno'], $alumno['Matricula']['id_practica'])
                ));    	   
            ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div id="volver">
		<?php echo $html->link('<< Volver', array('controller'=>'practicas', 'action'=>'admintutores')); ?>
</div>

</div>