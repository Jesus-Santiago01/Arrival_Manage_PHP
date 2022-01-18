<html>

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
        require("conexion.php");
        session_start();
        //VALIDA LA SESSION
        $id_obtenido=$_SESSION['nuevasession_ext'];
        if($id_obtenido==""){
          echo '<script lenguage="javascript">alert("Debes de iniciar sesiòn");
              function redirecional(){
              document.location.href="index.html";
              }
              redirecional();
              </script>';
        }
           //BUSCA EL NOMBRE Y APELLIDOS EL USUARIO
        //QUERY1
        $validacion_nombre="SELECT nombre,apaterno,amaterno FROM registro_externos
        WHERE id=".$id_obtenido;
        //EJECUTA QUERY1
        $result_query1=mysqli_query($link,$validacion_nombre);
        //CONVIERTE LOS DATOS OBTENIDOS DE LA QUERY EN VARIABLES A TRAVEZ DE LA MATRIZ
        while($matriz1=mysqli_fetch_array($result_query1)){
        //ASIGNACION DE VARIABLE A LOS RESULTADOS DE MATRIZ
                $nombre_obtenido=$matriz1[0];
                $apaterno_obtenido=$matriz1[1];
            $amaterno_obtenido=$matriz1[2];
        }
        //UNE EL RESULTADO DE LA MATRIZ EN UNA VARIABLE
        //UNE EL NOMBRE DEL USUARIO
        $nombre_responsable=$nombre_obtenido." ".$apaterno_obtenido." ".$amaterno_obtenido;
    $fechaActual = date('Y-m-d');
    $fechaAntes=date("Y-m-d",strtotime($fechaActual."- 7 days"));
    $fechaAntes2=date("Y-m-d",strtotime($fechaActual."- 90 days"));
       
    ?>

<?php

$filtro=$_GET['filtro'];
$valor=$_GET['valor'];
$fecha1=$_GET['fecha1'];
$fecha2=$_GET['fecha2'];
$pagina=$_GET['pag'];
$numElementos = 100;


if($valor<>"" && $fecha1=="" && $fecha2==""){
   //QUERY PARA NUMERO DE PAGINAS
$sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.firma AS firma1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1, recibo.guia AS guia1,seller.carga AS carga1, seller.unidad AS unidad1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id AND $filtro LIKE '%$valor%' ";

 $sql="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
 seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.firma AS firma1, seller.estatus AS estatus1,
 recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1, recibo.guia AS guia1,seller.carga AS carga1, seller.unidad AS unidad1, recibo.tipo AS envio,
 SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
 SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id AND $filtro LIKE '%$valor%' ORDER BY datatime DESC LIMIT " . (($pagina - 1) * $numElementos)  . "," . $numElementos;;   

}
else if($valor=="" && $fecha1<>"" && $fecha2==""){
 //QUERY PARA NUMERO DE PAGINAS
$sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.firma AS firma1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1, recibo.guia AS guia1,seller.carga AS carga1, seller.unidad AS unidad1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id AND seller.fecha='$fecha1' ";

$sql="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.firma AS firma1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1, recibo.guia AS guia1,seller.carga AS carga1, seller.unidad AS unidad1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id  AND seller.fecha='$fecha1' ORDER BY datatime DESC LIMIT " . (($pagina - 1) * $numElementos)  . "," . $numElementos;   


}
else if($valor=="" && $fecha1=="" && $fecha2<>""){
   //QUERY PARA NUMERO DE PAGINAS
 $sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
 seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.firma AS firma1, seller.estatus AS estatus1,
 recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1, recibo.guia AS guia1,seller.carga AS carga1, seller.unidad AS unidad1, recibo.tipo AS envio,
 SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
 SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
 FROM seller,recibo WHERE seller.id=recibo.id AND seller.fecha='$fecha2' ";
 
 $sql="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
 seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.firma AS firma1, seller.estatus AS estatus1,
 recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1, recibo.guia AS guia1,seller.carga AS carga1, seller.unidad AS unidad1, recibo.tipo AS envio,
 SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
 SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
 FROM seller,recibo WHERE seller.id=recibo.id  AND seller.fecha='$fecha2' ORDER BY datatime DESC LIMIT " . (($pagina - 1) * $numElementos)  . "," . $numElementos;   
 
 
 }

