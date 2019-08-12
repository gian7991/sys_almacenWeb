<?php
    include('db_cnn.php');
    session_start();        
    $nombre=$_POST['txtNombre'];
    $cantidad=$_POST['txtCantidad'];
    $precio=$_POST['txtPrecio'];
    $medida=$_POST['cbxMedida'];
    $presentacion=$_POST['txtPresentacion'];
    $caducidad=$_POST['dtCaducidad'];
    $idUsuario=$_SESSION['id'];

  //$consulta="CALL P_CRUD_PRODUCTOS (null,'$nombre',$cantidad,$precio,'$presentacion',$medida,$idUsuario,'D',now(),1)";
  $consulta="insert into producto values (null,'$nombre',$cantidad,$precio,'$presentacion',$medida,$idUsuario,'D',now(),'$caducidad')";
    
    if(!$resultado=$cn->query($consulta)){
        echo(0);
    }else{
        echo(1);
    }
    $cn->close();
?>