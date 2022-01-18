<html>
<head>
	<title>Receiving</title>
	<meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">  </script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="css/form.css">
	<style>
   .pa{
       letter-spacing: 4px;
       font-size: 20px;
       text-decoration: none;
       overflow: hidden;
       transition: 0.2s;
     }
     form{
	      width:90%;
	      padding:20px;
      	border-radius:10px;
      	margin:auto;
      	background-color:#FFFFFF;
      }
    
  </style>
</head>

<body class="fondo">
	<div class="contenedor">
	<div class="registrar">
	<div class="comentario">
	<?php
	//CONEXION
		require("conexion.php");
		session_start();
		//VALIDA LA SESSION
		$id_obtenido=$_SESSION['nuevasession_recibo'];
		if($id_obtenido==""){
			echo '<script lenguage="javascript">alert("Debes de iniciar sesiòn");
				function redirecional(){
					document.location.href="index.html";
				}
				redirecional();
				</script>';
		}
		//EXTRAER ID
		$id_tarea=$_POST['id'];
		//QUERY MYSQL BUSCA ID EXISTENTE
		$id_valido="SELECT id FROM id WHERE id='$id_tarea'";
		//EJECUTA QUERY
		$id_valido1=mysqli_query($link,$id_valido);
		//GUARDA EL VALOR DE LA QUERY EN UNA VARIABLE POR UNA MATRIZ
		while($matriz=mysqli_fetch_array($id_valido1)){
		//TRANSFORMA EN VALOR EL RESULTADO DE LA QUERY
		$id_validado=$matriz[0];
	}

		//BUSCA EL NOMBRE Y APELLIDOS EL USUARIO
		//QUERY1
		$validacion_nombre="SELECT nombre,apaterno,amaterno FROM registro_recibo
		WHERE id_responsable=".$id_obtenido;
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
		//INICIO DE VALIDACION DE ID EXISTENTES
		if($id_tarea==$id_validado){
			$update="UPDATE seller SET recibidor='$nombre_responsable',id_recibidor='$id_obtenido',estatus='asignado' WHERE id=$id_tarea";
			$resu=mysqli_query($link,$update);
	?>
<form action="tarea_aceptada.php" method="POST">
	<?php
			//MATRIZ DE DATOS OBTENIDOS
			foreach ($link->query("SELECT * FROM seller
		WHERE id='$id_tarea'") as $row){ // aca puedes hacer la consulta e iterarla con each. ?>
		<center><p> ID:  <input type="text" name="id" value="<?php echo $row['id']; ?>" readonly=»readonly»>
		<center><p> Recepccionista:  <input type="text" name="responsable_recepccion" value="<?php echo $row['responsable_recepccion']; ?>" readonly=»readonly»>
	  <center><p> Fecha:  <input type="text" name="fecha" value="<?php echo $row['fecha'] ?>" readonly=»readonly»>
		<center><p> Hora:  <input type="text" name="hora" value="<?php echo $row['hora'] ?>" readonly=»readonly»>
		<center><p> Operador:  <input type="text" name="operador" value="<?php echo $row['operador']; ?>"readonly=»readonly»>
		<center><p> Seller:  <input type="text" name="seller" value="<?php echo $row['seller']; ?>" readonly=»readonly»>
		<center><p> Cortina:  <input type="text" name="cortina" value="<?php echo $row['cortina']; ?>" readonly=»readonly»>
		<center><p> Carga:  <input type="text" name="carga" value="<?php echo $row['carga']; ?>" readonly=»readonly»>
		<center><p> Unidad:  <input type="text" name="unidad" value="<?php echo $row['unidad']; ?>" readonly=»readonly»>
		<center><p> Placas:  <input type="text" name="placas" value="<?php echo $row['placas']; ?>" readonly=»readonly»>
		<center><p> Estatus:  <input type="text" name="estatus" value="<?php echo $row['estatus']; ?>" readonly=»readonly»>
		<center><p> Documento: <center><br>
	<?php echo '<br><embed src="documento/'.$row['documento'].'" type="application/pdf" width="70%" height="750px" />'?>
	<?php
	}
		//ASIGNA EL ID Y EL ESTATUS A VARIABLES

		$estatus=$row['estatus'];?>
		<button class="Botones">
			Tomar tarea
		</button>
		</form>
		<button class="Botones" onclick="location.href='tarea_rechazada.php'">
		 Rechazar tarea
		</button>
	<?php }else {
			echo '<script lenguage="javascript">
			alert("ID inexistente");
			function redirecional(){
			document.location.href="recibo.php";
			}
			redirecional();
			</script>';
		}
		?>
	</div>
	</div>
	</div>
</body>
</html>
