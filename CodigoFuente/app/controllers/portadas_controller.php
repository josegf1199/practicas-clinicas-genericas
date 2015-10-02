<?php

class PortadasController extends AppController 
{
	var $name = 'Portadas';
	var $helpers = array('Html', 'Form', 'Javascript');
	var $components = array('Captcha');
	var $uses = array();
		
	function index() 
	{		
		$matriculado = $this->Session->read('matriculado');
		
		$this->set('matriculado', $matriculado);
					
		$this->layout = 'principal';
	}
		
	function beforeFilter() 
	{
		parent::beforeFilter();
		$this->Auth->allow('index');
	}
}
?>