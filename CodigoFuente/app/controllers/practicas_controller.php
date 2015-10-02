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

class PracticasController extends AppController 
{
    var $name = 'Practicas';
    var $uses = array('Practica','Tutor');
    var $helpers = array('Html', 'Form','Session');
    
    var $paginate = array(
            'limit' => 15,
            'order' => 'Practica.modified DESC'
    );
        
    function agregar() 
    {
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
                
        $this->layout = "principal";
                
        $mensajeError = '';

        if (!empty($this->data)) 
        {
        	if ($this->Practica->save($this->data)) 
            {
            	$this->Session->setFlash('Práctica creada corréctamente');
                $this->redirect(array('controller'=>'practicas', 'action'=>'admin'));
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
                        
        $this->layout = "principal";
                
        if (!empty($id)) 
        {
        	if (!empty($this->data)) 
            {
                if ($this->Practica->save($this->data)) 
                {
                    $this->Session->setFlash('Practica creada con corréctamente');
                	$this->redirect(array('controller'=>'practicas', 'action'=>'admin'));
                }
            } 
            else 
            {
                if (!$id) 
		        {
		            $this->Session->setFlash('No has proporcionado una práctica para editarla');
		            $this->redirect(array('action'=>'admin'));
		        }
		        
		        $practica = $this->Practica->read(null, $id);
		        
		        if (!$practica) 
		        {
		            $this->Session->setFlash('La práctica que quieres editar no existe');
		            $this->redirect(array('action'=>'admin'));
		        }
	        
		        $this->data = $practica;
            }
        }
    }

    function admin() 
    {
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
                
        $this->layout = "principal";
                              
        $practicas = $this->paginate('Practica');
                                
        $this->set('practicas', $practicas);
    }
    
    function admintutores()
    {
    	if ($this->Auth->user('status')!=5) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate como tutor.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
                
        $practicas = $this->Tutor->find('all', array('order'=>'Tutor.created DESC', 'conditions'=>array('Tutor.id_user'=>$this->Auth->user('id'))));
               
        $this->set('practicas', $practicas);
        
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
            if ($this->Practica->delete($id, true)) 
            {
                $this->Session->setFlash('Práctica borrada con éxito');
            } 
            else 
            {
                $this->Session->setFlash('No se ha podido borrar la práctica');
            }
        }
        $this->redirect(array('controller'=>'practicas', 'action'=>'admin'));
    }
}
?>