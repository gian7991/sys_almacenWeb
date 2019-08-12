<?php
    $user=$_POST['user'];
    $pass=$_POST['pass'];

    include('db_cnn.php');
   
    //$consulta="CALL P_VAL_USUARIO('$user','$pass')";
    $consulta="select usuario,id from usuario where (usuario='$user' or correo='$user') and contrasena=md5($pass)";
    
    if(!$resultado=$cn->query($consulta)){
        echo("FALOO");
    }

    $row=$resultado->fetch_array();
    $run_num_rows = $resultado->num_rows;

    if($run_num_rows>0){
        session_start();
        $_SESSION['user']=$row['usuario'];
        $_SESSION['id']=$row['id'];
        echo(1);
    }else{
        echo(0);
    }
    $cn->close();
?>