else if($valor=="" && $fecha1<>"" && $fecha2<>""){
 //QUERY PARA NUMERO DE PAGINAS
$sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.firma AS firma1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1, recibo.guia AS guia1,seller.carga AS carga1, seller.unidad AS unidad1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id AND seller.fecha BETWEEN '$fecha1' AND '$fecha2' ";

$sql="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.firma AS firma1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1, recibo.guia AS guia1,seller.carga AS carga1, seller.unidad AS unidad1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id AND seller.fecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY datatime DESC LIMIT " . (($pagina - 1) * $numElementos)  . "," . $numElementos;


}

else if($valor<>"" && $fecha1<>"" && $fecha2<>""){
 //QUERY PARA NUMERO DE PAGINAS
$sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.firma AS firma1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1, recibo.guia AS guia1,seller.carga AS carga1, seller.unidad AS unidad1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id AND $filtro LIKE '%$valor%' ";

$sql="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.firma AS firma1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1, recibo.guia AS guia1,seller.carga AS carga1, seller.unidad AS unidad1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id AND $filtro LIKE '%$valor%' ORDER BY datatime DESC LIMIT " . (($pagina - 1) * $numElementos)  . "," . $numElementos;

}
else if($valor=="" && $fecha1=="" && $fecha2==""){
 echo '<script lenguage="javascript">alert("Valor no encontrado");
               function redirecional(){
               document.location.href="reportes1.php?fecha1='.$fechaAntes.'&fecha2='.$fechaActual.'&filtro=&valor=&pag=1";
               }
               redirecional();
               </script>';
}

$resultado = mysqli_query($link, $sql);
$resultadoMaximo = mysqli_query($link, $sql1);
$total=$resultadoMaximo->num_rows;

if($total==0){
   echo '<script lenguage="javascript">alert("Valor no encontrado");
   function redirecional(){
   document.location.href="reportes1.php?fecha1='.$fechaAntes.'&fecha2='.$fechaActual.'&filtro=&valor=&pag=1";
   }
   redirecional();
   </script>';
 }
?>

<div class="contenedor">
<div class="registrar">
<div class="comentario">
<script>
			function enviar(){

            <?php
            echo "
            var filtro ='$filtro';
            var valor ='$valor';
            var fecha1 ='$fecha1';
            var fecha2 ='$fecha2';";
            ?>

			var dataen= 'filtro='+filtro+'&valor='+valor+'&fecha1='+fecha1+'&fecha2='+fecha2;

			$.ajax({

			type:'get',
			url:'exportar.php',
			data:dataen,
			success:function(resp){
			$("#respa").html(resp);
			}

			});
			return false;
			}
			</script>
<p id="respa">
<button class="Botones" style="position: absolute; right: 30;" onclick="location.href='logout.php'">
    Salir
</button>
<button class="Botones" aling="right" onclick="location.href='reportes1.php?fecha1=<?php echo $fechaAntes ?>&fecha2=<?php echo $fechaActual ?>&filtro=&valor=&pag=1'">
        Resetear filtros
      </button>
      <button class="Botones" onclick="location.href='exportar.php?filtro=<?php echo $filtro?>&valor=<?php echo $valor?>&fecha1=<?php echo $fecha1?>&fecha2=<?php echo $fecha2?>'" >
        Exportar
    </button>
      <button class="Botones" aling="right"  name="submit" type="submit" onclick="location.href='encuesta_nps1.php?fecha1=<?php echo $fechaAntes ?>&fecha2=<?php echo $fechaActual ?>&filtro=&valor=&pag=1'">
       Arrival NPS
      </button>
      <button class="Botones" aling="right"  name="submit" type="submit" onclick="location.href='reporte_rechazos.php?fecha1=<?php echo $fechaAntes2 ?>&fecha2=<?php echo $fechaActual ?>&filtro=&valor=&pag=1'">
       Arrival Rechazos
      </button>
