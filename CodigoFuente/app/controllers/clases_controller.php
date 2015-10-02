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

class ClasesController extends AppController 
{
    var $name = 'Clases';
    var $uses = array('Lp','Tutor', 'User', 'Practica', 'Matricula', 'Clase','Conocimiento');
    var $helpers = array('Excel','Html', 'Form', 'Session');
            
    function agregar($id=null)
    {
    	if ($this->Auth->user('status')!=1) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección privada. Por favor, identifícate como alumno.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
        
        // Obtenemos los datos de la matricula
        $matricula = $this->Matricula->read(null, $id);
                        
        $this->set('matricula', $matricula);
        
        // Obtenemos los datos del alumno
        $alumno = $this->User->read(null, $matricula['Matricula']['id_alumno']);
                        
        $this->set('alumno', $alumno);
       
        // Obtenemos el listado de tutores de la practica
    	$t = $this->Tutor->find('all',array('conditions'=>array('Tutor.id_practica'=>$matricula['Matricula']['id_practica'])));
            	
    	$tutores = array();
        
        foreach($t as $tutor)
        {
        	$tutores[$tutor['Tutor']['id']]=$tutor['User']['nombre'].','.$tutor['User']['apellidos'];
        }
        
        $this->set('tutores', $tutores);
        
        // Obtenemos el listado de lugares de la practica
    	$l = $this->Lp->find('all',array('recursive'=>2,'conditions'=>array('Lp.id_practica'=>$matricula['Matricula']['id_practica'])));
        
    	$lugares = array();
        
        foreach($l as $lugar)
        {
        	if(!empty($lugar['Place']['Area']))
        	{
	        	foreach($lugar['Place']['Area'] as $area)
	        	{
	        		$nombre = $lugar['Place']['hospital'].' ('.$area['nombre'].')';
	        		$lugares[$nombre]=$nombre;
	        	}
        	}
        }
        
        $this->set('lugares', $lugares);
    	    	
    	// Obtenemos el listado de habilidades de la practica
    	$habilidades = $this->Conocimiento->find('all',array('conditions'=>array('Conocimiento.id_practica'=>$matricula['Matricula']['id_practica'])));
        
        $this->set('habilidades', $habilidades);
    	                
    	$this->layout = "principal";
        
        if (!empty($this->data)) 
        {

        	$this->data['Clase']['conocimientos']=serialize($this->data['Aprendido']);
        	
        	$this->data['Clase']['id_user']=$this->Auth->user('id');
        	
        	if ($this->Clase->save($this->data)) 
            {
            	$this->Session->setFlash('Clase práctica creada con éxito. Queda pendiente de revisión por parte del tutor.');
                $this->redirect(array('controller'=>'clases', 'action'=>'misclases', $id));
            } 
        }
        
    }
        
	function editar($id=null)
    {
    	if ($this->Auth->user('status')!=5) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate como tutor.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
            	
    	$clase = $this->Clase->read(null, $id);
    	$this->set('clase', $clase);
    	
    	// Obtenemos los datos del alumno
        $alumno = $this->User->read(null, $clase['Clase']['id_user']);
                        
        $this->set('alumno', $alumno);
        
        // Obtenemos los datos de la practica
        $practica = $this->Practica->read(null, $clase['Clase']['id_practica']);
                        
        $this->set('practica', $practica);
    	                                               
    	$this->layout = "principal";
        
        if (!empty($this->data)) 
        {
        	if ($this->Clase->save($this->data)) 
            {
            	$this->Session->setFlash('Sesión de practicas actualizada corréctamente');
                $this->redirect(array('controller'=>'clases', 'action'=>'admin', $clase['Clase']['id_practica']));
            } 
        }
        else
        {
        	$this->data=$clase;
        }
        
    }
    
	function verhabilidades($id=null)
    {
    	$clase = $this->Clase->read(null, $id);
    	$this->set('clase', $clase);
    	
        // Obtenemos los datos de la practica
        $practica = $this->Practica->read(null, $clase['Clase']['id_practica']);
                        
        $this->set('practica', $practica);
    	$this->layout = "principal";
         
    }
    
    function admin($id=null) 
    {
    	if ($this->Auth->user('status')!=5) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección de administración. Por favor, identifícate como tutor');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
        
        $clases = $this->Clase->find('all', array('recursive'=>2,'order'=>'Clase.created DESC', 'conditions'=>array('Clase.id_practica'=>$id, 'Clase.revisada'=>0)));
                
        $this->set('clases', $clases);
        
        // Obtenemos los datos de la practica
        $practica = $this->Practica->read(null, $id);
                        
        $this->set('practica', $practica);
        
        $this->layout = "principal";
    }
    
