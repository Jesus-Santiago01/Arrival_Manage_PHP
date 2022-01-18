<?php

require("conexion.php");

session_start();
      //VALIDA LA SESSION
      $id_obtenido=$_SESSION['nuevasession_patio'];
      if($id_obtenido==""){
        echo '<script lenguage="javascript">alert("Debes de iniciar sesiòn");
					function redirecional(){
						document.location.href="index.html";
					}
					redirecional();
					</script>';
      }

$id=$_GET['id'];
$operador=$_GET['operador'];
$seller=$_GET['seller'];
$carga=$_GET['carga'];
$unidad=$_GET['unidad'];
$placas=$_GET['placas'];
$tipo=$_GET['tipo'];

$datos_query ="UPDATE seller SET operador='$operador', seller='$seller',
carga='$carga', unidad='$unidad', placas='$placas',tipo='$tipo' WHERE id='$id'";

$result_query1=mysqli_query($link,$datos_query);

echo '<script lenguage="javascript">
		function redirecional(){
		document.location.href="drop.php";
		}
		redirecional();
		</script>';

?>