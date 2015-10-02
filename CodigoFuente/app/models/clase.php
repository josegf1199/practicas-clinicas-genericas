<?php
	class Clase extends AppModel 
	{
		var $name="Clase";
				
		var $belongsTo = array(
			'Matricula' => array(
	            'className' => 'Matricula',
	            'foreignKey' => 'id_matricula'
			),
	        'Practica' => array(
	            'className' => 'Practica',
	            'foreignKey' => 'id_practica'
			),
		    'User' => array(
	            'className' => 'User',
	            'foreignKey' => 'id_user'
			),
		    'Tutor' => array(
	            'className' => 'Tutor',
	            'foreignKey' => 'id_tutor'
			)
	    );
		    
	}
?>