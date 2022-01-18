<html>

  <head>
    <title>Patio</title>
    	<meta charset="UTF-8">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">  </script>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="css/form.css">
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

  </style>
  <body class="fondo">
    <?php
    //PIDE LA CONEXION CON LA BD
      require("conexion.php");
      //session_start — Iniciar una nueva sesión o reanudar la existente
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
      //BUSCA EL NOMBRE Y APELLIDOS EL USUARIO
      //QUERY1
      $validacion_nombre="SELECT nombre,apaterno,amaterno FROM registro_patio
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
     ?>
    <div class="contenedor">
    <div class="registrar">
    <div class="comentario">
    <font size="6" face="AR ESSENCE";>
      <center>
        <!--Muesta el nombre del usuario-->
        <span class=""><?php echo $nombre_responsable; ?> </span>
      <div>
      <button class="Botones" onclick="location.href='drop.php'">
       DROP OFF
      </button>
      
    </div>
    </center>
    <center>
    </div>
    <form  action="datos_seller.php" method="POST" enctype="multipart/form-data">
      <center>
      <span class="">ID: </span>
      <?php
      //BUSCA EL NUMERO MAXIMO DE ID DEL USUARIO SEGUN SU id_responsable
      //QUERY2
      $maximo_id="SELECT MAX(id) FROM id WHERE id_responsable=".$id_obtenido;
      //EJECUTA QUERY2
      $result_query2=mysqli_query($link,$maximo_id);
      //CONVIERTE LOS DATOS OBTENIDOS DE LA QUERY EN VARIABLES A TRAVEZ DE LA MATRIZ
      while ($matriz2=mysqli_fetch_array($result_query2)) {
        echo $matriz2[0];
      }
      ?>
      </center>
      <br>
        <div class="imputt">
          <span class="labelinput" >Nombre Operador</span>
          <input class="inputa" type="text" name="operador"  id="operador"  placeholder="Nombre..." autocomplete="off" required>
          <span class="imputf"></span>
        </div>
        <div class="imputt">
          <span class="labelinput" >Seller</span>
          <input class="inputa" type="text" name="seller" id="seller" placeholder="Seller..."  autocomplete="off" required>
          <span class="imputf"></span>
        </div>
        <div class="imputt">
          <span class="labelinput">Placas</span>
          <input class="inputa" type="text" name="placas"id="placas" placeholder="Placas..."  autocomplete="off" required>
          <span class="imputf"></span>
        </div>
        <br>
        <center>
       <div class="imputt">
        <table class="tabla">

          <tr>
            <th style="font-size:30px;">Cortina</th>
            <th style="font-size:30px;">Carga</th>
            <th style="font-size:30px;">Unidad</th>
            <th style="font-size:30px;">Tipo</th>
          </tr>
          <tr>
            <td>
              <select name="cortina" class="" id="cortina" style="width: 100px;">
                  <option value="0">S/N</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                  <option value="32">32</option>
              </select>
            </td>
            <td>
              <select name="carga" class="" id="carga" style="width: 100px;">
                <option value="granel">Granel</option>
                <option value="entarimado">Entarimado</option>
              </select>
            </td>
            <td>
              <select name="unidad" class="" id="unidad" style="width: 100px;">
              <option value="particular">Particular</option>
              <option value="camioneta 1.5">Camioneta 1.5</option>
              <option value="camioneta 3.5">Camioneta 3.5</option>
              <option value="torton">Torton</option>
              <option value="rabon">Rabon</option>
              <option value="trailer">Trailer</option>
              <option value="a pie">A pie</option>
              <option value="motocicleta">Motocicleta</option></select>
            </td>
            <td>
              <select name="R_FIB" class="" id="R_FIB" style="width: 100px;">
                <option value="f1">Formula IB</option>
                <option value="r1">Regular IB</option>
                <option value="tr">Transfer</option>
                <option value="cl">Colecta</option>
              </select>
            </td>

        </table>
        
    </div>
      </div>
        <br>
      </center>
        <div class="comentario">
          <center>
            <button class="Botones">
            <a class="pa">Registrar</a>
            <span id="span1"></span>
            </button>
            </center>
        </div>
      </form>
      <button class="Botones" onclick="location.href='logout.php'">
        Salir
      </button>
      </div>
      </div>

  </body>


</html>
