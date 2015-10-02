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
class Area extends AppModel 
{
    var $name = 'Area';
        
	var $belongsTo = array(
			'Place' => array(
	            'className' => 'Place',
	            'foreignKey' => 'id_place'
			)
	    );
       
    var $validate = array(
            
            'nombre' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Por favor, introduzca el nombre del área'
        	)
    );

   
}
?>