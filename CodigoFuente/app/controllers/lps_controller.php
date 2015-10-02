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

class LpsController extends AppController 
{
    var $name = 'Lps';
    var $uses = array('Practica','Place', 'Lp');
    var $helpers = array('Html', 'Form', 'Session');
    
    var $paginate = array(
            'limit' => 15,
            'order' => 'Lp.created DESC'
    );
    
    
    function agregar($id=null)
    {
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
        
    	$l = $this->Place->find('all');
        
        $lugares = array();
        
        foreach($l as $lugar)
        {
        	$lugares[$lugar['Place']['id']]=$lugar['Place']['hospital'];
        }
            	
    	$this->set('lugares', $lugares);
    	
    	$practica = $this->Practica->read(null, $id);
    	
        $this->set('practica', $practica);
                
    	$this->layout = "principal";
        
        if (!empty($this->data)) 
        {
        	if ($this->Lp->save($this->data)) 
            {
            	$this->Session->setFlash('Lugar asignado corréctamente');
                $this->redirect(array('controller'=>'lps', 'action'=>'admin', $id));
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
        
        $l = $this->Place->find('all');
        
        $lugares = array();
        
        foreach($l as $lugar)
        {
        	$lugares[$lugar['Place']['id']]=$lugar['Place']['hospital'];
        }
        
        $this->set('lugares', $lugares);
        
        $this->layout = "principal";
                
        $mensajeError = '';

        if (!empty($id)) 
        {
        	$lugar = $this->Lp->read(null, $id);
        	$this->set('lugar', $lugar);
        	
        	$practica = $this->Practica->read(null, $lugar['Lp']['id_practica']);
    	
        	$this->set('practica', $practica);
        	
	        if (!empty($this->data)) 
	        {
	        	if ($this->Lp->save($this->data)) 
	            {
	            	$this->Session->setFlash('Lugar asignado corréctamente');
	                $this->redirect(array('controller'=>'lps', 'action'=>'admin', $id));
	            } 
	        }
            else 
            {
                $this->data = $lugar;
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
		    'order' => 'Lp.created DESC',
		   	'conditions' => array('Lp.id_practica'=>$id)
		    );
	    
        
        $this->layout = "principal";
                              
        $lugares = $this->paginate('Lp');
                
        $this->set('lugares', $lugares);
        
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
        	$lugar = $this->Lp->read(null, $id);
        	
            if ($this->Lp->delete($id, true)) 
            {
                $this->Session->setFlash('Lugar borrado con éxito');
            } 
            else 
            {
                $this->Session->setFlash('No se ha podido borrar el lugar');
            }
        }
        $this->redirect(array('controller'=>'lps', 'action'=>'admin', $lugar['Lp']['id_practica']));
    }
}
?>