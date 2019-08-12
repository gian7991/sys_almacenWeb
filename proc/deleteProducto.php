<?php
include('db_cnn.php');

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $consulta = "delete from producto where id=$id"; 

  if(!$resultado=$cn->query($consulta)){
        echo(0);
    }else{
        echo(1);
    }    
}
$cn->close(); 
?>