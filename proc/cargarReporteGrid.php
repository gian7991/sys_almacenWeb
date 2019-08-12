<?php
  include('db_cnn.php');

  $query = 'select p.id,p.nombre,p.cantidad,p.precio,p.presentacion,m.unidad,p.f_registro,f_caducidad,u.usuario from producto p inner join umedida m on m.id=p.id_medida inner join usuario u on u.id=p.id_usuario;';

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
        'f_caducidad' => $row['f_caducidad'],
        'usuario' => $row['usuario']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>