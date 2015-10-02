<div id="bloqueAdmin">
<h1>Sesiones de Prácticas Clínicas</h1>

<fieldset>

<legend>Alumno</legend>

<p><strong>Nombre: </strong><?php echo $alumno['User']['nombre']; ?></p>
<p><strong>Apellidos: </strong><?php echo $alumno['User']['apellidos']; ?></p>
<p><strong>DNI: </strong><?php echo $alumno['User']['dni']; ?></p>

</fieldset>

<fieldset>

<legend>Práctica Clínica</legend>

<p><strong>Código: </strong><?php echo $practica['Practica']['codigo']; ?></p>
<p><strong>Práctica: </strong><?php echo $practica['Practica']['nombre']; ?></p>
<p><strong>Curso: </strong><?php echo $practica['Practica']['curso'].'º'; ?></p>

</fieldset>

<table>
    <thead>
        <tr>
        	<th>Fecha</th>
            <th>Lugar</th>
            <th>Nota</th>
            <th>Observaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $contador = 0;
	
		if(!empty($clases))           
 		{

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
        		<?php echo $clase['Clase']['nota']; ?>
        	</td>
            <td>
        		<?php 
				if(!empty($clase['Clase']['observaciones_alumno'])) 
				{?>
            	<strong>Alumno:</strong><br/>
        		<?php echo $clase['Clase']['observaciones_alumno']; ?>
        		<br/>
        		<?php
        		}

				if(!empty($clase['Clase']['observaciones_tutor'])) 
				{
        		?>
        		<strong>Tutor:</strong><br/>
        		<?php echo $clase['Clase']['observaciones_tutor']; ?>
        		
        		<?php
        		}
        		?>
        	</td>
        </tr>
        <?php 
		endforeach; 
        }
        ?>
    </tbody>
</table>

<div id="volver">
		<?php echo $html->link('<< Volver', array('controller'=>'matriculas', 'action'=>'misalumnos', $practica['Practica']['id'])); ?>
</div>

</div>