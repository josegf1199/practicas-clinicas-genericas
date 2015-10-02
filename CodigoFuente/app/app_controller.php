<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of app_controller
 *
 * @author Gerardo
 */
 
App::import('Sanitize');
 
class AppController extends Controller 
{
	var $helpers = array('Html', 'Time', 'Paginator', 'Form', 'Session');
	var $components = array('Session', 'Auth');
	
	function beforeFilter() 
    {
        //parent::beforeFilter();
        
       	$os = env('OS');
        if (!empty ($os) && strpos($os, 'Windows') !== false) 
        {
        	setlocale(LC_ALL, 'Spanish');            
        } 
        else 
        {
        	setlocale(LC_ALL, 'es_ES');                      
        }
        
        App::import('L10n');
        $this->L10n = new L10n;
        $this->L10n->get('spa');
        
        Configure::write('Config.language','spa');
       				
		$this->Auth->loginError = __('El nombre de usuario o la contraseña no son correctos',true);
        $this->Auth->authError = __('No has iniciado sesión para poder acceder al contenido',true);
        $this->Auth->loginError = __('El nombre de usuario o la contraseña no son correctos',true);
		
	    //debug($region);
	    
    }
}
?>
