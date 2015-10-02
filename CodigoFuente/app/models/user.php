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
class User extends AppModel 
{
    var $name = 'User';
           
    var $validate = array(
            'username'=>array(
					'vacio' => array(
	            		'rule' => 'notEmpty',
	            		'message' => 'Por favor, introduzca un nombre de usuario'
        			),
                    'alphaNumeric'=>array(
                        'rule' => array('custom', '/^[a-z0-9]*$/i'),
                        'required'=>true,
                        'message'=>'Sólo se pueden utilizar letras y números'
                    ),
                    'between'=>array(
                        'rule'=>array('between',5,15),
                        'message'=>'El nombre de usuario debe contener entre 5 y 15 caracteres'
                    ),
                    'unico'=>array(
                        'rule'=>array('isUnique'),
                        'message'=>'El nombre de usuario ya está en uso.',
                        'on' => 'create'
                    )
            ),
            'passwd'=>array(
                    'alphaNumeric'=>array(
                        'rule' => array('custom', '/^[a-z0-9]*$/i'),
                        'required'=>true,
                        'message'=>'La contraseña sólo puede tener letras y números'
                    ),
                    'comparacon'=>array(
                        'rule'=>array('compararPasswords'),
                        'message'=>'Las contraseñas introducidas no coinciden'
                    ),
	                'vacio' => array(
	            		'rule' => 'notEmpty',
	            		'message' => 'Por favor, introduzca una contraseña',
	            		'on' => 'create'
        			)
            ),
            'passwd2'=>array(
                    'alphaNumeric'=>array(
                    	'rule' => array('custom', '/^[a-z0-9]*$/i'),
                        'required'=>true,
                        'message'=>'La contraseña sólo puede tener letras y números'
                    ),
	                'vacio' => array(
	            		'rule' => 'notEmpty',
	            		'message' => 'Por favor, repita la contraseña',
	            		'on' => 'create'
        			)                                             
                            
            ),
            'nombre' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Por favor, introduzca su nombre'
        	),
        	'apellidos' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Por favor, introduzca sus apellidos'
	        ),
	        'dni' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Por favor, introduzca su dni'
	        ),
	        'status' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Por favor, introduzca el tipo de usuario',
	            'on' => 'create'
	        ),
	        'email'=>array(
	        		'email' => array(
	            		'rule' => 'Email',
	            		'message' => 'Por favor, introduzca una dirección de email'
	            	),
                    'emailUGR'=>array(
                        'rule'=>array('emailInstitucional'),
                        'message'=>'El email debe pertenecer a la Universidad de Granada'
                    ),
	                'vacio' => array(
	            		'rule' => 'notEmpty',
	            		'message' => 'Por favor, introduzca un email de contacto',
	            	)
            )
    );

    function compararPasswords($data) 
    {        
    	if ($data['passwd']==$this->data['User']['passwd2'])
	    {
    		return true;
		}
		else
		{
    		$data['passwd']=null;
    		return false;
		}
    }
    
    function emailInstitucional($data)
    {
    	$dominio = strstr($this->data['User']['email'], '@');
    	
    	if($dominio == '@ugr.es' || $dominio =='@correo.ugr.es')
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    	
    }
   
}
?>