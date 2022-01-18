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
$cortina=$_GET['cortina'];

$cortina_query ="UPDATE seller SET cortina='$cortina',cortina_hora=NOW() WHERE id='$id'";

$result_query1=mysqli_query($link,$cortina_query);

echo '<script lenguage="javascript">
		function redirecional(){
		document.location.href="drop.php";
		}
		redirecional();
		</script>';
?>