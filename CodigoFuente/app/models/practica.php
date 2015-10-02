<?php
	class Practica extends AppModel 
	{
		var $name="Practica";
		
		var $hasMany = array(
	        'Lp' => array(
	            'className' => 'Lp',
	            'foreignKey' => 'id_practica',
				'dependent' => true
	        ),
	        'Tutor' => array(
	            'className' => 'Tutor',
	            'foreignKey' => 'id_practica',
	        	'dependent' => true
	        ),
	        'Conocimiento' => array(
	            'className' => 'Conocimiento',
	            'foreignKey' => 'id_practica',
	        	'dependent' => true
	        )          
	    );
						    
	    var $validate = array(
        'nombre' => array(
            'rule' => 'notEmpty',
            'message' => 'Por favor, introduzca el nombre de la práctica'
        ),
        'asignatura' => array(
            'rule' => 'notEmpty',
            'message' => 'Por favor, introduzca la asignatura de la práctica'
        ),
        'codigo'=>array(
				'vacio' => array(
	           		'rule' => 'notEmpty',
	           		'message' => 'Por favor, introduzca el código de la práctica'
        		),
                'unico'=>array(
                       'rule'=>array('isUnique'),
                        'message'=>'El código ya está en uso.',
                        'on' => 'create'
                    )
            )
    );
	}
?>