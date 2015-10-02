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
class Place extends AppModel 
{
    var $name = 'Place';
    
    var $hasMany = array(
		'Area' => array(
	    	'className' => 'Area',
	        'foreignKey' => 'id_place',
    		'dependent' => true
	    )   
	);
       
    var $validate = array(
            
            'hospital' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Por favor, introduzca el hospital donde se realizan las prácticas'
        	)
    );

   
}
?>