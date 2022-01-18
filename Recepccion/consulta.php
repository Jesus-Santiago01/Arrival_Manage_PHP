<html>

<head>
  <title>Consultas</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">  </script>
  <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="css/form.css">

</head>

<style>
	.fondo{
		background: url(img/lok13.jpg) no-repeat center center fixed;
	  background-size: cover;
		-moz-background-size: cover;
		-webkit-background-size: cover;
		-o-background-size: cover;
	}
  form{
     width:90%;
     padding:20px;
     border-radius:10px;
     margin:auto;
     background-color:#FFFFFF;
   }
   .pa{
       letter-spacing: 4px;
       font-size: 20px;
       text-decoration: none;
       overflow: hidden;
       transition: 0.2s;
     }
</style>

<body class="fondo">
  <div class="contenedor">
  <div class="registrar">
  <font size="6" face="AR ESSENCE";>
  <button class="Botones" onclick="location.href='recepccion.php'">
	   Volver
	</button>
  <h3>Consultas</h3>
  <div class="limite">
			<script>

      function enviar(){
        var consulta= document.getElementById('consulta').value;
        var dataen= 'consulta='+consulta;
        $.ajax({
        type:'get',
        url:'#',
        data:dataen,
        success:function(resp){
        $("#respa").html(resp);
        }
        });
        return false;
      }

			</script>


<br>
		</div>
  <form method="GET"  onsubmit="return enviar();">
		<div class="query">
		<div class="imputt">
		<span class="labelinput">ID</span>
		<input class="inputa" type="text" name="consulta" id="consulta" placeholder="Ingresa el ID de consulta..." autocomplete="off" required>
    <button class="Botones" style="right:20%;">
      Consultar
    </button>
    </div>
    </div>
    </form>
    </div>
    </div>
    <center>
    <p id="respa">
</body>

</html>
