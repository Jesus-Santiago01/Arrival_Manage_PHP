<?php
//conexion a BD
$link= mysqli_connect("127.0.0.1","root","","arrival");
// Validar la conexión de base de datos.
  if ($link ->connect_error) {
    die("Conexion a BD fallida, contacta al administrador: " . $link ->connect_error);
  }
?>
