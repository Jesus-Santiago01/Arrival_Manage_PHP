<html>

<head>
  <title>Arrival NPS</title>
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


    $filtro=$_GET['filtro'];
    $valor=$_GET['valor'];
    $fecha1=$_GET['fecha1'];
    $fecha2=$_GET['fecha2'];
    $pagina=$_GET['pag'];
    $numElementos = 100;



    
if($valor<>"" && $fecha1=="" && $fecha2==""){
    //QUERY PARA NUMERO DE PAGINAS
 $sql1="SELECT seller.id AS idseller, ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
 encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
 seller.hora AS hora, encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
 encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
 encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor, 
 SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
 FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id AND $filtro LIKE '%$valor%' ";
 
  $sql="SELECT seller.id AS idseller, ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
  encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
  seller.hora AS hora, encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
  encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
  encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor, 
  SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
  FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id AND $filtro LIKE '%$valor%' ORDER BY datatime DESC LIMIT " . (($pagina - 1) * $numElementos)  . "," . $numElementos;;   
 
 }
 else if($valor=="" && $fecha1<>"" && $fecha2==""){
  //QUERY PARA NUMERO DE PAGINAS
 $sql1="SELECT seller.id AS idseller, ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
 encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
 seller.hora AS hora, encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
 encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
 encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor, 
 SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
 FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id AND seller.fecha='$fecha1' ";
 
 $sql="SELECT seller.id AS idseller, ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
 encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
 seller.hora AS hora, encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
 encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
 encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor, 
 SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
 FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id  AND seller.fecha='$fecha1' ORDER BY datatime DESC LIMIT " . (($pagina - 1) * $numElementos)  . "," . $numElementos;   
 
 
 }
 else if($valor=="" && $fecha1=="" && $fecha2<>""){
    //QUERY PARA NUMERO DE PAGINAS
  $sql1="SELECT seller.id AS idseller, ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
  encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
  seller.hora AS hora, encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
  encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
  encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor, 
  SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
  FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id AND seller.fecha='$fecha2' ";
  
  $sql="SELECT seller.id AS idseller, ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
  encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
  seller.hora AS hora, encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
  encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
  encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor, 
  SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
  FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id  AND seller.fecha='$fecha2' ORDER BY datatime DESC LIMIT " . (($pagina - 1) * $numElementos)  . "," . $numElementos;   
  
  
  }
 
 else if($valor=="" && $fecha1<>"" && $fecha2<>""){
  //QUERY PARA NUMERO DE PAGINAS
 $sql1="SELECT seller.id AS idseller, ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
 encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
 seller.hora AS hora, encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
 encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
 encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor, 
 SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
 FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id AND seller.fecha BETWEEN '$fecha1' AND '$fecha2' ";
 
 $sql="SELECT seller.id AS idseller, ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
 encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
 seller.hora AS hora, encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
 encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
 encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor, 
 SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
 FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id AND seller.fecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY datatime DESC LIMIT " . (($pagina - 1) * $numElementos)  . "," . $numElementos;
 
 
 }
 
 else if($valor<>"" && $fecha1<>"" && $fecha2<>""){
  //QUERY PARA NUMERO DE PAGINAS
 $sql1="SELECT seller.id AS idseller, ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
 encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
 seller.hora AS hora, encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
 encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
 encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor, 
 SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
 FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id AND $filtro LIKE '%$valor%' ";
 
 $sql="SELECT seller.id AS idseller, ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
 encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
 seller.hora AS hora, encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
 encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
 encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor, 
 SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
 FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id AND $filtro LIKE '%$valor%' ORDER BY datatime DESC LIMIT " . (($pagina - 1) * $numElementos)  . "," . $numElementos;
 
 }

 else if($valor=="" && $fecha1=="" && $fecha2==""){
    echo '<script lenguage="javascript">alert("Valor no encontrado");
                  function redirecional(){
                  document.location.href="encuesta_nps1.php?fecha1='.$fechaAntes.'&fecha2='.$fechaActual.'&filtro=&valor=&pag=1";
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
    document.location.href="encuesta_nps1.php?fecha1='.$fechaAntes.'&fecha2='.$fechaActual.'&filtro=&valor=&pag=1";
    }
    redirecional();
    </script>';
  }
   
    ?>

<div class="contenedor">
<div class="registrar">
<div class="comentario">


<button class="Botones" style="position: absolute; right: 30;" onclick="location.href='logout.php'">
    Salir
</button>
<button class="Botones" aling="right" onclick="location.href='encuesta_nps1.php?fecha1=<?php echo $fechaAntes ?>&fecha2=<?php echo $fechaActual ?>&filtro=&valor=&pag=1'">
        Resetear filtros
      </button>
      <button class="Botones" onclick="location.href='exportar_nps.php?filtro=<?php echo $filtro?>&valor=<?php echo $valor?>&fecha1=<?php echo $fecha1?>&fecha2=<?php echo $fecha2?>'" >
        Exportar
    </button>
      <button class="Botones" aling="right"  name="submit" type="submit" onclick="location.href='reportes1.php?fecha1=<?php echo $fechaAntes ?>&fecha2=<?php echo $fechaActual ?>&filtro=&valor=&pag=1'">
       Arrival Reports
      </button>
      <button class="Botones" aling="right"  name="submit" type="submit" onclick="location.href='reporte_rechazos.php?fecha1=<?php echo $fechaAntes2 ?>&fecha2=<?php echo $fechaActual ?>&filtro=&valor=&pag=1'">
       Arrival Rechazos
      </button>
<center><h2><h3><?php echo $nombre_responsable; ?><h3>Arrival NPS</h2>  </center>

