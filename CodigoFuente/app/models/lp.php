<?php
	class Lp extends AppModel 
	{
		var $name='Lp';
		
		var $belongsTo = array(
			'Place' => array(
	            'className' => 'Place',
	            'foreignKey' => 'id_place'
			),
	       	'Practica' => array(
	            'className' => 'Practica',
	            'foreignKey' => 'id_practica'
			)
	    );
		    
	}
?>