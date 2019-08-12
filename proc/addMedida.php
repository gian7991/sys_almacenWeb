<?php
include('db_cnn.php');

if(isset($_POST['txtMedida']) && isset($_POST['txtUnidadMetrica'])) {

    $nom=$_POST['txtMedida'];
    $unidad=$_POST['txtUnidadMetrica'];

    $consulta = "INSERT INTO umedida VALUES (NULL,'$nom','$unidad')"; 

    if(!$resultado=$cn->query($consulta)){
        echo(0);
    }else{
        echo(1);
    }
}else{
    echo(0);
}
$cn->close(); 
?>