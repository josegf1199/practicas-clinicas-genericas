<div id="bloqueAdmin">
<h1>Asignar lugares de prácticas</h1>

<fieldset>

<legend>Práctica Clínica</legend>

<p><strong>Código: </strong><?php echo $practica['Practica']['codigo']; ?></p>
<p><strong>Nombre: </strong><?php echo $practica['Practica']['nombre']; ?></p>
<p><strong>Curso: </strong><?php echo $practica['Practica']['curso'].'º'; ?></p>
</fieldset>

<table>
    <thead>
        <tr>
        	<th>Hospital</th>
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
            
            <td><?php
                echo $html->image('editar.png', array(
                    'alt' => 'Editar',
                    'title' => 'Editar',
                    'url' => array('controller'=>'lps', 'action' => 'editar', $lugar['Lp']['id'])
                ));     
                echo ' ';
                echo $html->link($html->image('borrar.png', array(
                    'alt' => 'Borrar',
                    'title' => 'Borrar')),
                    array('controller' => 'lps', 'action' => 'borrar', $lugar['Lp']['id']),
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
    <?php echo $html->link('Asignar lugar', array('action'=>'agregar',$practica['Practica']['id'])) ?>
</div>

<div id="volver">
		<?php echo $html->link('<< Volver', array('controller'=>'practicas', 'action'=>'admin')); ?>
</div>

</div>