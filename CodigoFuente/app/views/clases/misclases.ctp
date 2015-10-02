<?php echo $html->script('fancybox/jquery.fancybox-1.3.4.pack.js'); ?>
<?php echo $html->script('fancybox/jquery.easing-1.3.pack.js'); ?>
<?php echo $html->script('fancybox/jquery.mousewheel-3.0.4.pack.js'); ?>
<?php echo $html->css('/js/fancybox/jquery.fancybox-1.3.4'); ?>
<script type="text/javascript">
	jQuery(document).ready(function() {
		$(".inline").fancybox({
			'hideOnContentClick': true
		});
	});
</script>


<div id="bloqueAdmin">
<h1>Sesiones de Prácticas Clínicas</h1>

<fieldset>

<legend>Alumno</legend>

<p><strong>Nombre: </strong><?php echo $matricula['User']['nombre']; ?></p>
<p><strong>Apellidos: </strong><?php echo $matricula['User']['apellidos']; ?></p>
<p><strong>DNI: </strong><?php echo $matricula['User']['dni']; ?></p>

</fieldset>

<fieldset>

<legend>Práctica Clínica</legend>

<p><strong>Código: </strong><?php echo $matricula['Practica']['codigo']; ?></p>
<p><strong>Nombre: </strong><?php echo $matricula['Practica']['nombre']; ?></p>
<p><strong>Curso: </strong><?php echo $matricula['Practica']['curso']; ?></p>

</fieldset>

<table>
    <thead>
        <tr>
        	<th></th>
        	<th>Fecha</th>
            <th>Tutor</th>
            <th>Lugar</th>
            <th>Habilidades adquiridas</th>
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
        		<?php 
        		
        		if($clase['Clase']['revisada']==0)
				{
					echo $html->image('pendiente.png', array(
                    'alt' => 'Pendiente de revision',
                    'title' => 'Pendiente de revisión',
                    ));
        		}
				else
				{
					echo $html->image('ok.png', array(
                    'alt' => 'Practica revisada',
                    'title' => 'Práctica revisada por el tutor',
                    ));
				}
        		?>
        	</td>
            <td>
        		<?php echo $clase['Clase']['fecha']; ?>
        	</td>
        	<td>
        		<?php echo $clase['Tutor']['User']['nombre'].' '.$clase['Tutor']['User']['apellidos']; ?>
        	</td>
        	<td>
        		<?php echo $clase['Clase']['lugar']; ?>
        	</td>
        	<td>
        		 	        		
        		<?php 
        		        							
				echo $html->image('libro.png', array(
                    'alt' => 'Habilidades adquiridas',
                    'title' => 'Habilidades adquiridas',
                    'url' => array('controller'=>'clases', 'action' => 'verhabilidades', $clase['Clase']['id'])
                ));
				
				
				?>
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

<div class="boton">
    <?php echo $html->link('Añadir sesión', array('controller'=>'clases', 'action'=>'agregar', $idMatricula)) ?>
</div>

<div id="volver">
		<?php echo $html->link('<< Volver', array('controller'=>'matriculas', 'action'=>'mispracticas')); ?>
</div>

</div>