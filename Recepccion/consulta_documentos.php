<?php
//PIDE LA CONEXION CON LA BD
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

?>

<body>
	<?php
	foreach ($link->query("SELECT * FROM seller
	WHERE id='$consulta'") as $row){ // aca puedes hacer la consulta e iterarla con each. ?>
	<center><p> ID:  <?php echo $row['id']; ?></p>
	<center><p> Fecha:  <?php echo $row['fecha'] ?></p>
	<center><p> Hora:  <?php echo $row['hora'] ?></p>
	<center><p> Operador:  <?php echo $row['operador']; ?></p>
	<center><p> Seller:  <?php echo $row['seller']; ?></p>
	<center><p> Cortina: <?php echo $row['cortina']; ?></p>
	<center><p> Carga:  <?php echo $row['carga']; ?></p>
	<center><p> Unidad: <?php echo $row['unidad']; ?></p>
	<center><p> Placas: <?php echo $row['placas']; ?></p>
	<center><p> Estatus: <?php echo $row['estatus']; ?></p>
	<center><p> Documento: <center><br>
	<?php if($row['documento']<>""){
	echo '<br><embed src="documento/'.$row['documento'].'" type="application/pdf" width="70%" height="1150px" />';
	}else
	{
		echo'<h1>';
		echo "Sin Documentos";
		echo'</h1>';
	}
	}?>
</center>
</body>
