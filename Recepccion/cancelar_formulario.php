<html>

<head>
  <title>Cancelaciones</title>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">  </script>
  <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="css/consultas.css">
</head>
<style>
	.fondo{
    background:url(img/lok13.jpg);
    background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
	}
</style>
<body class="fondo">
  <div class="contenedor">
    <div class="registrar">
    <center>
    <font size="6" face="AR ESSENCE";>
      <button class="Botones" onclick="location.href='recepccion.php'">
        Volver
      </button>
      <?php
      //PIDE LA CONEXION CON LA BD
        require("conexion.php");
        //session_start — Iniciar una nueva sesión o reanudar la existente
        session_start();
        //VALIDA LA SESSION
        $id__obtenido=$_SESSION['nuevasession'];
        if($id__obtenido==""){
          echo '<script lenguage="javascript">alert("Debes de iniciar sesiòn");
  					function redirecional(){
  						document.location.href="index.html";
  					}
  					redirecional();
  					</script>';
        }
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
    <h3>Cancelaciones de ID</h3>

    <div class="limite">
      <script>
			function enviar(){

			var consul= document.getElementById('consul').value;

			var dataen= 'consul='+consul;

			$.ajax({

			type:'get',
			url:'cancelar_query.php',
			data:dataen,
			success:function(resp){
			$("#respa").html(resp);
			}

			});
			return false;
			}
			</script>
      <br>
    <form method="GET"  onsubmit="return enviar();">
		    <div class"query">
			    <div class="imputt">
            <span class="labelinput" >ID:</span>
            <input class="inputa" type="text" name="consul"  id="consul"  placeholder="Ingresa ID..." required>
            <span class="imputf"></span>
          </div>
          <button class="Botones">
           Consultar
          </button>
          <p id="respa">
		</form>
    </center>
  </div>
  </div>
  </div>
  </div>

</body>

</html>
