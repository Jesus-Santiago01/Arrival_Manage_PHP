<html>

<head>
<title>Recepción</title>
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
        background:url(img/lok13.jpg);
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
<div class="contenedor">
<div class="registrar">
<div class="comentario">
    <header>

    </header>
    <nav></nav>
    <section id="contenedor">
    
    </section>
    <footer></footer>

    <button class="Botones" onclick="location.href='recepccion.php'">
        Volver
    </button>
    <center><h3>Consultas</h3>
    <br>
    <center>
    <button class="Botones" onclick="location.href='javascript:abrir()'">
    Buscar</button>
    <br><br>
    <div class="table-container">
    <table class="table-rwd">

				
        <thead>
			<tr> 
				<th>ID</th>
				<th>OPERADOR</th>
				<th>PLACAS</th>
				<th>UNIDAD</th>
                <th>ESTATUS</th>
                <th>CORTINA</th>
				<th>LLEGADA</th>
                <th>DOCUMENTO</th>
			</tr>
		</thead>
		<?php foreach ($link->query("SELECT * FROM seller 
        WHERE fecha=CURDATE() ORDER BY fecha DESC;") as $row){ // aca puedes hacer la consulta e iterarla con each.      ?>
        <tr>
			
		    <td> <?php echo $row['id'] ?></td>
		    <td> <?php echo $row['operador'] ?></td>
			<td> <?php echo $row['placas'] ?></td>
            <td> <?php echo $row['unidad'] ?></td>
            <td> <?php echo $row['estatus'] ?></td>
            <td> <?php if ($row['cortina']==0){
		    echo "Sin asignar";
	        }else if($row['cortina']>0){
		    echo $row['cortina'];
	        } ?> </td>
			<td> <?php echo $row['fecha']?><?php echo"     "?><?php echo $row['hora'] ?></td>
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
    <script>
        function abrir(){
        document.getElementById("ventana").style.display="block";
        }
        function cerrar(){
        document.getElementById("ventana").style.display="none";
        }
  </script>
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
                url:'consulta_documentos.php',
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
            </button></span><br>
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
