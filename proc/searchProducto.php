<?php
  include('db_cnn.php');

  $id=$_POST['id'];

  $query = "SELECT * from producto p inner join umedida m on m.id=p.id where p.id=$id";

  if(!$resultado=$cn->query($query)) {
    echo("FALLA EN cargarProductos.php");
  }

  $json = array();
  while($row=$resultado->fetch_array()) {
    $json[] = array(
        'nombre' => $row['nombre'],
        'cantidad' => $row['cantidad'],
        'precio' => $row['precio'],
        'f_caducidad' => $row['f_caducidad']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>