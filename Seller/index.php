<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Mercado Libre</title>
    	<meta charset="UTF-8">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">  </script>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="css/tablas.css">
      <script src="js/push.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.0.943/build/pdf.min.js"></script>
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
        background:url(img/lok8.jpg);
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
<?php 
require("conexion.php");
?>
<font size="6" face="AR ESSENCE";>




<center><h2>MERCADO LIBRE</h2>
<div class="table-container">
    <table class="table-rwd">
    <thead>
				<tr> 
          <th>
          Turnos
          </th>
        </tr>
    </thead>
        
          
            <tr>
              <td>
              
              <?php 
              
              $patio="SELECT seller,id,cortina,fecha,hora FROM seller
              WHERE estatus!='terminado' AND estatus!='cancelado' AND cortina>0 ORDER BY hora DESC";
              //EJECUTA QUERY1
              $result_query1=mysqli_query($link,$patio);

              while($matriz1=mysqli_fetch_array($result_query1)){
                echo "--------------------------------------------";?><br><?php
                echo $seller=$matriz1[0];?><br><?php
                 echo "Turno:".$id=$matriz1[1]." | Cortina:".$cortina=$matriz1[2];?><br><?php
                 echo $fecha=$matriz1[3]." ".$hora=$matriz1[4];?><br><?php

                 echo' <script>
                 Push.create("'.$seller.'",{
   
                   body: "Cortina '.$cortina.'",
                   icon: "img/logo3.png",
                   timeout:4000
                 });
                 </script>';
              
              }
              
             
              ?>
                
            
                
              
                
              
             
              </td>
            </tr>
         
        
    </table>
</div>

</div>
</div>
</div>

</body>
