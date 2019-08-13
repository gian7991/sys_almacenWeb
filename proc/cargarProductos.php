<?php
  include('db_cnn.php');

  $query = "SELECT * from producto p inner join umedida m on m.id=p.id";

  if(!$resultado=$cn->query($query)) {
    echo("FALLA EN cargarProductos.php");
  }

  $json = array();
  while($row=$resultado->fetch_array()) {
    $json[] = array(
      'id' => $row['id'],
      'nombre' => $row['nombre'],
      'cantidad' => $row['cantidad'],
      'precio' => $row['precio'],
      'presentacion' => $row['presentacion'],
      'unidad' => $row['unidad'],
      'f_registro' => $row['f_registro'],
      'f_caducidad' => $row['f_caducidad']   
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>