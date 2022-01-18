<html>
<head>
  <meta charset="UTF-8">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">  </script>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="css/tablas.css">
    <!--https://www.w3schools.com/icons/google_icons_action.asp-->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!--https://www.w3schools.com/icons/fontawesome5_intro.asp-->


</head>
<body>
<?php
require("conexion.php");
$consulta=$_GET['consul'];

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
      $tarea_existente="SELECT * FROM seller 
      WHERE id='$consulta' AND estatus!='terminado'";
      $resu_tarea=mysqli_query($link,$tarea_existente);
      if($resu_tarea->num_rows <=0){
      
        ?>
      <script>
      alert("Este ID no existe");
      window.location.href ='drop.php';
      
      </script>
      <?php
      }
?>
<script>
function actualizar(){
    document.getElementById('dev').src='actualizar_formulario.php';
  }

</script>

<form method="GET" action="guardar_cortina.php">
<div class="table-container">
<table class="table-rwd">

				
<thead>
    <tr> 
        <th>ID</th>
        <th>OPERADOR</th>
        <th>PLACAS</th>
        <th>CORTINA</th>
        <th>ESTATUS</th>
        <th></th>
    </tr>
</thead>
<?php foreach ($link->query("SELECT id,operador,placas,estatus from seller WHERE id='$consulta' ") as $row){ // aca puedes hacer la consulta e iterarla con each.      ?>

<tr>
    
    <td><input type="text" name="id" value="<?php echo $row['id']; ?>" 
    style=" width: 50px;" readonly=»readonly»> </td>
    <td> <?php echo $row['operador'] ?></td>
    <td> <?php echo $row['placas'] ?></td>
    <td> <select name="cortina" id="cortina" style="width: 100px;">
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
              </select></td>
      <td> <?php echo $row['estatus'] ?></td>

    <script>
    var consul= document.getElementById('cortina').value;
    
    </script>
    
    <td><button class="Botones" name="btnguardar">
            Guardar
        </button></td>
 </tr>
<?php
    }
?>
</table></center>
  </div>
</form>
<br><br>
<button class="Botones" onclick="location.href=<?php echo "'actualizar_formulario.php?id=$consulta'";
	?>">
  Actualizar Datos
 </button>
  <button class="Botones" onclick="location.href=<?php echo "'cancelacion_id.php?id=$consulta'";
	?>">
   Cancelar Registro
  </button> 
</body>
</html>
