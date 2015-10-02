<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of user
 *
 * @author Gerardo
 */
class Conocimiento extends AppModel 
{
    var $name = 'Conocimiento';
    
    var $belongsTo = array(
		'Practica' => array(
	    	'className' => 'Practica',
	        'foreignKey' => 'id_practica'
		)
	);
    
    var $validate = array(
            
            'nombre' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Por favor, debe introducir una habilidad'
        	)
    );

   
}
?>