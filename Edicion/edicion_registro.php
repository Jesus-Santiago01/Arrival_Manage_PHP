<html>

<head>
  <title>Edicion Recibo</title>
  <meta charset="UTF-8">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">  </script>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="css/formulario.css">
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


<?php
require("conexion.php");

session_start();

$id_obtenido=$_SESSION['nuevasession_edicion'];
if($id_obtenido==""){
    echo '<script lenguage="javascript">alert("Debes de iniciar sesiòn");
        function redirecional(){
            document.location.href="index.html";
        }
        redirecional();
        </script>';
    }


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

    echo $id_recibo=$_GET['id_recibo'];?>


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
    <div  style="background-color:#ffffff;">
    <button class="Botones1" onclick="location.href='edicion.php'">
          Volver
      </button>
    <center><h3>
      <span class=""><?php echo $nombre_responsable; ?> </span>
      
      <p id="hora_actual1" style="rigth:20px;"><?php 
        date_default_timezone_set("America/Mexico_City");
        echo $fecha_actual=date("H:i:s");
        $fecha_actual1= strtotime ($fecha_actual);?></p>
      </h3>  </center>
      </div>
      <br>


<?php
    foreach ($link->query("SELECT * FROM recibo WHERE id_recibo = '$id_recibo'") as $row){ ?>
      
      <center>
        <form action="update_registro.php" method="POST" style="background: transparent;
		    background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
        -o-background-size: cover;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(7px);">
        
            <div class="form">
                <input type="text" name="id_recibo" autocomplete="off" id="id_recibo" class="form__input"
                placeholder=" " value="<?php echo $row['id_recibo'] ?>" readonly=»readonly»>
                <label for="id_recibo" class="form__label">ID Recibo</label>
            </div>
            <br>
            <div class="form">
                <input type="text" name="id_descarga" autocomplete="off" id="id_descarga" class="form__input"
                placeholder=" " value="<?php echo $row['id'] ?>" readonly=»readonly»>
                <label for="id_descarga" class="form__label">ID Descarga</label>
            </div>
            <br>
            <div class="form">
                <input type="text" name="fecha" autocomplete="off" id="fecha" class="form__input"
                placeholder=" " value="<?php echo $row['fecha']; echo ' '.$row['hora']; ?>" readonly=»readonly»>
                <label for="fecha" class="form__label">Fecha y Hora</label>
            </div>
            <br>
            <div class="form">
                <input type="text" name="ibshipment" autocomplete="off" id="ibshipment" class="form__input"
                placeholder=" " value="<?php echo $row['ibshipment'] ?>">
                <label for="ibshipment" class="form__label">Inbound Shipment</label>
            </div>
            <br>
            <div class="form">
                <input type="number" name="bultos" autocomplete="off" id="bultos" class="form__input"
                placeholder=" " value="<?php echo $row['bultos'] ?>">
                <label for="bultos" class="form__label">Bultos</label>
            </div>
            <br>
            <div class="form">
                <input type="text" name="guia" autocomplete="off" id="guia" class="form__input"
                placeholder=" " value="<?php echo $row['guia'] ?>">
                <label for="guia" class="form__label">Guia</label>
            </div>
            <br>
            <div class="form">
                <input type="text" name="pallet" autocomplete="off" id="pallet" class="form__input"
                placeholder=" " value="<?php echo $row['pallet'] ?>">
                <label for="pallet" class="form__label">Pallet</label>
            </div>
            <br>
            <button class="Botones1">Actualizar Registro</button>
        </form>
    <?php
    }
       

?>
</body>
</html>