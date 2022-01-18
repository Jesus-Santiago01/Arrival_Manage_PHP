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
      $id_obtenido=$_SESSION['nuevasession'];
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
      window.location.href ='recepccion.php';
      
      </script>
      <?php
      }

?>
<script>
function actualizar(){
    document.getElementById('dev').src='actualizar_formulario.php';
  }

</script>

<form method="POST" action="datos_seller.php" enctype="multipart/form-data">
<div class="table-container">
<table class="table-rwd">

				
<thead>
    <tr> 
        <th>ID</th>
        <th>OPERADOR</th>
        <th>PLACAS</th>
        <th>CORTINA</th>
        
    </tr>
</thead>
<?php foreach ($link->query("SELECT id,operador,placas,cortina from seller WHERE id='$consulta' ") as $row){ // aca puedes hacer la consulta e iterarla con each.      ?>

<tr>
    
    <td><input type="text" name="id" value="<?php echo $row['id']; ?>" 
    style=" width: 50px;" readonly=»readonly»> </td>
    <td> <?php echo $row['operador'] ?></td>
    <td> <?php echo $row['placas'] ?></td>
    <td> <?php if ($row['cortina']==0){
		echo "Sin asignar";
	}else if($row['cortina']>0){
		echo $row['cortina'];
	} ?> </td>

    <script>
    var consul= document.getElementById('cortina').value;
    
    </script>
    
    
 </tr>
<?php
    }
?>
</table></center>
  </div>
  <br><br>
  
      <center>
	  <label>
        <small>ADJUNTA DOCUMENTO</small><br><br>
        <input type="file" name="image_post" title="ADJUNTAR DOCUMENTO"/>
        </label>
    
	<br><br>
  <button class="Botones" name="btnguardar">
     Guardar
 </button>
</form>

</body>
</html>
