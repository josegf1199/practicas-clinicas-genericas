<?php

	$worksheets = '';

	$contador=0;
	
	foreach($clases as $ca)
	{
	
	$contador++;

	$rows = '';	

	// Obtenemos los datos del alumnos
	$cells = '';
	$cells .= $excel->hcell('Datos del Alumno');
	$rows .= $excel->row($cells);
	$cells = '';
	$rows .= $excel->row($cells);
	$cells = '';
	$cells .= $excel->hcell('Nombre');
	$cells .= $excel->Cell($ca['Alumno']['nombre']);
	$rows .= $excel->row($cells);
	$cells = '';
	$cells .= $excel->hcell('Apellidos');
	$cells .= $excel->Cell($ca['Alumno']['apellidos']);
	$rows .= $excel->row($cells);
	$cells = '';
	$cells .= $excel->hcell('Dni');
	$cells .= $excel->Cell($ca['Alumno']['dni']);
	$rows .= $excel->row($cells);
	$cells = '';
	$rows .= $excel->row($cells);

	// Obtenemos los datos de la practica

	$cells = '';
	$cells .= $excel->hcell('Datos de la Práctica Clínica');
	$rows .= $excel->row($cells);
	$cells = '';
	$rows .= $excel->row($cells);
	$cells = '';
	$cells .= $excel->hcell('Código');
	$cells .= $excel->Cell($practica['Practica']['codigo']);
	$rows .= $excel->row($cells);
	$cells = '';
	$cells .= $excel->hcell('Nombre');
	$cells .= $excel->Cell($practica['Practica']['nombre']);
	$rows .= $excel->row($cells);
	$cells = '';
	$rows .= $excel->row($cells);

	// Obtenemos los datos de las sesiones de practicas

	$cells = '';
	$cells .= $excel->hcell('Datos de la Práctica Clínica');
	$rows .= $excel->row($cells);
	$cells = '';
	$rows .= $excel->row($cells);
	$cells = '';
	

	$cells .= $excel->hcell('Fecha');
	$cells .= $excel->hcell('Lugar');
	$cells .= $excel->hcell('Habilidades');
	$cells .= $excel->hcell('Nota');
	$cells .= $excel->hcell('Observaciones');
				
	$rows .= $excel->row($cells);
		
	foreach($ca['Clases'] as $clase)
	{
		$cells = '';
						
		$cells .= $excel->Cell($clase['Clase']['fecha']);
		$cells .= $excel->Cell($clase['Clase']['lugar']);
		$cells .= $excel->Cell($clase['Clase']['conocimientos']);
		$cells .= $excel->Cell($clase['Clase']['nota']);
		$cells .= $excel->Cell($clase['Clase']['observaciones']);

		$rows .= $excel->row($cells);	
	}
	
	$cells = '';
	$rows .= $excel->row($cells);

	$worksheets .= $excel->worksheet('Alumno'.$contador, $rows);
	
	}
	
	$excel->setHeader('Practicas');
	echo $excel->workbook($worksheets);
	
?>