    function misclases($id=null)
    {
    	if ($this->Auth->user('status')!=1) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección no autorizada. Por favor, identifícate como alumno.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
        
        // Obtenemos los datos de la matricula
        $matricula = $this->Matricula->read(null, $id);
           
        $this->set('matricula', $matricula);
                               
        $clases = $this->Clase->find('all', array('recursive'=>2,'order'=>'Clase.created DESC', 'conditions'=>array('Clase.id_matricula'=>$id, 'Clase.id_user'=>$this->Auth->user('id'))));
                
        $this->set('clases', $clases);
        $this->set('idMatricula', $id);
        
        $this->layout = "principal";
    }
    
	function excel($idAlumno=null, $idPractica=null)
	{
		if ($this->Auth->user('status')!=5) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección no autorizada. Por favor, identifícate como tutor.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
        
        // Obtenemos los datos del alumno
        $alumno = $this->User->read(null, $idAlumno);
                        
        $this->set('alumno', $alumno);
        
        // Obtenemos los datos de la practica
        $practica = $this->Practica->read(null, $idPractica);
        
        $this->set('practica', $practica);
        
		//Buscamos el vinculo con el tutor
        
        $idTutor = null;
        
        foreach($practica['Tutor'] as $tutor)
        {
        	if($tutor['id_user']==$this->Auth->user('id'))
        	{
        		$idTutor = $tutor['id'];
        		break;
        	}
        }
                
        $clases = $this->Clase->find('all', array('recursive'=>2,'order'=>'Clase.created DESC', 'conditions'=>array('Clase.id_tutor'=>$idTutor, 'Clase.id_practica'=>$idPractica, 'Clase.id_user'=>$idAlumno, 'Clase.revisada'=>1)));
                
        $this->set('clases', $clases);
        
        $this->layout = "excel";
	}
    
	function exceltotal($idPractica=null)
	{
		if ($this->Auth->user('status')!=5) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección no autorizada. Por favor, identifícate como tutor.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
        
        // Obtenemos los datos de la practica
        $practica = $this->Practica->read(null, $idPractica);
        
        $this->set('practica', $practica);

        $alumnos = $this->Matricula->find('all', array('conditions'=>array('Matricula.id_practica'=>$idPractica)));
       
		//Buscamos el vinculo con el tutor
        
        $idTutor = null;
        
        foreach($practica['Tutor'] as $tutor)
        {
        	if($tutor['id_user']==$this->Auth->user('id'))
        	{
        		$idTutor = $tutor['id'];
        		break;
        	}
        }
        
        $clases = array();
        $contador = 0;
        
        foreach($alumnos as $alumno)
        {
        	$clases[$contador]['Alumno']= $alumno['User'];
        	
        	$clasesAlumno = $this->Clase->find('all', array('order'=>'Clase.created DESC', 'conditions'=>array('Clase.id_tutor'=>$idTutor, 'Clase.id_practica'=>$idPractica, 'Clase.id_user'=>$alumno['User']['id'], 'Clase.revisada'=>1)));
        	
        	$clases[$contador]['Clases']= $clasesAlumno;
        	
        	$contador++;
        }
       
        $this->set('clases', $clases);

        $this->layout = "excel";
        
	}
	
	function clasesalumno($idAlumno=null, $idPractica=null)
    {  	
    	
    	if ($this->Auth->user('status')!=5) 
        {
            $this->Session->setFlash('Estás intentando acceder a una sección no autorizada. Por favor, identifícate como tutor.');
            $this->redirect(array('controller'=>'portadas', 'action'=>'index'));
        }
        
        // Obtenemos los datos del alumno
        $alumno = $this->User->read(null, $idAlumno);
                        
        $this->set('alumno', $alumno);
        
        // Obtenemos los datos de la practica
        $practica = $this->Practica->read(null, $idPractica);
        
        $this->set('practica', $practica);

        //Buscamos el vinculo con el tutor
        
        $idTutor = null;
        
        foreach($practica['Tutor'] as $tutor)
        {
        	if($tutor['id_user']==$this->Auth->user('id'))
        	{
        		$idTutor = $tutor['id'];
        		break;
        	}
        }
        
        $clases = $this->Clase->find('all', array('recursive'=>2,'order'=>'Clase.created DESC', 'conditions'=>array('Clase.id_tutor'=>$idTutor, 'Clase.id_practica'=>$idPractica, 'Clase.id_user'=>$idAlumno, 'Clase.revisada'=>1)));
                
        $this->set('clases', $clases);
                
        $this->layout = "principal";
    }

    function borrar($id=null) 
    {
    	if ($this->Auth->user('status')!=5) 
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