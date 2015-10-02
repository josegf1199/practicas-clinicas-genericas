<?php

ini_set('memory_limit','64M');
set_time_limit(500);


/** 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 *
 * La contraseña original es: 349b3c67a8fbf131d0ab233bde6d41005105579a
 */

/**
 * Description of users_controller
 *
 * @author Gerardo
 */
class UsersController extends AppController 
{
    var $name = 'Users';
    var $helpers = array('Excel','Html', 'Form', 'Javascript', 'Session');
    var $components = array('Email','Captcha','Ticketmaster');
    var $uses = array('User');
    
    var $paginate = array(
            'limit' => 50,
            'order' => 'User.username DESC'
    );
    
    function identificar()
	{
		if(!empty($this->data)) 
        {
        	$usuario = $this->User->findByUsername($this->data['User']['username']);
        	        	    	
        	if(!empty($usuario))
            {
        		if($usuario['User']['bloqueado']==1)
	        	{
	        		$this->Session->setFlash('Lo sentimos. Su cuenta todavía está pendiente de validación por parte de la administración.');
	        		$this->redirect(array('controller'=>'portadas', 'action'=>'index'));
	        	}
	            else
		        {
		        	if ($this->Auth->login($this->data)) 
		            {
			            if(empty($usuario['User']['info']))
			            {
			            	$this->Session->write('matriculado',1);
			            }
		            	$this->Session->setFlash('Se ha identificado corréctamente. Ya puede acceder a las zonas privadas de la Web.');
		            } 
		            else 
		            {
		                $this->Session->setFlash('El usuario o la contraseña no son válidos. Por favor, inténtalo de nuevo');
		            }
		           
		            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
		            
		        }
	        }
		    else
			{
			    $this->Session->setFlash('El usuario introducido no existe');
	        	$this->redirect(array('controller'=>'portadas', 'action'=>'index'));	
			}
		}
		else
		{
			$this->redirect(array('controller'=>'portadas', 'action'=>'index'));	
		}
	}
        
    function login() 
    {
    	$this->redirect(array('controller'=>'portadas', 'action'=>'index'));
    }

    function logout() 
    {
    	$this->Session->destroy();
    	$this->redirect($this->Auth->logout());
    }
    	
    function editar($id=null) 
    {   
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
            	
        
		$this->layout = "principal";

        if (!empty($this->data)) 
        {
            $this->convertirPasswd();
            
            $this->data['User']['nombre']=ucwords(strtolower($this->data['User']['nombre']));
	        $this->data['User']['apellidos']=ucwords(strtolower($this->data['User']['apellidos']));
	        $this->data['User']['dni']=strtoupper($this->data['User']['dni']);
	        $this->data['User']['email']=strtolower($this->data['User']['email']);
            
            if ($this->User->save($this->data)) 
            {   
            	$this->Session->setFlash('Se han actualizado los datos del usuario correctamente');
	            $this->redirect(array('action'=>'admin'));
	        } 
        }  
        else 
        {
        	if (!$id) 
	        {
	            $this->Session->setFlash('No has proporcionado un usuario para editarlo');
	            $this->redirect(array('action'=>'admin'));
	        }
	        
	        $usuario = $this->User->read(null, $id);
	        if (!$usuario) 
	        {
	            $this->Session->setFlash('El usuario que quieres editar no existe');
	            $this->redirect(array('action'=>'admin'));
	        }
        
	        $this->data = $usuario;
	        
	    }
    }
    
    
    function editardatos() 
    {    
    	$id = $this->Auth->user('id');
    	
    	$this->layout = "principal";
    	
        if (!empty($this->data)) 
        {
            $this->convertirPasswd();
            
            $this->data['User']['nombre']=ucwords(strtolower($this->data['User']['nombre']));
	        $this->data['User']['apellidos']=ucwords(strtolower($this->data['User']['apellidos']));
	        $this->data['User']['dni']=strtoupper($this->data['User']['dni']);
	        $this->data['User']['email']=strtolower($this->data['User']['email']);
            
            if ($this->User->save($this->data)) 
            {   
            	$this->Session->setFlash('Se han actualizado los datos del usuario correctamente');
	            $this->redirect(array('controller'=>'portadas','action'=>'index'));
	        } 
        }  
        else 
        {
        	if (!$id) 
	        {
	            $this->Session->setFlash('No has proporcionado un usuario para editarlo');
	            $this->redirect(array('action'=>'admin'));
	        }
	        
	        $usuario = $this->User->read(null, $id);
	        if (!$usuario) 
	        {
	            $this->Session->setFlash('El usuario que quieres editar no existe');
	            $this->redirect(array('action'=>'admin'));
	        }
        
	        $this->data = $usuario;
	    }
    }
    
