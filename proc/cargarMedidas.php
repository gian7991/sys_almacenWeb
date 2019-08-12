<?php
  include('db_cnn.php');

  $query = "SELECT * from umedida";

  if(!$resultado=$cn->query($query)) {
    echo("FALLA EN cargarProductos.php");
  }

  $json = array();
  while($row=$resultado->fetch_array()) {
    $json[] = array(
        'id' => $row['id'],
        'abreviatura' => $row['abreviatura']    
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>