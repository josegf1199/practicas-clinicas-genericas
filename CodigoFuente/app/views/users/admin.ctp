<div id="bloqueAdmin">
		
	<h1>Listado de Usuarios</h1>
	
	<div id="volver">
		<?php echo $html->link('Validación de alumnos >>', array('controller'=>'users','action'=>'alumnospendientes')); ?>
	</div>
	
	<div id="volver">
		<?php echo $html->link('Validación de tutores >>', array('controller'=>'users','action'=>'tutorespendientes')); ?>
	</div>
	
	<fieldset>
		<legend>Filtros de busqueda</legend>
		
		<?php
		
		echo $form->create('User', array('controller'=>'users','action'=>'admin'));
						
		echo $form->input('Filtro.status', array(
				'label' => 'Tipo de usuario',
				'empty' => 'Todos',
				'between'=>'<br/>',
				'type'=>'select',
				'options' => array(
					'10'=>'Administradores',
					'5'=>'Tutores',
					'1'=>'Alumnos'
					) 
				));
		
		echo '<br/>';
				
		echo $form->input('Filtro.username', array('size' => '20', 'between'=>'<br/>','label'=>'Nombre de Usuario'));
		
		echo $form->input('Filtro.nombre', array('size' => '20', 'between'=>'<br/>','label'=>'Nombre'));
		
		echo $form->input('Filtro.apellidos', array('size' => '20', 'between'=>'<br/>','label'=>'Apellidos'));
		
		echo $form->input('Filtro.dni', array('size' => '20', 'between'=>'<br/>','label'=>'Dni'));
						
		echo $form->end('Buscar');
		
		?>
		
	</fieldset>
	
	<br/>
	<?php
		
	?>
		<table>
	    <thead>
	        <tr>
	            <th>Nombre</th>
	            <th>Apellidos</th>
	            <th>Dni</th>
	            <th>Acciones</th>
	        </tr>
	    </thead>
	    <tbody>
	        <?php 
	    	if(!empty($usuarios))
			{ 	
		
			$contador=0;

	    	foreach($usuarios as $usuario): 
	    	
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
	        
	            <td><?php echo $usuario['User']['nombre']; ?></td>
	            <td><?php echo $usuario['User']['apellidos']; ?></td>
	            <td><?php echo $usuario['User']['dni']; ?></td>
	            	            
	            <td>
	            <?php
	                echo $html->image('editar.png', array(
	                    'alt' => 'Editar',
	                    'title' => 'Editar',
	                    'url' => array('controller'=>'users', 'action' => 'editar', $usuario['User']['id'])
	                ));
	                echo '&nbsp;';
	                echo $html->link($html->image('borrar.png', array(
	                    'alt' => 'Borrar',
	                    'title' => 'Borrar')),
	                    array('controller' => 'users', 'action' => 'borrar', $usuario['User']['id']),
	                    array(
	                    'escape'=>false,
	                ), '¿Estás seguro de querer borrar este usuario?');
	            ?>	
	            </td>
	        </tr>
	        <?php endforeach; 
	        }
	        ?>
	    </tbody>
	</table>
	
	<div class="boton">
		<?php echo $html->link('Nuevo Usuario', array('action'=>'add')); ?>
	</div>
	
	
	
	<div id="volver">
		<?php 
			echo $html->link('<< Volver', array('controller'=>'users', 'action'=>'panelControl'));
		?>
	</div>

</div>