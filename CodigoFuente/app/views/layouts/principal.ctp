<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<?php

//Forzamos el refresco en IE
header("Cache-Control: no-cache, must-revalidate");  // HTTP 1.1
header("Pragma: no-cache");                          // HTTP 1.0
header("Expires: Sun, 01 Mar 2009 00:00:00 GMT");    // fecha del pasado
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // fecha actual, modificándose siempre

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<?php echo $this->Html->charset(); ?>
		<title>Prácticas Clínicas</title>
		<?php
			echo $this->Html->meta('icon');
			echo $html->css('estilos'); ?>
								
			<!--[if IE]>
		        <?php echo $html->css('estilosIE'); ?>
		    <![endif]-->
				
	</head>
	
	<body>
		<div id="contenedorPrincipal">
									
			<div id="cabecera">
				<H1>PRÁCTICAS CLÍNICAS</H1>
			</div>
						
			<div id="contenidoPrincipal">
								
				<?php echo $session->flash(); ?>
				<?php echo $this->Session->flash('auth');?>
				
				<?php echo $content_for_layout; ?>
			</div>
		
			<div id="pie">
				
			</div>
			
		</div>
	</body>	

</html>