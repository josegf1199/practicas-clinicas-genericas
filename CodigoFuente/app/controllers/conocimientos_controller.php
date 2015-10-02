<?php

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
class ConocimientosController extends AppController 
{
    var $name = 'Conocimientos';
    var $helpers = array('Html', 'Form', 'Javascript', 'Session');
    var $uses = array('Conocimiento','Practica');
        
    function editar($id=null) 
    {   
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
        
    	$conocimiento = $this->Conocimiento->read(null, $id);
	        
        $practica = $this->Practica->read(null, $conocimiento['Conocimiento']['id_practica']);
        $this->set('practica', $practica);
                
		$this->layout = "principal";

        if (!empty($this->data)) 
        {
            if ($this->Conocimiento->save($this->data)) 
            {   
            	$this->Session->setFlash('Se han actualizado los datos corréctamente');
	            $this->redirect(array('action'=>'admin',$this->data['Conocimiento']['id_practica']));
	        } 
        }  
        else 
        {
        	$this->data = $conocimiento;
	    }
    }
          
    function agregar($idPractica=null) 
    {
    	
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }

        $this->set('idPractica', $idPractica);
        
        $practica = $this->Practica->read(null, $idPractica);
        $this->set('practica', $practica);
        
        $this->layout = "principal";
                
		if (!empty($this->data)) 
        {
        	if ($this->Conocimiento->save($this->data)) 
            {
            	$this->Session->setFlash('Se ha creado la habilidad corréctamente.');
	            $this->redirect(array('action'=>'admin', $idPractica));	
		    } 
        } 
    }
    
    function admin($idPractica=null) 
    {
    	
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }

        $conocimientos =  $this->Conocimiento->find('all', array('order'=>'Conocimiento.nombre', 'conditions'=>array('Conocimiento.id_practica'=>$idPractica)));
        $this->set('conocimientos', $conocimientos);

        $practica = $this->Practica->read(null, $idPractica);
        $this->set('practica', $practica);
                   
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
            $this->Session->setFlash('Error');
            $this->redirect(array('controller'=>'practicas', 'action'=>'admin'));
        }
        
        $conocimiento = $this->Conocimiento->read(null, $id);
        
        if ($this->Conocimiento->delete($id)) 
        {
            $this->Session->setFlash('Se ha eliminado la habilidad corréctamente');
            $this->redirect(array('action'=>'admin', $conocimiento['Conocimiento']['id_practica']));
        } 
        else 
        {
            $this->Session->setFlash('Error');
            $this->redirect(array('action'=>'admin', $conocimiento['Conocimiento']['id_practica']));
        }
    }
   
    
}
?>