    function add() 
    {
    	
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
             	
             
        $this->layout = "principal";
                
		if (!empty($this->data)) 
        {
        	$this->convertirPasswd();
        	
        	$this->data['User']['nombre']=ucwords(strtolower($this->data['User']['nombre']));
	        $this->data['User']['apellidos']=ucwords(strtolower($this->data['User']['apellidos']));
	        $this->data['User']['dni']=strtoupper($this->data['User']['dni']);
	        $this->data['User']['email']=strtolower($this->data['User']['email']);
        	
        	if ($this->User->save($this->data)) 
            {
            	$this->Session->setFlash('Se ha creado el usuario corréctamente.');
	            $this->redirect(array('action'=>'admin'));	
		    } 
            else 
            {
                $this->Session->setFlash('Se ha producido un error al crear el usuario');
            }
        }  
    }
    
    function alumnospendientes()
    {
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
        
        if(!empty($this->data))
        {
        	if(!empty($this->data['User']['matricula']))
        	{
        		foreach($this->data['User']['matricula'] as $id=>$validar)
        		{
        			if($validar == 1)
        			{
        				$this->User->id = $id;
        				$this->User->saveField('bloqueado', 0);
        			}
        		}
        		
        		$this->data = null;
        		
        	}
        }
       
        $alumnos = $this->User->find('all', array('order' => 'User.nombre DESC', 'conditions'=> array('User.status'=>1,'User.bloqueado'=>1)));
    	$this->set('alumnos', $alumnos);
    	
    	$this->layout = "principal";
    }
    
	function tutorespendientes()
    {
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
        
        if(!empty($this->data))
        {
        	if(!empty($this->data['User']['matricula']))
        	{
        		foreach($this->data['User']['matricula'] as $id=>$validar)
        		{
        			if($validar == 1)
        			{
        				$this->User->id = $id;
        				$this->User->saveField('bloqueado', 0);
        			}
        		}
        		
        		$this->data = null;
        		
        	}
        }
       
        $tutores = $this->User->find('all', array('order' => 'User.nombre DESC', 'conditions'=> array('User.status'=>5,'User.bloqueado'=>1)));
    	$this->set('tutores', $tutores);
    	
    	$this->layout = "principal";
    }
        
    function admin() 
    {
    	
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
                
        if(!empty($this->data))
	    {
	    	$codiciones = array();
	    	    	
	    	if(!empty($this->data['Filtro']['status']))
		    {
	    		$condiciones['User.status']=$this->data['Filtro']['status'];
    		}
	    	if(!empty($this->data['Filtro']['username']))
		    {
	    		$condiciones['User.username LIKE']=$this->data['Filtro']['username'];
    		}
    		if(!empty($this->data['Filtro']['nombre']))
		    {
	    		$condiciones['User.nombre LIKE']=$this->data['Filtro']['nombre'];
    		}
    		if(!empty($this->data['Filtro']['apellidos']))
		    {
	    		$condiciones['User.apellidos LIKE']=$this->data['Filtro']['apellidos'];
    		}
    		if(!empty($this->data['Filtro']['dni']))
		    {
	    		$condiciones['User.dni LIKE']=$this->data['Filtro']['dni'];
    		}
    		    		
    		if(!empty($condiciones))
	    	{
    			$usuarios = $this->User->find('all', array('order' => 'User.username DESC',
	            'conditions'=> $condiciones));
            }
            else
	        {
	        	$usuarios = $this->User->find('all', array('order' => 'User.username DESC'));	    	
	        }
    		
    		if(!empty($usuarios))
	    	{
	    		$this->set('usuarios', $usuarios);		
	    		$this->Session->setFlash(count($usuarios).' usuarios encontrados');
	    	}
	    	else
		    {
		    	$this->Session->setFlash('No se ha encontrado ningun usuario');	
		    }
	    		
	    }
        	
                   
        $this->layout = "principal";
        
    }
    
