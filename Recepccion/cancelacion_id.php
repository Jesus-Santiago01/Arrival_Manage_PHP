<?php
//PIDE LA CONEXION CON LA BD
require("conexion.php");
//EXTRAE DATOS ENVIADOS DE cancelar_formulario.php
$id=$_GET['id'];
$estatus=$_GET['estatus'];
//SI EL ESTATUS ES ACEPTADO VA A PODER CANCELAR EL ID Y LO DIRIJE A recepion.php
if ($estatus=="aceptado") {
  $cancelar ="UPDATE seller SET estatus='cancelado' WHERE id='$id'";
  $res= mysqli_query($link,$cancelar);
  echo '<script lenguage="javascript">alert("ID Cancelado");
  function redirecional(){
  document.location.href="recepccion.php";
  }
  redirecional();
  </script>';
//SI EL ESTATUS ES CANCELADO NO DEJA CANCELAR NUEVAMENTE EL ID Y LO DIRIJE A cancelar_formulario.php
}else if ($estatus=="cancelado") {
  echo '<script lenguage="javascript">alert("Este ID ya esta cancelado");
  function redirecional(){
  document.location.href="cancelar_formulario.php";
  }
  redirecional();
  </script>';
//DE CUALQUIER OTRA FORMA NO CANCELA EL ID Y LO DIRIJE A recepion.php
}else {
  echo '<script lenguage="javascript">alert("NO TIENES PERMISO PARA CANCELAR ESTE ID");
  function redirecional(){
  document.location.href="recepccion.php";
  }
  redirecional();
  </script>';
}
?>