<form method="GET" >
  <div class="imputt">
  De:
  <input class="inputa" type="date" name="fecha1"  id="fecha1">
  A:
  <input class="inputa" type="date" name="fecha2"  id="fecha2">

<center>
<select name="filtro" class="" id="filtro">
      <option value="encuesta_nps.id">ID</option>
       <option value="seller.recibidor">Responsable</option>
       <option value="seller.seller">Seller</option>

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
            <th>FECHA & HORA</th>
            <th>SEMANA</th>
            <th>SELLER</th>
            <th>REPRESENTANTE</th>
            <th>ALMACEN</th>
            <th>MOTIVO</th>
            <th>TIPO DE ENVIÓ</th>
            <th>HORARIO DE ATENCIÓN</th>
            <th>ESTADIA PATIO</th>
            <th>TIEMPO DESCARGA</th>
            <th>CALIFICACIÓN FULL</th>
            <th>CALIFICACIÓN RECEPCIÓN</th>
            <th>CALIFICACIÓN REPRESENTANTE</th>
            <th>PROBLEMAS AL INGRESAR PRODUCTO</th>
            <th>PROBLEMA</th>
            <th>COMENTARIO DE MEJORA</th>
            <th>COMENTARIO DE RECONOCIMIENTO</th>
        </tr>
        <?php
 
 
        while ($fila = mysqli_fetch_assoc($resultado)) {

            if($fila['hora']>='05:30:00' AND $fila['hora']<='13:30:00'){
                $turno='Mañana';
              }
              else if ($fila['hora']>='13:31:00' AND $fila['hora']<='21:30:00'){
                $turno='Tarde';
              }
              else if($fila['hora']>='21:31:00' AND $fila['hora']<='05:29:00'){
                $turno='Noche';
              }
              
              if($fila['t_patio']<'00:15:00'){
                $est_patio='Menor a 15 minutos';
              } 
              else if($fila['t_patio']>='00:15:00' AND $fila['t_patio']<'00:30:00'){
                $est_patio='De 15 a 30 minutos';
              }
              else if($fila['t_patio']>='00:30:00' AND $fila['t_patio']<'01:00:00'){
                $est_patio='De 30 a 60 minutos';
              }
              else if($fila['t_patio']>='01:00:00' AND $fila['t_patio']<'02:00:00'){
                $est_patio='De 1 a 2 horas';
              }
              else if($fila['t_patio']>='02:00:00' AND $fila['t_patio']<'03:00:00'){
                $est_patio='De 2 a 3 horas';
              }
              else if($fila['t_patio']>='03:00:00' AND $fila['t_patio']<'05:00:00'){
                $est_patio='De 3 a 5 horas';
              }
              else if($fila['t_patio']>='05:00:00'){
                $est_patio='Mas de 5 horas';
              }
              
              
              if($fila['descarga']<'00:15:00'){
                $t_descarga='Menor a 15 minutos';
              } 
              else if($fila['descarga']>='00:15:00' AND $fila['descarga']<'00:30:00'){
                $t_descarga='De 15 a 30 minutos';
              }
              else if($fila['descarga']>='00:30:00' AND $fila['descarga']<'00:45:00'){
                $t_descarga='De 30 a 45 minutos';
              }
              else if($fila['descarga']>='00:45:00' AND $fila['descarga']<'00:60:00'){
                $t_descarga='De 45 a 60 minutos';
              }
              else if($fila['descarga']>='01:00:00' AND $fila['descarga']<'02:00:00'){
                $t_descarga='De 1 a 2 horas';
              }
              else if($fila['descarga']>='02:00:00' AND $fila['descarga']<'03:00:00'){
                $t_descarga='De 2 a 3 horas';
              }
              else if($fila['descarga']>='03:00:00' AND $fila['descarga']<'05:00:00'){
                $t_descarga='De 3 a 5 horas';
              }
              else if($fila['descarga']>='05:00:00'){
                $t_descarga='Mayor a 5 horas';
              }
              


            ?>
            <tr>
            <td> <?php echo$fila['idseller']?> </td>
            <td><?php echo$fila['datatime']?> </td>
            <td><?php echo $fila['semana'] ?></td>
            <td> <?php echo$fila['seller'] ?></td>
            <td> <?php echo$fila['recibidor'] ?></td>
            <td> O Donnell</td>
            <td>Ingreso de producto</td>
            <td> <?php echo$fila['tipo_envio'] ?></td>
            <td> <?php echo $turno?> </td>
            <td> <?php echo $est_patio ?></td>
            <td> <?php echo $t_descarga?> </td>
            <td> <?php echo$fila['cal_full']?> </td>
            <td> <?php echo$fila['cal_recepcion']?> </td>
            <td> <?php echo$fila['cal_representante'] ?></td>
            <td> <?php echo$fila['problemas_site'] ?></td>
            <td> <?php echo$fila['problema'] ?></td>
            <td> <?php echo$fila['mejora'] ?></td>
            <td> <?php echo$fila['reconocimiento'] ?></td>

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
                <a href="encuesta_nps1.php?fecha1=<?php echo $fecha1; ?>&fecha2=<?php echo $fecha2; ?>&filtro=<?php echo $filtro; ?>&valor=<?php echo $valor; ?>&pag=<?php echo $_GET['pag'] - 1; ?>"><button class="Botones">Anterior</button></a>
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
            <a href="encuesta_nps1.php?fecha1=<?php echo $fecha1; ?>&fecha2=<?php echo $fecha2; ?>&filtro=<?php echo $filtro; ?>&valor=<?php echo $valor; ?>&pag=<?php echo $_GET['pag'] + 1; ?>"><button class="Botones">Siguiente</button></a>
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

