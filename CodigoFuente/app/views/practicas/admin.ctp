<div id="bloqueAdmin">
<h1>Administrar Prácticas Clínicas</h1>
<table>
    <thead>
        <tr>
        	<th></th>
        	<th><?php echo $paginator->sort('Código', 'codigo'); ?></th>
            <th><?php echo $paginator->sort('Nombre', 'nombre'); ?></th>
            <th><?php echo $paginator->sort('Curso', 'curso'); ?></th>
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
        		<?php 
        		if($practica['Practica']['bloqueado']==1)
				{
					echo $html->image('bloqueado.png', array(
                		'alt' => 'Inactiva',
                    	'title' => 'Inactiva',
                    )); 
                }
				else
				{
					echo $html->image('ok.png', array(
                		'alt' => 'Activa',
                    	'title' => 'Activa',
                    ));
				}	
                ?>
        	</td>       
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
            	echo $html->image('alumnos.png', array(
                    'alt' => 'Alumnos',
                    'title' => 'Alumnos',
                    'url' => array('controller'=>'matriculas', 'action' => 'admin', $practica['Practica']['id'])
                ));     
                echo ' ';
            	echo $html->image('lugares.png', array(
                    'alt' => 'Lugares',
                    'title' => 'Lugares',
                    'url' => array('controller'=>'lps', 'action' => 'admin', $practica['Practica']['id'])
                ));     
                echo ' ';
				echo $html->image('conocimiento.png', array(
                    'alt' => 'Habilidades',
                    'title' => 'Habilidades',
                    'url' => array('controller'=>'conocimientos', 'action' => 'admin', $practica['Practica']['id'])
                ));     
                echo ' ';
            	echo $html->image('tutores.png', array(
                    'alt' => 'Tutores',
                    'title' => 'Tutores',
                    'url' => array('controller'=>'tutores', 'action' => 'admin', $practica['Practica']['id'])
                ));     
                echo ' ';
                echo $html->image('editar.png', array(
                    'alt' => 'Editar',
                    'title' => 'Editar',
                    'url' => array('controller'=>'practicas', 'action' => 'editar', $practica['Practica']['id'])
                ));     
                echo ' ';
                echo $html->link($html->image('borrar.png', array(
                    'alt' => 'Borrar',
                    'title' => 'Borrar')),
                    array('controller' => 'practicas', 'action' => 'borrar', $practica['Practica']['id']),
                    array(
                    'escape'=>false,
                ), '¿Estás seguro de querer borrar la practica?');   
                       	   
            ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="boton">
    <?php echo $html->link('Añadir Práctica', array('action'=>'agregar')) ?>
</div>

<div id="volver">
		<?php echo $html->link('<< Volver', array('controller'=>'users', 'action'=>'panelControl')); ?>
</div>

</div>