<?php
    include('db_cnn.php');
    
    $cantidad=$_POST['txtEditarCantidad'];
    $precio=$_POST['txtEditarPrecio'];
    $caducidad=$_POST['dtEditarCaducidad'];
    $id=$_POST['id'];

    $consulta="update producto set cantidad=$cantidad, precio=$precio,f_caducidad='$caducidad' where id=$id";
    
    if(!$resultado=$cn->query($consulta)){
        echo(0);
    }else{
        echo(1);
    }

    $cn->close();
?>