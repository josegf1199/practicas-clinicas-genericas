<div id="bloqueAdmin">
<h1>Administrar tutores de prácticas</h1>

<fieldset>

<legend>Práctica Clínica</legend>

<p><strong>Código: </strong><?php echo $practica['Practica']['codigo']; ?></p>
<p><strong>Nombre: </strong><?php echo $practica['Practica']['nombre']; ?></p>
<p><strong>Curso: </strong><?php echo $practica['Practica']['curso'].'º'; ?></p>
</fieldset>

<table>
    <thead>
        <tr>
        	<th>Nombre</th>
            <th>Apellidos</th>
            <th>Dni</th>
            <th>Operaciones</th>
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
        
        	<td>
        		<?php echo $tutor['User']['nombre']; ?>
        	</td>
            <td>
        		<?php echo $tutor['User']['apellidos']; ?>
        	</td>
        	<td>
        		<?php echo $tutor['User']['dni']; ?>
        	</td>
            <td><?php
                echo $html->image('editar.png', array(
                    'alt' => 'Editar',
                    'title' => 'Editar',
                    'url' => array('controller'=>'tutores', 'action' => 'editar', $tutor['Tutor']['id'])
                ));     
                echo ' ';
                echo $html->link($html->image('borrar.png', array(
                    'alt' => 'Borrar',
                    'title' => 'Borrar')),
                    array('controller' => 'tutores', 'action' => 'borrar', $tutor['Tutor']['id']),
                    array(
                    'escape'=>false,
                ), '¿Estás seguro de querer borrar el tutor de prácticas?');   
                               	   
            ?></td>
        </tr>
        <?php 
        endforeach; 
        }
        ?>
    </tbody>
</table>

<div class="boton">
    <?php echo $html->link('Asignar tutor', array('action'=>'agregar',$idPractica)) ?>
</div>

<div id="volver">
		<?php echo $html->link('<< Volver', array('controller'=>'practicas', 'action'=>'admin')); ?>
</div>

</div>