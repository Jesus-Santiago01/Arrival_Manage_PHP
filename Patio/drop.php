<html>

<head>
  <title>Drop Off</title>
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
require("conexion.php");

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
<div class="contenedor">
<div class="registrar">
<div class="comentario">
<header>

</header>
<nav></nav>
<section id="contenedor">
  
</section>
<footer></footer>

    <button class="Botones" onclick="location.href='patio.php'">
        Volver
    </button>
      
     <center><h3>DROP OFF

     <p id="hora_actual1" style="rigth:20px;"><?php 
      date_default_timezone_set("America/Mexico_City");
      echo $fecha_actual=date("H:i:s");
      $fecha_actual1= strtotime ($fecha_actual);?></p>
     </h3>  </center>
     
    <br>
    <center>
    <button class="Botones" onclick="location.href='javascript:abrir()'">
        Opcciones</button>
    <button class="Botones" onclick="location.href='javascript:abrir2()'">
    En cortina</button>
    <button class="Botones" onclick="location.href='javascript:abrir3()'">
    Descargando</button>
    <button class="Botones" onclick="location.href='javascript:abrir4()'">
    Cortinas</button>
    <br><br>
    <div class="table-container">
    <table class="table-rwd">

				
        <thead>
				<tr> 
					<th>ID</th>
					<th>OPERADOR</th>
					<th>PLACAS</th>
					<th>UNIDAD</th>
					<th>LLEGADA</th>
          <th>DOCUMENTO</th>
          <th>CORTINA</th>
          <th>TIPO</th>
          <th>TIEMPO</th>
				</tr>
				</thead>
		<?php foreach ($link->query("SELECT * FROM seller WHERE cortina=0 AND estatus='aceptado'") as $row){ // aca puedes hacer la consulta e iterarla con each.      ?>
    
    <tr>
			
		    <td> <?php echo $row['id'] ?></td>
		    <td> <?php echo $row['operador'] ?></td>
				<td> <?php echo $row['placas'] ?></td>
        <td> <?php echo $row['unidad'] ?></td>
				<td> <?php echo $row['fecha']?><?php echo"     "?><?php echo $row['hora'] ?></td>
        <td> <?php 
        if($row['documento']==""){
            echo "Sin documentos";
        }else if($row['documento']!=""){
          echo "Con documentos";
        }
        ?></td>
        <td> <?php if ($row['cortina']==0){
		  echo "Sin asignar";
	    }else if($row['cortina']>0){
		  echo $row['cortina'];
	    } ?> </td>
      <td> <?php if($row['tipo']=='f1'){
                echo 'Formula IB';
              }else if($row['tipo']=='r1'){
                echo 'Regular IB';
              }else if($row['tipo']=='tr'){
                echo 'Transfer';
              }else if($row['tipo']=='cl'){
                echo 'Colecta';
              } ?></td>
        <td> <?php 
        $hora_id=strtotime($row['hora']);
        $tiempo_espera=$fecha_actual1-$hora_id;
        $_HH = floor($tiempo_espera/3600);
        $_MM = floor(($tiempo_espera - ($_HH * 3600))/60);
        $_SS = $tiempo_espera - ($_HH * 3600) - ($_MM * 60);
        echo $tiempo_espera1=$_HH . ":" . $_MM . ":" . $_SS;
        ?></td>
				
		 </tr>
		<?php
			}
		?>
		</table></center>

  </div>
  <script>
  function abrir(){
    document.getElementById("ventana").style.display="block";
    
    
  }

  function abrir2(){
    document.getElementById("ventana2").style.display="block";
    
    
  }

  function abrir3(){
    document.getElementById("ventana3").style.display="block";
    
    
  }
  
  function abrir4(){
    document.getElementById("ventana4").style.display="block";
    
    
  }

  function cerrar(){
    document.getElementById("ventana").style.display="none";
  }

  function cerrar2(){
    document.getElementById("ventana2").style.display="none";
  }

  function cerrar3(){
    document.getElementById("ventana3").style.display="none";
  }

  function cerrar4(){
    document.getElementById("ventana4").style.display="none";
  }
  
  function frame(){
    document.getElementById('limite').src='index.html';
  }
  