    function borrar($id=null) 
    {
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }

        if (!$id) 
        {
            $this->Session->setFlash('No has proporcionado un usuario para eliminarlo');
            $this->redirect(array('action'=>'admin'));
        }
        
        if ($this->User->delete($id)) 
        {
            $this->Session->setFlash('Se ha eliminado correctamente al usuario');
            $this->redirect(array('action'=>'admin'));
        } 
        else 
        {
            $this->Session->setFlash('No se ha podido eliminar al usuario');
            $this->redirect(array('action'=>'admin'));
        }
    }
       
    function registro()
	{
		$this->layout = "principal";
				
	    if (!empty($this->data)) 
        {
        	$codigo = $this->Session->read('ver_code');
			$codigoIntro = $this->data['User']['code_captcha'];
						
			if($codigo!=$codigoIntro) 
			{
				$this->Session->setFlash('La respuesta de seguridad no es correcta. Por favor, inténtalo de nuevo');				
				$this->create_captcha(); //not form action performed, create a captch code and show the form
				$this->render();	
			} 
			else 
			{
	            $this->convertirPasswd();
	            
	            $this->data['User']['nombre']=ucwords(strtolower($this->data['User']['nombre']));
	            $this->data['User']['apellidos']=ucwords(strtolower($this->data['User']['apellidos']));
	            $this->data['User']['dni']=strtoupper($this->data['User']['dni']);
	            $this->data['User']['email']=strtolower($this->data['User']['email']);
	            
	            if($this->data['User']['status']==1)
	            {
	            	$this->data['User']['info']=serialize($this->data['User']['info']);
	            }
	            else 
	            {
	            	$this->data['User']['info']=null;
	            }
	            
	            if ($this->User->save($this->data)) 
	            {
	            	$this->Session->setFlash('Se ha registrado corréctamente. En breve será validado por el adminitrador. Muchas gracias.');
	                	                
	                $this->redirect(array('controller'=>'portadas','action'=>'index'));
	             
	            } 
	            else 
	            {
	                $this->Session->setFlash('Se ha producido un error al crear el usuario');
	                $this->create_captcha(); //not form action performed, create a captch code and show the form
					$this->render();
					$this->data['User']['info']=null;
	            }
        	}
        }
        else
	    {
	        $this->create_captcha(); //not form action performed, create a captch code and show the form
			$this->render();		
	    }
    }
    
    
    function create_captcha()	
	{
		App::import("Component","Captcha"); //including captcha class
		$this->Captcha =  new CaptchaComponent(); //creating an object instance
		$this->Captcha->controller = & $this; //assign this conroller(CaptchaController) object to its captcha object's controller property.
		$this->set('captcha_src',$captcha_src=$this->Captcha->create()); //create a capthca and assign to a variable
	}
    
   
    function convertirPasswd() 
    {
        if (!empty($this->data['User']['passwd'])) 
        {
            $this->data['User']['password'] = $this->Auth->password($this->data['User']['passwd']);
        }
        return true;
    }

    function panelControl() 
    {
    	if ($this->Auth->user('status')!=10 && $this->Auth->user('status')!=5) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
                
        $this->set('status', $this->Auth->user('status'));
        $this->layout = "principal";
    }
        
    
    function beforeFilter() 
    {
        parent::beforeFilter();
        
        $this->Auth->allow('identificar','login','registro','registrocursos','olvido','useticket','newpassword');
        
        //Configure AuthComponent
		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');	
		$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'login');
    }
    
    /************************************/
    
    /** Recuperacion de contraseñas **/
    
    
    function olvido()
    {
    	$this->layout = "principal";
    	
		if(!empty($this->data))
		{
			$codigo = $this->Session->read('ver_code');
			$codigoIntro = $this->data['User']['code_captcha'];
						
			if($codigo!=$codigoIntro) 
			{
				$this->Session->setFlash(__('La respuesta de seguridad no es correcta. Por favor, inténtalo de nuevo', true));				
				$this->create_captcha(); //not form action performed, create a captch code and show the form
				$this->render();	
			} 
			else 
			{
				//email entered, check for it
				
				$cuenta=$this->User->findByEmail($this->data['User']['email']);
				
				if(empty($cuenta) || $cuenta['User']['bloqueado'])
				{
					$this->Session->setFlash('Su cuenta está bloqueada o inactiva. Por favor, póngase en contacto con la administración del portal web.');
					$this->redirect(array('controller'=>'portadas', 'action'=>'index'));
				}
				
				$hashyToken=md5(date('mdY').rand(4000000,4999999));
				
				if(!empty($cuenta['User']['email']))
				{
					$this->Email->subject = 'Prácticas Clínicas - Recuperación de contraseñas'; 
				    $this->Email->to = $cuenta['User']['email'];
				    $this->Email->replyTo = $cuenta['User']['email'];
				    $this->Email->from = $cuenta['User']['email'];
				    				                     
				    $this->Email->sendAs = 'html';
				    $this->Email->template = 'olvido';
				    $this->Email->smtpOptions = array(
				    	'port'=>'587',
				    	'timeout'=>'30',
				    	'host'=>'mail.innova-humana.com',
				    	'username'=>'jcb790c',
				    	'password'=>'h2o35wJ'
					);
					            
					$this->set('token', $hashyToken);
					
					$this->Email->delivery = 'mail';               
					
					$this->Email->send();
				}   
						
				$data['Ticket']['hash']=$hashyToken;
				$data['Ticket']['data']=$cuenta['User']['email'];
				$data['Ticket']['expires']=$this->Ticketmaster->getExpirationDate();
	 
				if ($this->Ticket->save($data))
				{
					$this->Session->setFlash('Se le ha enviado una email con las instrucciones necesarias para recuperar su clave.');
					$this->redirect(array('controller'=>'portadas', 'action'=>'index'));
				}
				else
				{
					$this->Session->setFlash('Error.');
					$this->redirect(array('controller'=>'portadas', 'action'=>'index'));
	 			}
 			}
		}
		else
		{
			$this->create_captcha(); //not form action performed, create a captch code and show the form
			$this->render();			
		}
 		
	}
 
	function useticket($hash)
	{
		//purge all expired tickets
		//built into check
		$results=$this->Ticketmaster->checkTicket($hash);
 
		if($results)
		{
			//now pull up mine IF still present
			$passTicket=$this->User->findByEmail($results['Ticket']['data']);
 
			$this->Ticketmaster->voidTicket($hash);
			$this->Session->write('tokenreset',$passTicket['User']['id']);
			$this->Session->setFlash('Introduzca su nueva contraseña');
			$this->redirect(array('controller'=>'users', 'action'=>'newpassword',$passTicket['User']['id']));
		}
		else
		{
			$this->Session->setFlash('Su código de recuperación ha caducado o no es correcto.');
			$this->redirect(array('controller'=>'portadas', 'action'=>'index'));
		}
 
	}
  
	function newpassword($id = null) 
	{
 		$this->layout = "principal";
 		 
		if (empty($this->data)) 
		{
			if($this->Session->check('tokenreset')) $id=$this->Session->read('tokenreset');
			
			if (!$id) 
			{
				$this->Session->setFlash('Usuario no válido');
				$this->redirect(array('controller'=>'portadas', 'action'=>'index'));
			}
			
			$this->data = $this->User->read(null, $id);
		} 
		else 
		{				
 			$this->convertirPasswd();
 			
 			$this->User->id=$this->data['User']['id'];
 			
			if ($this->User->saveField('password', $this->data['User']['password'])) 
			{
				//delkete session token and dlete used ticket from table
				$this->Session->delete('tokenreset');
				$this->Session->setFlash('Su contraseña ha sido modificada corréctamente');
				$this->redirect(array('controller'=>'portadas', 'action'=>'index'));
			} 
			else 
			{
				$this->Session->setFlash('Error al modificar su contraseña.');
			}
		}
	}
    
}
?>
