<?php
//PIDE LA CONEXION CON LA BD
require("conexion.php");
//EXTRAE EL ID INGRESADO
$consulta=$_GET['consul'];
//session_start — Iniciar una nueva sesión o reanudar la existente
session_start();
//VALIDA LA SESSION
$id__obtenido=$_SESSION['nuevasession'];
//BUSCA EL NOMBRE Y APELLIDOS EL USUARIO
//QUERY1
$validacion_nombre="SELECT nombre,apaterno,amaterno FROM registro_recepccion
WHERE id_responsable=".$id__obtenido;
//EJECUTA QUERY1
$result_query1=mysqli_query($link,$validacion_nombre);
//CONVIERTE LOS DATOS OBTENIDOS DE LA QUERY EN VARIABLES A TRAVEZ DE LA MATRIZ
while($matriz1=mysqli_fetch_array($result_query1)){
//ASIGNACION DE VARIABLE A LOS RESULTADOS DE MATRIZ
    $nombre_obtenido=$matriz1[0];
    $apaterno_obtenido=$matriz1[1];
    $amaterno_obtenido=$matriz1[2];
}
//UNE EL RESULTADO DE LA MATRIZ EN UNA VARIABLE
//UNE EL NOMBRE DEL USUARIO
$nombre_responsable=$nombre_obtenido." ".$apaterno_obtenido." ".$amaterno_obtenido;
?>
<body>
  <form action="cancelacion_id" method="GET">
    <?php

    foreach ($link->query("SELECT * FROM seller
   	WHERE id='$consulta'") as $row){ // aca puedes hacer la consulta e iterarla con each. ?>
   	<center><p  style="font-size: 30px; font:AR ESSENCE;"> ID: <?php echo $row['id'] ?>
   	<center><p  style="font-size: 30px; font:AR ESSENCE;"> Recepccion: <?php echo $row['responsable_recepccion'] // aca te faltaba poner los echo para que se muestre el valor de la variable.  ?>
     <center><p style="font-size: 30px; font:AR ESSENCE;"> Fecha y hora: <?php echo $row['fecha'] ?> <?php echo $row['hora'] ?>
   	<center><p  style="font-size: 30px; font:AR ESSENCE;"> Operador: <?php echo $row['operador'] ?>
   	<center><p  style="font-size: 30px; font:AR ESSENCE;"> Seller: <?php echo $row['seller'] ?>
   	<center><p  style="font-size: 30px; font:AR ESSENCE;"> Cortina: <?php echo $row['cortina'] ?>
   	<center><p  style="font-size: 30px; font:AR ESSENCE;"> Carga: <?php echo $row['carga'] ?>
   	<center><p  style="font-size: 30px; font:AR ESSENCE;"> Unidad: <?php echo $row['unidad'] ?>
   	<center><p  style="font-size: 30px; font:AR ESSENCE;"> Placas: <?php echo $row['placas'] ?>
   	<center><p  style="font-size: 30px; font:AR ESSENCE;"> Estatus: <?php echo $row['estatus'] ?>
   	<center><p  style="font-size: 30px; font:AR ESSENCE;"> Documento: <?php echo '<br><embed src="documento/'.$row['documento'].'" type="application/pdf" width="70%" height="1150px" />'?>

    <?php
  }
  //ASIGNA EL ID Y EL ESTATUS A VARIABLES
  $borrar_id=$row['id'];
	$estatus=$row['estatus'];
  ?>
</center>
<center>
<br>
<!--MANDA EL ID Y EL ESTATUS A cancelacion_id.php-->
<button class="Botones" onclick="location.href=<?php echo "'tarea_rechazada.php?id=$borrar_id&estatus=$estatus'";
	?>">
 Cancelar ID
</button>
</center>
  </form>
</body>
