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
class AreasController extends AppController 
{
    var $name = 'Areas';
    var $helpers = array('Html', 'Form', 'Javascript', 'Session');
    var $uses = array('Area','Place');
        
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
            if ($this->Area->save($this->data)) 
            {   
            	$this->Session->setFlash('Se han actualizado los datos corréctamente');
	            $this->redirect(array('action'=>'admin', $this->data['Area']['id_place']));
	        } 
        }  
        else 
        {
        	if (!$id) 
	        {
	            $this->Session->setFlash('No has proporcionado un área para editarla');
	            $this->redirect(array('controller'=>'places', 'action'=>'admin'));
	        }
	        
	        $area = $this->Area->read(null, $id);
	        if (!$area) 
	        {
	            $this->Session->setFlash('El área que quieres editar no existe');
	            $this->redirect(array('controller'=>'places', 'action'=>'admin'));
	        }
        
	        $this->data = $area;
	        
	    }
    }
          
    function agregar($id_place=null) 
    {
    	
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
                     
        $this->layout = "principal";

        $this->set('lugar', $id_place);
        
		if (!empty($this->data)) 
        {
        	if ($this->Area->save($this->data)) 
            {
            	$this->Session->setFlash('Se ha creado el área corréctamente.');
	            $this->redirect(array('action'=>'admin', $this->data['Area']['id_place']));	
		    } 
        }  
    }
    
    function admin($id_place=null) 
    {
    	
    	if ($this->Auth->user('status')!=10) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }

        $lugar = $this->Place->read(null, $id_place);
        
        $this->set('lugar', $lugar);
        
        // Obtenemos el listado de areas del lugar
    	$areas = $this->Area->find('all',array('conditions'=>array('Area.id_place'=>$id_place)));
             
        $this->set('areas', $areas);	
                   
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
            $this->Session->setFlash('No has proporcionado un área para eliminarla');
            $this->redirect(array('controller'=>'places', 'action'=>'admin'));
        }
        
        $area = $this->Area->read(null, $id);
        
        if ($this->Area->delete($id)) 
        {
            $this->Session->setFlash('Se ha eliminado correctamente el área de prácticas');
            $this->redirect(array('action'=>'admin', $area['Area']['id_place']));
        } 
        else 
        {
            $this->Session->setFlash('No se ha podido eliminar el área de prácticas');
            $this->redirect(array('action'=>'admin', $area['Area']['id_place']));
        }
    }
   
    
}
?>
