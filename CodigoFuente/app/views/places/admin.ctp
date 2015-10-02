<div id="bloqueAdmin">
<h1>Administrar lugares de prácticas</h1>
<table>
    <thead>
        <tr>
        	<th>Hospital</th>
            <th>Áreas</th>
            <th>Operaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
           
        if(!empty($lugares))
        {       
        
        $contador=0;
                    
        foreach($lugares as $lugar): 
        
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
        		<?php echo $lugar['Place']['hospital']; ?>
        	</td>
            <td>
        		<?php echo count($lugar['Area']); ?>
        	</td>
            <td><?php
            	echo $html->image('areas.png', array(
                    'alt' => 'Areas',
                    'title' => 'Áreas',
                    'url' => array('controller'=>'areas', 'action' => 'admin', $lugar['Place']['id'])
                ));     
                echo ' ';
                echo $html->image('editar.png', array(
                    'alt' => 'Editar',
                    'title' => 'Editar',
                    'url' => array('controller'=>'places', 'action' => 'editar', $lugar['Place']['id'])
                ));     
                echo ' ';
                echo $html->link($html->image('borrar.png', array(
                    'alt' => 'Borrar',
                    'title' => 'Borrar')),
                    array('controller' => 'places', 'action' => 'borrar', $lugar['Place']['id']),
                    array(
                    'escape'=>false,
                ), '¿Estás seguro de querer borrar el lugar de prácticas?');   
                               	   
            ?></td>
        </tr>
        <?php 
        endforeach; 
        }
        ?>
    </tbody>
</table>

<div class="boton">
    <?php echo $html->link('Añadir lugar', array('action'=>'agregar')) ?>
</div>

<div id="volver">
		<?php echo $html->link('<< Volver', array('controller'=>'users', 'action'=>'panelControl')); ?>
</div>

</div>