<center><h2><h3><?php echo $nombre_responsable; ?><h3>Arrival Reports</h2>  </center>

<form method="GET" >
  <div class="imputt">
  De:
  <input class="inputa" type="date" name="fecha1"  id="fecha1">
  A:
  <input class="inputa" type="date" name="fecha2"  id="fecha2">

<center>
    <select name="filtro" class="" id="filtro">
      <option value="recibo.ibshipment">Inbound Shipment</option>
      <option value="recibo.id">ID</option>
       <option value="recibo.pallet">Pallet</option>
       <option value="seller.recibidor">Responsable</option>
       <option value="seller.seller">Seller</option>
       <option value="seller.estatus">Estatus</option>
    </select>
    
    <input class="inputa" type="text" name="valor"  id="valor"  placeholder="Ingresa valor buscado..." autocomplete="off" >
    <button class="Botones" name="pag" value="1" type="submit">
        Buscar
      </button>
    </div>
    <?php
echo 'Resultados de busqueda:'.$total;
echo '<br>';
echo 'Pagina: '.$pagina;
echo '<br>';
$mostrar=$pagina-1;
$mostrar1=$numElementos*$mostrar;
$mostrar2=$pagina*$numElementos;
echo 'Mostrando: '.$mostrar1.' - '.$mostrar2;
echo '<br>';

?>
</form>

    <br><br>

  

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
            <th>ENVIO</th>
            <th>ESTATUS</th>
            <th>T.PATIO</th>
            <th>T.CORTINA</th>
            <th>T.DESCARGA</th>
            <th>T.ESTADIA</th>
        </tr>
 
        <?php
 
 
        while ($fila = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
            <td> <?php echo$fila['idseller']?> </td>
            <td> <a href="validacion_is.php?ibshipment=<?php echo $fila['ibshipment1']?>" target="_blank" style="text-decoration: none;"><?php echo $fila['ibshipment1']?> </a></td>
            <td><?php echo$fila['datatime']?> </td>
            <td><?php echo $fila['semana'] ?></td>
            <td> <?php echo$fila['seller1'] ?></td>
            <td> <?php echo$fila['bultos1'] ?></td>
            <td> <?php echo$fila['pallet1'] ?></td>
            <td> <?php echo$fila['recibidor1'] ?></td>
            <td> <?php echo$fila['envio']?> </td>
            <td> <?php echo$fila['estatus1'] ?></td>
            <td> <?php echo$fila['t_patio']?> </td>
            <td> <?php echo$fila['inicio']?> </td>
            <td> <?php echo$fila['termino']?> </td>
            <td> <?php echo$fila['estadia'] ?></td>

            </tr>
            <?php
        }
 
        ?>
 
    </table>
    <br>
 <center>
    <div>
        <?php
        // Si existe el parametro pag
        if (isset($_GET['pag'])) {
            // Si pag es mayor que 1, ponemos un enlace al anterior
            if ($_GET['pag'] > 1) {
                ?>
                <a href="reportes1.php?fecha1=<?php echo $fecha1; ?>&fecha2=<?php echo $fecha2; ?>&filtro=<?php echo $filtro; ?>&valor=<?php echo $valor; ?>&pag=<?php echo $_GET['pag'] - 1; ?>"><button class="Botones">Anterior</button></a>
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
            if ($mostrar2 < $total) {
                ?>
            <a href="reportes1.php?fecha1=<?php echo $fecha1; ?>&fecha2=<?php echo $fecha2; ?>&filtro=<?php echo $filtro; ?>&valor=<?php echo $valor; ?>&pag=<?php echo $_GET['pag'] + 1; ?>"><button class="Botones">Siguiente</button></a>
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

            <a href="#"><button class="Botones" disabled>Siguiente</button></a>
        <?php
        }
 
 
        ?>
 
 
    </div>
    
</div>
</div>
</div>
</body>

