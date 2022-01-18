<html>

<head>
  <title>Editions</title>
  <meta charset="UTF-8">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">  </script>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="css/tablas.css">
    <!--https://www.w3schools.com/icons/google_icons_action.asp-->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!--https://www.w3schools.com/icons/fontawesome5_intro.asp-->


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
	      width:100%;
	      padding:20px;
      	border-radius:10px;
      	margin:auto;
      	background-color:#FFFFFF;
      }
     
      .fondo{
        background:url(img/lok26.jpeg);
        background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
      -o-background-size: cover;
      backdrop-filter: blur(3px);
      -webkit-backdrop-filter: blur(3px);
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

      (function(){
        setInterval(
          function(){
            var hor_actual= new Date().toLocaleString('es-MX');
            
           
          },
        1000)
      })()
    </script>

<?php
require("conexion.php");

session_start();
      //VALIDA LA SESSION
      $id_obtenido=$_SESSION['nuevasession_edicion'];
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
      $validacion_nombre="SELECT nombre,apaterno,amaterno FROM registro_edicion
      WHERE id=".$id_obtenido;
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

      
      <button class="Botones" onclick="location.href='eliminacion.php'">
          Eliminar
      </button>
      <button class="Botones" onclick="location.href='agregacion.php'">
          Agregar
      </button>
        
      <center><h3>
      <span class=""><?php echo $nombre_responsable; ?> </span>
      <p>Edicion</p>
      <p id="hora_actual1" style="rigth:20px;"><?php 
        date_default_timezone_set("America/Mexico_City");
        echo $fecha_actual=date("H:i:s");
        $fecha_actual1= strtotime ($fecha_actual);?></p>
      </h3>  </center>
      <br>
      <center>

      <script>
          function enviar_busqueda(){

            var busqueda= document.getElementById('busqueda').value;
            var filtro= document.getElementById('filtro').value;

            var dataen= 'busqueda='+busqueda+'&filtro='+filtro;

            $.ajax({

            type:'get',
            url:'consulta_busqueda.php',
            data:dataen,
            success:function(resp){
            $("#respa").html(resp);
            }

          });
          return false;
          }
	    </script>
      <form method="GET"  onsubmit="return enviar_busqueda();">
      <div class="imputt">
        <select nale="filtro" id="filtro">
          <option value="id">ID</option>
          <option value="ibshipment">Inbound Shipment</option>
        </select>
    		<input class="inputa" type="number" name="busqueda" id="busqueda" style="font-family: monospace ;font-size:16px; color:#000000;" placeholder="" autocomplete="off" required>
        <button class="Botones">
        Buscar
	      </button>
      </div>
      </form>

      <br>
      <p id="respa">
        </center>
      <button class="Botones" onclick="location.href='logout.php'">
          Salir
      </button>
    </div>
    </div>
    </div>
  </body>
</html>
