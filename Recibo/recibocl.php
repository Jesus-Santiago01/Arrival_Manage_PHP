<html>
<head>
	<title>Receiving</title>
	<meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">  </script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="css/tablas.css">
</head>
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
      .fondo{
        background:url(img/lok6.jpg);
        background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
        -o-background-size: cover;
      }
     
  </style>
  <body class="fondo">
    <script>
      
      (function(){
        setInterval(
          function(){
            var hor_actual= new Date().toLocaleString('es-MX');
            
            $("#hora_actual1").html(hor_actual);
            

          },
        1000)
      })()
    </script>
		<?php
    //PIDE LA CONEXION CON LA BD
      require("conexion.php");
      //session_start — Iniciar una nueva sesión o reanudar la existente
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
      //VALIDA ID CON USUARIO ASIGNADO EN TAREA
	$id_asignado="SELECT id,id_recibidor,estatus,recibidor FROM seller 
	WHERE id_recibidor='$id_obtenido' AND recibidor='$nombre_responsable' AND estatus='asignado'";
	$resu_asignado=mysqli_query($link,$id_asignado);
	while($matriz2=mysqli_fetch_array($resu_asignado)){
		//ASIGNACION DE VARIABLE A LOS RESULTADOS DE MATRIZ
				$id_asignado1=$matriz2[0];
				$id_recibidor_asignado1=$matriz2[1];
				$estatus_asignado1=$matriz2[2];
				$recibidor_asignado1=$matriz2[3];
				
	}
	//VALIDA ID CON USUARIO RECIBIENDO EN TAREA
	$id_recibiendo="SELECT id,id_recibidor,estatus,recibidor FROM seller 
	WHERE id_recibidor='$id_obtenido' AND recibidor='$nombre_responsable' AND estatus='descargando'";
	$resu_recibiendo=mysqli_query($link,$id_recibiendo);
	while($matriz3=mysqli_fetch_array($resu_recibiendo)){
		//ASIGNACION DE VARIABLE A LOS RESULTADOS DE MATRIZ
				$id_recibiendo1=$matriz3[0];
				$id_recibidor_recibiendo1=$matriz3[1];
				$estatus_recibiendo1=$matriz3[2];
				$recibidor_recibiendo1=$matriz3[3];
				
	}
	if ($resu_asignado->num_rows >0){
    $asignacion_query="UPDATE seller SET estatus='aceptado',id_recibidor=0,recibidor='' WHERE id='$id_asignado1'";
      //EJECUTA QUERY1
      $result_query2=mysqli_query($link,$asignacion_query);
		?>
		<script>
		alert("Tienes una tarea pendiente");
		window.location.href ='asignacion_tarea2.php?id=<?php echo $id_asignado1; ?>';

		</script>
		<?php
		
	}
	else if ($resu_recibiendo->num_rows >0){
		?>
		<script>
		alert("Tienes una tarea pendiente recibo");
		window.location.href ='formulario_descarga.php?id=<?php echo $id_recibiendo1; ?>';

		</script>
		<?php
		
	}
?>
	</div>
<br><br >
<div class="contenedor">
<div class="registrar">
<div class="comentario">
<button class="Botones" onclick="location.href='recibo.php'">
Regular IB</button>
<button class="Botones" onclick="location.href='recibof1.php'">
Formula IB</button>
<button class="Botones" onclick="location.href='recibotr.php'">
Transfer</button>
<h1>Colecta</h1>

<center><h2><?php echo $nombre_responsable; ?>
<p id="hora_actual1" style="rigth:20px;"><?php 
      date_default_timezone_set("America/Mexico_City");
      $fecha_actual=date("H:i:s");
      $fecha_actual1= strtotime ($fecha_actual);?></p>
</h2>
<center>
<button class="Botones" onclick="location.href='javascript:abrir()'">
Tomar Tarea</button>
<br><br>
<div class="limite">
    <div class="table-container">
    <table class="table-rwd">
    <thead>
      <tr> 
        <th>ID</th>
        <th>LLEGADA</th>
        <th>TIEMPO</th>
        <th>ESTATUS</th>
      </tr>
    </thead>
    <?php foreach ($link->query("SELECT * from seller WHERE estatus='aceptado' AND cortina>0 AND documento!='' AND tipo='cl'ORDER BY cortina_hora") as $row){ // aca puedes hacer la consulta e iterarla con each.      ?>
      <tr>
        <td> <?php echo $row['id'] ?> </td>
        <td> <?php echo $row['fecha']?><?php echo"     "?><?php echo $row['hora'] ?></td>
        <td> <?php 
        $hora_id=strtotime($row['cortina_hora']);
        $tiempo_espera=$fecha_actual1-$hora_id;
        $_HH = floor($tiempo_espera/3600);
        $_MM = floor(($tiempo_espera - ($_HH * 3600))/60);
        $_SS = $tiempo_espera - ($_HH * 3600) - ($_MM * 60);
        echo $tiempo_espera1=$_HH . ":" . $_MM . ":" . $_SS;
        ?></td>
        <td> <?php echo $row['estatus'] ?> </td>
      </tr>
      <?php
        }
      ?>
      </table></center>
      </div>
    </div> 
<script>
function abrir(){
    document.getElementById("ventana").style.display="block";
    
    
  }

  function cerrar(){
    document.getElementById("ventana").style.display="none";
  }

</script>


<div class="ventana" id="ventana">
  Procesar Tarea
  <div id="cerrar">
  <button class="Botones" onclick="location.href='javascript:cerrar()'" >
  X</button>
  </div>
  <br><br>
  
  <form method="GET"  action="asignacion_tarea2.php">
		    <div class="query">
			    <div class="imputt">
            <span class="labelinput" >ID:
            <input class="inputa" type="number" name="id"  id="id"  placeholder="Ingresa ID..." autocomplete="off" required>
          <button class="Botones">
           Siguiente
          </button></span>
          </div>
		</form>
    
  </div>
  </div>
  <button class="Botones" onclick="location.href='logout.php'">
      Salir
    </button>
</div>
</div>
</div>
</body>
</html>
