<?php

    header('Content-Type:text/csv; charset=latin1');
    header('Content-Disposition: attachment; filename="Reporte_Fechas_Ingreso.csv"');

    $salida=fopen('php://output','w');

    //Encabezados
    fputcsv($salida,array('Id','Nombre'),';');

    fputcsv($salida,array(1,'predrito'),';');

    fclose($salida);
    echo("Correto!");


?>