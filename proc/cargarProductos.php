<?php
  include('db_cnn.php');

  $query = "SELECT * from producto";

  if(!$resultado=$cn->query($query)) {
    echo("FALLA EN cargarProductos.php");
  }

  $json = array();
  while($row=$resultado->fetch_array()) {
    $json[] = array(
        'id' => $row['id'],
        'name' => $row['nombre'],
        'description' => $row['presentacion'],
        'fecha' => $row['f_caducidad']      
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>