<?php
    date_default_timezone_set("America/Lima");
    include('../db_cnn.php');
    header('Content-Type:text/csv; charset=latin1');
    header('Content-Disposition: attachment; filename="Reporte_Articulos-'.date('d/m/y H:i:s').'.csv"');

    $salida=fopen('php://output','w');

    $query = 'select p.id,p.nombre,p.cantidad,p.precio,p.presentacion,m.unidad,p.f_registro,f_caducidad,u.usuario from producto p inner join umedida m on m.id=p.id_medida inner join usuario u on u.id=p.id_usuario';
    if(!empty($_POST["dtInicial"]) && !empty($_POST["dtFinal"])){
        $fInicial=$_POST["dtInicial"];
        $fFinal=$_POST["dtFinal"];
        $query.=" Where p.f_registro between '$fInicial' and '$fFinal'";
    }

    //Encabezados
    fputcsv($salida,array('Id','Nombre','Cantidad','Precio','Presentacion','Unidad','Fecha Registro','Fecha Caducidad','Usuario'),';');

    if(!$resultado=$cn->query($query)) {
        //Encabezados
        fputcsv($salida,array('Falla En el Sistema'),';');
    }

    

    while($row=$resultado->fetch_array()) {
        fputcsv($salida,array($row['id'],
            $row['nombre'],
            $row['cantidad'],
            $row['precio'],
            $row['presentacion'],
            $row['unidad'],
            $row['f_registro'],
            $row['f_caducidad'],
            $row['usuario']),';');
    }

    fclose($salida);
    $cn->close();

?>