<!DOCTYPE html>
<html lang="en">
 
<head>
  <title>Arrival Reports</title>
  <meta charset="UTF-8">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">  </script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">  </script>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="css/tablas.css">
    <!--https://www.w3schools.com/icons/google_icons_action.asp-->
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
     
     
  </style>
  <body class="fondo">
 
    <?php
 
    require "conexion.php";
 
    $numElementos = 5;
 
    // Recogemos el parametro pag, en caso de que no exista, lo seteamos a 1
    if (isset($_GET['pag'])) {
        $pagina = $_GET['pag'];
    } else {
        $pagina = 1;
    }
 
    // (($pagina - 1) * $numElementos) me indica desde donde debemos empezar a mostrar registros
    $sql = "SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
    seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
    recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1, seller.carga AS carga1, seller.unidad AS unidad1, recibo.guia AS guia1, recibo.tipo AS envio,
    SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
    SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
    
    FROM seller,recibo WHERE seller.id=recibo.id ORDER BY recibo.id DESC LIMIT " . (($pagina - 1) * $numElementos)  . "," . $numElementos;
 
    // Ejecutamos la consulta
    $resultado = mysqli_query($link, $sql);
 
    // Contamos el número total de registros
    $sql = "SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
    seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
    recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1 , seller.carga AS carga1, seller.unidad AS unidad1, recibo.guia AS guia1, recibo.tipo AS envio,
    SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora) AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
    SUBTIME(seller.termino_hora, seller.hora) AS estadia, seller.tipo AS tipo2
    FROM seller,recibo WHERE seller.id=recibo.id";
 
    // Ejecutamos la consulta
    $resultadoMaximo = mysqli_query($link, $sql);
 
    // Recojo el numero de registros de forma rápida
    $maximoElementos = mysqli_fetch_assoc($resultadoMaximo)['idseller'];
 
    ?>
 
 
    <table class="table-rwd">
        <tr>
        <th>ID</th>
            <th>IS</th>
            <th>FECHA Y HORA</th>
            <th>SEMANA</th>
            <th>SELLER</th>
            <th>BULTOS</th>
            <th>PALLET</th>
            <th>RECIBIDOR</th>
            <th>GUIA</th>
            <th>CARGA</th>
            <th>UNIDAD</th>
            <th>ENVIO</th>
            <th>ESTATUS</th>
            <th>T.PATIO</th>
            <th>T.CORTINA</th>
            <th>T.DESCARGA</th>
            <th>T.ESTADIA</th>
            <th>TIPO</th>
            <th>DOCUMENTO</th>
        </tr>
 
        <?php
 
 
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $fila['idseller'] . "</td>";
            echo "<td>" . $fila['ibshipment1'] . "</td>";
            echo "<td>" . $fila['datatime'] . "</td>";
            echo "<td>" . $fila['semana'] . "</td>";
            echo "<td>" . $fila['seller1'] . "</td>";
            echo "<td>" . $fila['bultos1'] . "</td>";
            echo "<td>" . $fila['pallet1'] . "</td>";
            echo "<td>" . $fila['recibidor1'] . "</td>";
            echo "<td>" . $fila['guia1'] . "</td>";
            echo "<td>" . $fila['carga1'] . "</td>";
            echo "<td>" . $fila['unidad1'] . "</td>";
            echo "<td>" . $fila['envio'] . "</td>";
            echo "<td>" . $fila['estatus1'] . "</td>";
            echo "<td>" . $fila['t_patio'] . "</td>";
            echo "<td>" . $fila['inicio'] . "</td>";
            echo "<td>" . $fila['termino'] . "</td>";
            echo "<td>" . $fila['estadia'] . "</td>";
            echo "<td>" . $fila['documento1'] . "</td>";

            echo "</tr>";
        }
 
        ?>
 
    </table>
 
    <div>
        <?php
        // Si existe el parametro pag
        if (isset($_GET['pag'])) {
            // Si pag es mayor que 1, ponemos un enlace al anterior
            if ($_GET['pag'] > 1) {
                ?>
                <a href="paginador.php?pag=<?php echo $_GET['pag'] - 1; ?>"><button class="Botones">Anterior</button></a>
            <?php
                    // Sino deshabilito el botón
                } else {
                    ?>
                <a href="#"><button class="Botones" disabled>Anterior</button></a>
            <?php
                }
                ?>
 
        <?php
        } else {
            // Sino deshabilito el botón
            ?>
            <a href="#"><button class="Botones" disabled>Anterior</button></a>
            <?php
        }
 
             
 
        // Si existe la paginacion 
        if (isset($_GET['pag'])) {
            // Si el numero de registros actual es superior al maximo
            if ((($pagina) * $numElementos) < $maximoElementos) {
                ?>
            <a href="paginador.php?pag=<?php echo $_GET['pag'] + 1; ?>"><button class="Botones">Siguiente</button></a>
        <?php
                // Sino deshabilito el botón
            } else {
                ?>
            <a href="#"><button class="Botones" disabled>Siguiente</button></a>
        <?php
            }
 
            ?>
 
        <?php
            // Sino deshabilito el botón
        } else {
            ?>
            <a href="paginador.php?pag=2"><button class="Botones">Siguiente</button></a>
        <?php
        }
 
 
        ?>
 
 
    </div>
 
</body>
 
</html>