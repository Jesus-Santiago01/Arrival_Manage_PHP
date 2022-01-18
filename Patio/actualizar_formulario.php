<head>
    <title>Patio</title>
    	<meta charset="UTF-8">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">  </script>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="css/form.css">
  </head>
<?php

require("conexion.php");
$consulta=$_GET['id'];


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

?> 
<style>
     .registrar  input{
    
    outline: none;
    border-radius: 5px;
    border: 1px solid #000000;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
    text-align: center;
  }
  .registrar  input:focus{
    border-color: #FFF05C;
  }
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
        background:url(img/patio.webp);
        background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
      -o-background-size: cover;
      backdrop-filter: blur(3px);
      -webkit-backdrop-filter: blur(3px);
      
  }

</style>
<body class="fondo">
<div class="contenedor">
<div class="registrar">
<div class="comentario">
<button class="Botones" onclick="location.href='drop.php'">
        Volver
    </button>
    <center><h2>Actualizar Datos </h2>
	<form action="actualizar_id.php" method="GET">
		<?php

		foreach ($link->query("SELECT * FROM seller
	WHERE id='$consulta'") as $row){ // aca puedes hacer la consulta e iterarla con each. ?>
	<center><p> ID:  <input  type="text" name="id" value="<?php echo $row['id']; ?>" autocomplete="off" readonly=»readonly»><br><br>
  <center><p> Fecha:  <input type="text" name="fecha" value="<?php echo $row['fecha'] ?>" autocomplete="off" readonly=»readonly»><br><br>
	<center><p> Hora:  <input type="text" name="hora" value="<?php echo $row['hora'] ?>" autocomplete="off" readonly=»readonly»><br><br>
	<center><p> Operador:  <input type="text" name="operador" value="<?php echo $row['operador']; ?>" autocomplete="off"><br><br>
	<center><p> Seller:  <input type="text" name="seller" value="<?php echo $row['seller']; ?>" autocomplete="off"><br><br>
	
	<center><p> Carga:  <input type="text" value="<?php echo $row['carga']; ?>" autocomplete="off" readonly=»readonly»> 
  <select name="carga" class="" id="carga" style="width: 100px;">
                <option value="granel">Granel</option>
                <option value="entarimado">Entarimado</option>
              </select><br><br>
	<center><p> Unidad:  <input type="text"  value="<?php echo $row['unidad']; ?>" autocomplete="off" readonly=»readonly»>
  <select name="unidad" class="" id="unidad" style="width: 100px;">
              <option value="particular">Particular</option>
              <option value="camioneta 1.5">Camioneta 1.5</option>
              <option value="camioneta 3.5">Camioneta 3.5</option>
              <option value="torton">Torton</option>
              <option value="rabon">Rabon</option>
              <option value="trailer">Trailer</option></select>
              <br><br>
              <center><p> Tipo:  <input type="text"  value="<?php 
              if($row['tipo']=='f1'){
                echo 'Formula IB';
              }else if($row['tipo']=='r1'){
                echo 'Regular IB';
              }else if($row['tipo']=='tr'){
                echo 'Transfer';
              }else if($row['tipo']=='cl'){
                echo 'Colecta';
              }
              ?>" autocomplete="off" readonly=»readonly»>
  <select name="tipo" class="" id="tipo" style="width: 100px;">
              <option value="f1">Formula IB</option>
              <option value="r1">Regular IB</option>
              <option value="tr">Transfer</option>
              <option value="cl">Colecta</option></select>
              <br><br>
	<center><p> Placas:  <input type="text" name="placas" value="<?php echo $row['placas']; ?>" autocomplete="off" ><br><br>
	<center><p> Estatus:  <input type="text" name="estatus" value="<?php echo $row['estatus']; ?>" readonly=»readonly»>
	
	
<?php
}
	//ASIGNA EL ID Y EL ESTATUS A VARIABLES
	$estatus=$row['estatus'];
	?>
</center>
<center>
<br>
<!--MANDA EL ID Y EL ESTATUS A cancelacion_id.php-->
<button class="Botones">
  Confirmar
 </button>
</center>
  </form>
</div>
</div>
</div>
</body>