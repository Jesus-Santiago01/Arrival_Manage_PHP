<!DOCTYPE html>
<html lang="en">
<head>
	<title>Receiving</title>
	<meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">  </script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/form.css">
</head>
<body class="fondo">
	<style>
   .pa{
       letter-spacing: 4px;
       font-size: 20px;
       text-decoration: none;
       overflow: hidden;
       transition: 0.2s;
     }
     form{
	      width:90%;
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
      }
  </style>


<div class="contenedor">
<div class="registrar">
<div class="comentario">
<form>
<center><h3>¿Porque rechazas la tarea?</h3>
<br>
<select name="rechazo" class="rechazo" id="rechazo">
<option value="hora salida">Ya casi es mi hora de salida</option>
<option value="enfermeria">Servicio medico</option>
<option value="enfermeria">Salida al sanitario</option>

</select>
<br><br>
<button class="Botones">
	Rechazar
</button>
<button class="Botones">
  Tomare la tarea
</button>
</center>
</form>
</div>
</div>
</div>
</body>
