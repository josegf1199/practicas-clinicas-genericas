<div id="bloqueAdmin">
<h1>Administrar áreas de prácticas</h1>

<fieldset>

<legend>Lugar de Prácticas</legend>
<p><?php echo $lugar['Place']['hospital']; ?></p>

</fieldset>

<table>
    <thead>
        <tr>
        	<th>Área</th>
            <th>Operaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
           
        if(!empty($areas))
        {       
        
        $contador=0;
                    
        foreach($areas as $area): 
        
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
        		<?php echo $area['Area']['nombre']; ?>
        	</td>
            
            <td>
            <?php
                echo $html->image('editar.png', array(
                    'alt' => 'Editar',
                    'title' => 'Editar',
                    'url' => array('controller'=>'areas', 'action' => 'editar', $area['Area']['id'])
                ));     
                echo ' ';
                echo $html->link($html->image('borrar.png', array(
                    'alt' => 'Borrar',
                    'title' => 'Borrar')),
                    array('controller' => 'areas', 'action' => 'borrar', $area['Area']['id']),
                    array(
                    'escape'=>false,
                ), '¿Estás seguro de querer borrar el área de prácticas?');   
                               	   
            ?></td>
        </tr>
        <?php 
        endforeach; 
        }
        ?>
    </tbody>
</table>

<div class="boton">
    <?php echo $html->link('Añadir area', array('action'=>'agregar', $lugar['Place']['id'])) ?>
</div>

<div id="volver">
		<?php echo $html->link('<< Volver', array('controller'=>'places', 'action'=>'admin')); ?>
</div>

</div>