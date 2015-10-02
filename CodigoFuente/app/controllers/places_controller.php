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
class PlacesController extends AppController 
{
    var $name = 'Places';
    var $helpers = array('Html', 'Form', 'Javascript', 'Session');
    var $uses = array('Place');
    
    var $paginate = array(
            'limit' => 50,
            'order' => 'Place.hospital DESC'
    );
    
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
            if ($this->Place->save($this->data)) 
            {   
            	$this->Session->setFlash('Se han actualizado los datos corréctamente');
	            $this->redirect(array('action'=>'admin'));
	        } 
        }  
        else 
        {
        	if (!$id) 
	        {
	            $this->Session->setFlash('No has proporcionado un lugar para editarlo');
	            $this->redirect(array('action'=>'admin'));
	        }
	        
	        $lugar = $this->Place->read(null, $id);
	        if (!$lugar) 
	        {
	            $this->Session->setFlash('El lugar que quieres editar no existe');
	            $this->redirect(array('action'=>'admin'));
	        }
        
	        $this->data = $lugar;
	        
	    }
    }
          
    function agregar() 
    {
    	
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
                     
        $this->layout = "principal";
                
		if (!empty($this->data)) 
        {
        	if ($this->Place->save($this->data)) 
            {
            	$this->Session->setFlash('Se ha creado el lugar corréctamente.');
	            $this->redirect(array('action'=>'admin'));	
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

        $this->set('lugares', $this->paginate('Place'));	
                   
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
            $this->Session->setFlash('No has proporcionado un lugar para eliminarlo');
            $this->redirect(array('action'=>'admin'));
        }
        
        if ($this->Place->delete($id)) 
        {
            $this->Session->setFlash('Se ha eliminado correctamente el lugar');
            $this->redirect(array('action'=>'admin'));
        } 
        else 
        {
            $this->Session->setFlash('No se ha podido eliminar el lugar');
            $this->redirect(array('action'=>'admin'));
        }
    }
   
    
}
?>
