<?php
	class Matricula extends AppModel 
	{
		var $name="Matricula";
				
		var $belongsTo = array(
	       'Practica' => array(
	            'className' => 'Practica',
	            'foreignKey' => 'id_practica'
			),
		    'User' => array(
	            'className' => 'User',
	            'foreignKey' => 'id_alumno'
			)
	    );
		    
	}
?>