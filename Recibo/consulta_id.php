<head>
  <title>Recibo</title>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">  </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="css/form.css">
</head>
<style>
table {
  position: relative;
   width: 100%;
   border: 1px solid #000;
}
th, td {
  position: relative;
   width: 10%;
   text-align: left;
   vertical-align: top;
   border: 1px solid #000;
}
 .pa{
     letter-spacing: 4px;
     font-size: 20px;
     text-decoration: none;
     overflow: hidden;
     transition: 0.2s;
   }
   .contenedor{
     max-width: 10000px;
     width: 100%;
     background: #FFFFFF;
     padding: 25px 30px;
     border-radius: 8px;
   }
   form{
      width:90%;
      padding:20px;
      border-radius:10px;
      margin:auto;
      background-color:#FFFFFF;
    }
    .fondo{
      background:url(img/lok6.jpg);
      background-size: cover;
      -moz-background-size: cover;
      -webkit-background-size: cover;
      -o-background-size: cover;
    }

</style>
<?php
require("conexion.php");
$consulta=$_GET['id'];

?>
<?php
session_start();
$id__obtenido=$_SESSION['nuevasession_recibo'];
//BUSCA EL NOMBRE Y APELLIDOS EL USUARIO
//QUERY1
$validacion_nombre="SELECT nombre,apaterno,amaterno FROM registro_recibo
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



<body class="fondo">
  <div class="contenedor">
  <div class="registrar">
  <div class="comentario">
<table class="table table-striped">

		<thead>
		<tr>
			<center>
		<th>ID</th>
			<th>IS</th>
			<th>BULTOS</th>
			<th>PALLET</th>
			<th>GUIA</th>
			<th>TIPO</th>
		</tr>
		</thead>
<?php

foreach ($link->query("SELECT recibo.id,recibo.fecha,recibo.hora,recibo.ibshipment,
	recibo.bultos,recibo.pallet,recibo.guia,recibo.tipo,seller.operador,seller.seller,seller.cortina,
	seller.carga,seller.unidad FROM recibo,seller
	WHERE recibo.id='$consulta'AND seller.id='$consulta'AND seller.recibidor='$nombre_responsable'") as $row){ // aca puedes hacer la consulta e iterarla con each. ?>
<tr>
	<td><center><?php echo $row['id'] ?></td>
	<td><center><?php echo $row['ibshipment'] // aca te faltaba poner los echo para que se muestre el valor de la variable.  ?></td>
    <td><center><?php echo $row['bultos'] ?></td>
    <td><center><?php echo $row['pallet'] ?></td>
		<td><center><?php echo $row['guia'] ?></td>
		<td><center><?php echo $row['tipo'] ?></td>

 </tr>
<?php
	}
?>
</table>
</center>
</div>
</div>
</div>
</BODY>
