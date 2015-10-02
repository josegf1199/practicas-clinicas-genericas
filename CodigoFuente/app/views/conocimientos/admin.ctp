<div id="bloqueAdmin">
<h1>Administrar habilidades de prácticas</h1>

<fieldset>

<legend>Práctica Clínica</legend>

<p><strong>Código: </strong><?php echo $practica['Practica']['codigo']; ?></p>
<p><strong>Nombre: </strong><?php echo $practica['Practica']['nombre']; ?></p>
<p><strong>Curso: </strong><?php echo $practica['Practica']['curso'].'º'; ?></p>
</fieldset>

<table>
    <thead>
        <tr>
        	<th>Habilidad</th>
            <th>Operaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
           
        if(!empty($conocimientos))
        {       
        
        $contador=0;
                    
        foreach($conocimientos as $cono): 
        
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
        		<?php echo $cono['Conocimiento']['nombre']; ?>
        	</td>
            <td><?php
                echo $html->image('editar.png', array(
                    'alt' => 'Editar',
                    'title' => 'Editar',
                    'url' => array('controller'=>'conocimientos', 'action' => 'editar', $cono['Conocimiento']['id'])
                ));     
                echo ' ';
                echo $html->link($html->image('borrar.png', array(
                    'alt' => 'Borrar',
                    'title' => 'Borrar')),
                    array('controller' => 'conocimientos', 'action' => 'borrar', $cono['Conocimiento']['id']),
                    array(
                    'escape'=>false,
                ), '¿Estás seguro de querer borrar esta habilidad?');   
                               	   
            ?></td>
        </tr>
        <?php 
        endforeach; 
        }
        ?>
    </tbody>
</table>

<div class="boton">
    <?php echo $html->link('Añadir habilidad', array('action'=>'agregar', $practica['Practica']['id'])) ?>
</div>

<div id="volver">
		<?php echo $html->link('<< Volver', array('controller'=>'practicas', 'action'=>'admin')); ?>
</div>

</div>