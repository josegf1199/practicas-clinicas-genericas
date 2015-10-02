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

class TutoresController extends AppController 
{
    var $name = 'Tutores';
    var $uses = array('User', 'Tutor','Practica');
    var $helpers = array('Html', 'Form', 'Session');
    
    var $paginate = array(
            'limit' => 15,
            'order' => 'Tutor.created DESC'
    );
    
    
    function agregar($id=null)
    {
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
        
    	$t = $this->User->find('all',array('conditions'=>array('User.status'=>5)));
        
        $tutores = array();
        
        foreach($t as $tutor)
        {
        	$tutores[$tutor['User']['id']]=$tutor['User']['nombre'].','.$tutor['User']['apellidos'];
        }
        
    	$this->set('tutores', $tutores);
    	
    	$practica = $this->Practica->read(null, $id);
        $this->set('practica', $practica);
    	
        $this->set('idPractica', $id);
                
    	$this->layout = "principal";
        
        if (!empty($this->data)) 
        {
        	if ($this->Tutor->save($this->data)) 
            {
            	$this->Session->setFlash('Tutor asignado corréctamente');
                $this->redirect(array('controller'=>'tutores', 'action'=>'admin', $id));
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
        
    	$t = $this->User->find('all',array('conditions'=>array('User.status'=>5)));
        
        $tutores = array();
        
        foreach($t as $tutor)
        {
        	$tutores[$tutor['User']['id']]=$tutor['User']['nombre'].','.$tutor['User']['apellidos'];
        }
        
        $this->set('tutores', $tutores);
        
        $this->layout = "principal";
                
        $mensajeError = '';

        if (!empty($id)) 
        {
        	$tutor = $this->Tutor->read(null, $id);
        	$this->set('tutor', $tutor);
        	
        	$practica = $this->Practica->read(null, $tutor['Tutor']['id_practica']);
        	$this->set('practica', $practica);
        	
	        if (!empty($this->data)) 
	        {
	        	if ($this->Tutor->save($this->data)) 
	            {
	            	$this->Session->setFlash('Tutor asignado corréctamente');
	                $this->redirect(array('controller'=>'tutores', 'action'=>'admin', $id));
	            } 
	        }
            else 
            {
                $this->data = $tutor;
            }
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
		    'order' => 'Tutor.created DESC',
		   	'conditions' => array('Tutor.id_practica'=>$id)
		    );
	    
        
        $this->layout = "principal";
                              
        $tutores = $this->paginate('Tutor');
                
        $this->set('tutores', $tutores);
        $this->set('idPractica', $id);
        
        $practica = $this->Practica->read(null, $id);
        $this->set('practica', $practica);
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
        	$tutor = $this->Tutor->read(null, $id);
        	
            if ($this->Tutor->delete($id, true)) 
            {
                $this->Session->setFlash('Tutor borrado con éxito');
            } 
            else 
            {
                $this->Session->setFlash('No se ha podido borrar el tutor');
            }
        }
        $this->redirect(array('controller'=>'tutores', 'action'=>'admin', $tutor['Tutor']['id_practica']));
    }
}
?>