</script>

<div class="ventana4" id="ventana4">
    <div id="cerrar4">
    <button class="Botones" onclick="location.href='javascript:cerrar4()'" >
    X</button>
    </div>
    <br><br>
    <h2>Cortinas Disponibles</h2>
    <div class="limite">
    <div class="table-container">
    <table class="table-rwd">
    <thead>
      <tr> 
        <th>Cortina</th>
        <th>Estatus</th>
        
        
      </tr>
    </thead>
    <?php foreach ($link->query("SELECT DISTINCT(cortina)AS Disponible FROM seller WHERE cortina not in(SELECT DISTINCT(cortina) FROM seller WHERE estatus in('aceptado','descargando','asignado') AND cortina<>0) AND cortina<>0 ORDER by Disponible ASC") as $row){ // aca puedes hacer la consulta e iterarla con each.      ?>
      <tr>
    
      <td> <?php echo $row['Disponible'] ?></td>
      <td> <?php echo 'Disponible' ?></td>    
       </tr>
      <?php
        }
      ?>
      </table></center>
      </div>  
    </div>   

    <h2>Cortinas Ocupadas</h2>
    <div class="limite">
    <div class="table-container">
    <table class="table-rwd">
    <thead>
      <tr> 
        <th>Cortina</th>
        <th>Operador</th>
        <th>Placas</th>
        <th>Tipo</th>
        <th>Estatus</th>
        
        
      </tr>
    </thead>
    <?php foreach ($link->query("SELECT DISTINCT(cortina)AS Ocupada,operador AS operador1,placas AS placas1,tipo AS tipo1 FROM `seller` WHERE estatus in('aceptado','descargando','asignado') AND cortina<>0 ORDER BY Ocupada ASC") as $row){ // aca puedes hacer la consulta e iterarla con each.      ?>
      <tr>
    
      <td> <?php echo $row['Ocupada'] ?></td>
      <td> <?php echo $row['operador1'] ?></td>
      <td> <?php echo $row['placas1'] ?></td>

      <td> <?php if($row['tipo1']=='f1'){
                echo 'Formula IB';
              }else if($row['tipo1']=='r1'){
                echo 'Regular IB';
              }else if($row['tipo1']=='tr'){
                echo 'Transfer';
              }else if($row['tipo1']=='cl'){
                echo 'Colecta';
              } ?>  </td>  
      <td> <?php echo 'Ocupada' ?></td> 

       </tr>
      <?php
        }
      ?>
      </table></center>
      </div>  
    </div> 

  </div>

  <div class="ventana3" id="ventana3">
    Descargando

    <div id="cerrar3">
    <button class="Botones" onclick="location.href='javascript:cerrar3()'" >
    X</button>
    </div>
    <br><br>

    <div class="limite">
    <div class="table-container">
    <table class="table-rwd">
    <thead>
      <tr> 
        <th>ID</th>
        <th>OPERADOR</th>
        <th>PLACAS</th>
        <th>CORTINA</th>
        <th>RECIBIDOR</th>
        <th>TIPO</th>
        <th>ESTATUS</th>
        
      </tr>
    </thead>
    <?php foreach ($link->query("SELECT id,operador,placas,cortina,recibidor,estatus,tipo from seller WHERE estatus='descargando' AND cortina>0") as $row){ // aca puedes hacer la consulta e iterarla con each.      ?>
      <tr>
    
      <td><input type="text" name="id" value="<?php echo $row['id']; ?>" 
      style=" width: 80px;" readonly=»readonly»> </td>
      <td> <?php echo $row['operador'] ?></td>
      <td> <?php echo $row['placas'] ?></td>
      <td> <?php if ($row['cortina']==0){
		  echo "Sin asignar";
	    }else if($row['cortina']>0){
		  echo $row['cortina'];
	    } ?> </td>
      <td> <?php echo $row['recibidor'] ?></td> 
      <td> <?php if($row['tipo']=='f1'){
                echo 'Formula IB';
              }else if($row['tipo']=='r1'){
                echo 'Regular IB';
              }else if($row['tipo']=='tr'){
                echo 'Transfer';
              }else if($row['tipo']=='cl'){
                echo 'Colecta';
              } ?>  </td>    
      <td> <?php echo $row['estatus'] ?></td>     
       </tr>
      <?php
        }
      ?>
      </table></center>
      </div>  
    </div>   

  </div>


  <div class="ventana2" id="ventana2">

    En Cortinas
    <div id="cerrar2">
      <!-- } -->





      
    <button class="Botones" onclick="location.href='javascript:cerrar2()'" >
    X</button>
    </div>
    <br><br>
    <div class="limite">
    <div class="table-container">
    <table class="table-rwd">
    <thead>
      <tr> 
        <th>ID</th>
        <th>OPERADOR</th>
        <th>PLACAS</th>
        <th>CORTINA</th>
        <th>ESTATUS</th>
        <th>TIPO</th>
        <th>TIEMPO</th>
        <th>DOCUMENTO</th>
        
      </tr>
    </thead>
    <?php foreach ($link->query("SELECT id,operador,placas,cortina,estatus,documento,tipo,cortina_hora from seller WHERE estatus='aceptado' AND cortina>0") as $row){ // aca puedes hacer la consulta e iterarla con each.      ?>
      <tr>
    
      <td><input type="number" name="id" value="<?php echo $row['id']; ?>" 
      style=" width: 80px;" readonly=»readonly»> </td>
      <td> <?php echo $row['operador'] ?></td>
      <td> <?php echo $row['placas'] ?></td>
      <td> <?php if ($row['cortina']==0){
		  echo "Sin asignar";
	    }else if($row['cortina']>0){
		  echo $row['cortina'];
	    } ?> </td>
      <td> <?php echo $row['estatus'] ?></td>
      <td> 
        <?php if($row['tipo']=='f1'){
                echo 'Formula IB';
              }else if($row['tipo']=='r1'){
                echo 'Regular IB';
              }else if($row['tipo']=='tr'){
                echo 'Transfer';
              }else if($row['tipo']=='cl'){
                echo 'Colecta';
              } ?></td>
      <td> <?php 
        $hora_id=strtotime($row['cortina_hora']);
        $tiempo_espera=$fecha_actual1-$hora_id;
        $_HH = floor($tiempo_espera/3600);
        $_MM = floor(($tiempo_espera - ($_HH * 3600))/60);
        $_SS = $tiempo_espera - ($_HH * 3600) - ($_MM * 60);
        echo $tiempo_espera1=$_HH . ":" . $_MM . ":" . $_SS;
        ?></td>
      <td> <?php 
        if($row['documento']==""){
            echo "Sin documentos";
        }else if($row['documento']!=""){
          echo "Con documentos";
        }
        ?></td>
       </tr>
      <?php
        }
      ?>
      </table></center>
      </div>
    </div>   

  </div>
  <div class="ventana" id="ventana">
  
  Opciones de ID
  <div id="cerrar">
    <button class="Botones" onclick="location.href='javascript:cerrar()'" >
    X</button>
    
</div>
  
  <div class="limite">
      <script>
			function enviar(){

			var consul= document.getElementById('consul').value;

			var dataen= 'consul='+consul;

			$.ajax({

			type:'get',
			url:'consulta_query.php',
			data:dataen,
			success:function(resp){
			$("#respa").html(resp);
			}

			});
			return false;
			}
			</script>
     
    <form method="GET"  onsubmit="return enviar();">
		    <div class="query">
			    <div class="imputt">
            <span class="labelinput" >ID:
            <input class="inputa" type="number" name="consul"  id="consul"  placeholder="Ingresa ID..." autocomplete="off" required>
          <button class="Botones">
           Consultar
          </button></span>
          </div>
          <p id="respa">
		</form>
    </center>
  </div>
 
  
</div>
</div>
</div>
</div>
</body> 
</html>