<?php
	class Tutor extends AppModel 
	{
		var $name="Tutor";
		var $useTable="tutores";
		
		var $belongsTo = array(
	       'Practica' => array(
	            'className' => 'Practica',
	            'foreignKey' => 'id_practica'
			),
		    'User' => array(
	            'className' => 'User',
	            'foreignKey' => 'id_user'
			)
	    );
		    
	}
?>