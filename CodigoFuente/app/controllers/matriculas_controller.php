<?php

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of noticias_controller
 *
 * @author Gerardo
 */

class MatriculasController extends AppController 
{
    var $name = 'Matriculas';
    var $uses = array('User', 'Practica', 'Matricula');
    var $components = array('Captcha');
    var $helpers = array('Html', 'Form', 'Session');
    
    var $paginate = array(
            'limit' => 15,
            'order' => 'Matricula.created DESC'
    );
    
    function matricular()
    {
    	if ($this->Auth->user('status')!=1) 
        {
            $this->Session->setFlash('Para acceder debes ser un alumno. Por favor, indentifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
        
    	$this->layout = "principal";
    	
    	$matriculas = $this->Matricula->find('all', array('conditions'=>array('Matricula.id_alumno'=>$this->Auth->user('id'))));
    	
    	$p = $this->Practica->find('all');
    	    	   	
    	$practicas = array();
        
        foreach($p as $practica)
        {
        	$matriculado = false;
        	
        	foreach($matriculas as $m)
        	{
        		if($m['Matricula']['id_practica']==$practica['Practica']['id'])
        		{
        			$matriculado = true;
        		}
        	}

        	if($matriculado == false)
        	{
        		$practicas[$practica['Practica']['id']]='('.$practica['Practica']['codigo'].') '.$practica['Practica']['nombre'].'. '.$practica['Practica']['curso'].'º Curso';
        	}
        }
    	        
    	$this->set('practicas', $practicas);
    	
    	if (!empty($this->data)) 
        {
        	$codigo = $this->Session->read('ver_code');
			$codigoIntro = $this->data['Matricula']['code_captcha'];
						
			if($codigo!=$codigoIntro) 
			{
				$this->Session->setFlash('La respuesta de seguridad no es correcta. Por favor, inténtalo de nuevo');				
				$this->create_captcha(); //not form action performed, create a captch code and show the form
				$this->render();	
			} 
			else 
			{
				if ($this->Auth->user('status')==1) 
        		{	
					$this->data['Matricula']['id_alumno']=$this->Auth->user('id');
        		}
        		else
        		{
        			$this->Session->setFlash('Para matricularse de una práctica debe ser alumno. Muchas gracias');
	                $this->redirect(array('controller'=>'portadas','action'=>'index'));
        		}
				
	            if ($this->Matricula->save($this->data)) 
	            {
	            	$this->Session->setFlash('Su solicitud ha sido procesada corréctamente. En breve será validada por nuestros administradores. Muchas gracias');
	                $this->redirect(array('controller'=>'portadas','action'=>'index'));
	            } 
	            else 
	            {
	                $this->Session->setFlash('Se ha producido un error al crear el usuario');
	                $this->create_captcha(); //not form action performed, create a captch code and show the form
					$this->render();
	            }
        	}
        }
        else
	    {
	        $this->create_captcha(); //not form action performed, create a captch code and show the form
			$this->render();		
	    }
    }
    
    // La primera vez que el alumno se identifica debe seleccionar las asignaturas que tiene
    
	function primeramatricula()
    {
    	if ($this->Auth->user('status')!=1) 
        {
            $this->Session->setFlash('Para acceder debes ser un alumno. Por favor, indentifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
        
    	$this->layout = "principal";
    	
    	$info = unserialize($this->Auth->user('info'));
    	    	    	
    	if(!empty($info))
    	{
    		$opciones = array();
    		
    		foreach($info as $curso=>$matricula)
    		{
    			if($matricula == true)
    			{
    				$practicas = $this->Practica->find('all', array('conditions'=>array('curso'=>$curso)));
    				$opciones[$curso]=$practicas;
    			}
    		}
    		    		
    		$this->set('opciones', $opciones);
    	}
    	else
    	{
    		$this->Session->setFlash('No seleccionó ningún curso donde matricularse');
	        $this->redirect(array('controller'=>'portadas','action'=>'index'));
    	}
    	    	    	
    	if (!empty($this->data)) 
        {
        	$codigo = $this->Session->read('ver_code');
			$codigoIntro = $this->data['Matricula']['code_captcha'];
						
			if($codigo!=$codigoIntro) 
			{
				$this->Session->setFlash('La respuesta de seguridad no es correcta. Por favor, inténtalo de nuevo');				
				$this->create_captcha(); //not form action performed, create a captch code and show the form
				$this->render();	
			} 
			else 
			{
				if(!empty($this->data['Operacion']))
				{
					foreach($this->data['Operacion'] as $mpractica)
					{
						$this->Matricula->create();
						$this->Matricula->set(array(
							'id_alumno' => $this->Auth->user('id'),
							'id_practica' => $mpractica,
							'bloqueado' => 0
							));
						$this->Matricula->save();
					}
					
					//Ponemos a null la variable info para indicar que el alumno ya se ha matriculado por primera vez
					$this->User->read(null, $this->Auth->user('id'));
					$this->User->savefield('info',null);
					$this->Session->write('matriculado',1);
										
					$this->Session->setFlash('Se ha matriculado con éxito en las prácticas selecionadas.');
	        		$this->redirect(array('controller'=>'portadas','action'=>'index'));
				}
				else
				{
					$this->Session->setFlash('Error durante el proceso de matriculación.');
	        		$this->redirect(array('controller'=>'portadas','action'=>'index'));
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
    
    function agregar($id=null)
    {
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
        
    	$a = $this->User->find('all',array('conditions'=>array('User.status'=>1)));
        
        $alumnos = array();
        
        foreach($a as $alumno)
        {
        	$alumnos[$alumno['User']['id']]='('.$alumno['User']['dni'].') '.$alumno['User']['nombre'].','.$alumno['User']['apellidos'];
        }
        
    	$this->set('alumnos', $alumnos);
    	
    	$practica = $this->Practica->read(null, $id);
    	
        $this->set('idPractica', $practica['Practica']['id']);
                
        $this->set('practica', $practica);
                
    	$this->layout = "principal";
        
        if (!empty($this->data)) 
        {
        	if ($this->Matricula->save($this->data)) 
            {
            	$this->Session->setFlash('Práctica asignada corréctamente');
                $this->redirect(array('controller'=>'matriculas', 'action'=>'admin', $id));
            } 
        }
        
    }
    
	function editar($id=null)
    {
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
        
        $matricula = $this->Matricula->read(null, $id);
        $this->set('matricula', $matricula);

        $this->layout = "principal";
        
        if (!empty($this->data)) 
        {
        	if ($this->Matricula->save($this->data)) 
            {
            	$this->Session->setFlash('Práctica asignada corréctamente');
                $this->redirect(array('controller'=>'matriculas', 'action'=>'admin', $this->data['Matricula']['id_practica']));
            } 
        }
        else
        {
        	$this->data=$matricula;
        }
        
    }
   
    function admin($id=null) 
    {
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
        
        		
	    $this->paginate = array(
			'limit' => 15,
		    'order' => 'Matricula.created DESC',
		   	'conditions' => array('Matricula.id_practica'=>$id)
		    );
	    
        
        $this->layout = "principal";
                              
        $matriculas = $this->paginate('Matricula');
                
        $this->set('matriculas', $matriculas);
        $this->set('idPractica', $id);
        
        $practica = $this->Practica->read(null, $id);
        $this->set('practica', $practica);
    }
    
	function misalumnos($id=null) 
    {
    	if ($this->Auth->user('status')!=5) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate como tutor.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
                
        $this->layout = "principal";
        
        $alumnos = $this->Matricula->find('all', array('order'=>'Matricula.created DESC','conditions'=>array('Matricula.id_practica'=>$id)));        

        $this->set('alumnos', $alumnos);
        $this->set('idPractica', $id);
    }
    
    function mispracticas()
    {
    	if ($this->Auth->user('status')!=1) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección no autorizada. Por favor, identifícate como alumno.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
        
        $asignaturas = $this->Matricula->find('all', array('order'=>'Matricula.created DESC', 'conditions'=>array('Matricula.bloqueado'=>0, 'Matricula.id_alumno'=>$this->Auth->user('id'))));
                
        $this->set('asignaturas', $asignaturas);
        
        $this->layout = "principal";
    }

    function borrar($id=null) 
    {
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
        
        if (!empty($id)) 
        {
        	$matricula = $this->Matricula->read(null, $id);
        	
            if ($this->Matricula->delete($id, true)) 
            {
                $this->Session->setFlash('Matrícula borrada con éxito');
            } 
            else 
            {
                $this->Session->setFlash('No se ha podido borrar la matrícula');
            }
        }
        $this->redirect(array('controller'=>'matriculas', 'action'=>'admin', $matricula['Matricula']['id_practica']));
    }
}
?>