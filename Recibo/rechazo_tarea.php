<html>
<head>
    <title>Receiving</title>
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
      .fondo{
        background:url(img/lok6.jpg);
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
$id=$_GET['id'];

require("conexion.php");
$id1="SELECT id FROM seller WHERE id='$id'";
$result_id=mysqli_query($link,$id1);
while($matriz1=mysqli_fetch_array($result_id)){

    $id2=$matriz1[0];

}
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
      if ($resu_recibiendo->num_rows >0){
        ?>
        <script>
        alert("Tienes una tarea pendiente recibo");
        window.location.href ='formulario_descarga.php?id=<?php echo $id_recibiendo1; ?>';
    
        </script>
        <?php
      }

?>

<div class="contenedor">
<div class="registrar">
<div class="comentario">

<script>
      function abrir(){
      document.getElementById("ventana").style.display="block";
      }
      function cerrar(){
      document.getElementById("ventana").style.display="none";
      }
</script>

<div class="ventana" id="ventana">
    <div id="cerrar3">
      <button class="Botones" onclick="location.href='javascript:cerrar()'" >
      X</button>
      </div>
      <form action="causal_rechazo.php" method="POST">
      <h3>SOLICITA LA AUTORIZACIÓN A TU TEAM LIDER</h3><br>
      <h4>ID:
      <input class="" type="text" name="id" id="id" value="
     <?php
      echo $id;
      ?> "  readonly=»readonly»></h4>

      <br><br>
      <h4>Confirmación</h4>
      <div class="imputt">
      <input class="inputa" type="password" name="confirmacion"  id="confirmacion" placeholder="Ingresa la clave de confirmación..." required>
      <span class="imputf"></span>
      </div>

      <br><br>
      <button class="Botones">
      Continuar
      </button>
    
    </div>

<center><h3>¿Porque quieres rechazar la tarea?</h3><br>
<h4>ID:<input  type="text" name="id" value="<?php echo $id; ?>" readonly=»readonly»></h4><br><br>
    <table class="tabla">
    <thead>
        <tr>
            <th><h4>Motivo</h4></th>
        </tr>
    </thead>
        <tr>
            <td>
            <select name="motivo" class="motivo" id="motivo" style="width: 300px;">
                  <option value="termino de turno">Termino de turno</option>
                  <option value="hora de comida">Hora de comida</option>
                  <option value="servicio medico">Servicio medico</option>
              </select>
            </td>
        </tr>
    </table>
    <button class="Botones" onclick="location.href='javascript:abrir()'">
      Continuar
    </button>
    </form>
</div>
</div>
</div>
</body>
</html>