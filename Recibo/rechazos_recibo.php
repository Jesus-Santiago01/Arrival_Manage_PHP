<!DOCTYPE html>
<html lang="en">
<head>
	<title>Rechazos</title>
	<meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">  </script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/form.css">

</head>

	<body class="fondo">
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

<div class="contenedor">
<div class="registrar">
		<div class="comentario">
			<center>


				<button class="Botones">
				Volver
				</button>



		<h3>Rechazos</h3>
		<p>Solo si es rechazo de MELI´S llena el campo "MELI" y "Unidades rechazadas"</p>
		</div>

		<div class="limite">



		</div>
<br>
<form action="rechazos.php" method="POST">
		<div class="imputt">
			<span class="labelinput" >ID:</span>
			<?php echo $consulta; ?>
		</div>


		<div class="imputt">
			<span class="labelinput" >IS</span>
			<input class="inputa" type="text" name="is"   placeholder="Ingresa IS..." required>
			<span class="imputf"></span>
		</div>

		<div class="imputt">
			<span class="labelinput">MELI</span>
			<input class="inputa" type="text" name="ml"   placeholder="Ingresa MELI..." >
			<span class="imputf"></span>
		</div>

		<div class="imputt">
			<span class="labelinput" >Unidades Rechazadas</span>
			<input class="inputa" type="text" name="un"   placeholder="Ingresa la cantidad de unidades..." >
			<span class="imputf"></span>
		</div>
		<div class="imputt">
				<span class="labelinput" > Motivo de Rechazo </span>
				<input class="inputa" type="text" name="mt" placeholder="Ingresa el motivo de rechazo..." required>
				<span class="imputf"> </span>
			</div>

<center>
			<button class="Botones">
	Registrar
		</button>
</form>
</div>
</div>


	</body>
</html>
