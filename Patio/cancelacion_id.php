<?php
//PIDE LA CONEXION CON LA BD
require("conexion.php");
//EXTRAE DATOS ENVIADOS DE cancelar_formulario.php
$id=$_GET['id'];

$estatus ="SELECT estatus FROM seller WHERE id='$id'";
$resultado_estatus= mysqli_query($link,$estatus);
while ($matriz2=mysqli_fetch_array($resultado_estatus)) {
    $estatus_real=$matriz2[0];
  }

if($estatus_real=="aceptado"){

    $cancelacion_query="UPDATE seller SET estatus='cancelado' WHERE id='$id'";
    $resultado_cancelacion=mysqli_query($link,$cancelacion_query);
    echo '<script lenguage="javascript">alert("ID Cancelado");
    function redirecional(){
        document.location.href="drop.php";
        }
        redirecional();
  </script>';
}else if($estatus_real=="cancelado"){
    echo '<script lenguage="javascript">alert("Este ID ya esta cancelado");
    function redirecional(){
        document.location.href="drop.php";
        }
        redirecional();
  </script>';
}else{
    echo '<script lenguage="javascript">alert("NO TIENES PERMISO PARA CANCELAR ESTE ID");
  function redirecional(){
  document.location.href="drop.php";
  }
  redirecional();
  </script>';
}
?>
