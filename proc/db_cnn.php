<?php
    // conexion mysqli metodo POO
    $server='localhost';
    $database='db_almacen';
    $usuario='root';
    $password='48836498@';
    $cn=new mysqli($server,$usuario,$password,$database);

    // conexion PDO a mysql
    //$cnPDO=new PDO("mysql:host=$server;dbname=$database",$usuario,$password);
?>