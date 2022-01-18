<html>

<head>
  <title>Encuesta NPS</title>
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
$busquedaTotal1="";
$valor=$_GET['valor'];
$fecha1=$_GET['fecha1'];
$fecha2=$_GET['fecha2'];
$filtro=$_GET['filtro'];
$pag=$_GET['pag'] ;
$limit=50;
if($pag<1)
{
$pag=1;
} 
$offset=($pag-1)*$limit;
$pag;

if(isset($_GET['submit'])){
  echo '<script lenguage="javascript">
  function redirecional(){
  document.location.href="encuesta_nps.php?pag=1&fecha1='.$fecha1.'&fecha2='.$fecha2.'&filtro='.$filtro.'&valor='.$valor.'";
  }
  redirecional();
  </script>';
}



  
if($valor==""){
//QUERY PARA NUMERO DE PAGINAS
$busquedaTotal2="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
seller.hora AS hora,encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor , SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id ";
  

$busquedaTotal1="SELECT seller.id AS idseller, ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
seller.hora AS hora,encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id ORDER BY encuesta_nps.id DESC LIMIT $offset,$limit";
}
else if($valor<>""){
//QUERY PARA NUMERO DE PAGINAS
$busquedaTotal2="SELECT seller.id AS idseller, ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
seller.hora AS hora, encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor, 
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id AND $filtro LIKE '%$valor%'";

  $busquedaTotal1="SELECT seller.id AS idseller, ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
  encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
  seller.hora AS hora,encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
  encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
  encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor, 
  SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
  FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id AND $filtro LIKE '%$valor%' LIMIT $offset,$limit";
}

$Total1=mysqli_query($link,$busquedaTotal2);
$total=$Total1->num_rows;

$busquedaTotal=mysqli_query($link,$busquedaTotal1);


if($total==0){
  ?>
  <script>
  alert("Valor no encontrado");
  function redirecional(){
				document.location.href="encuesta_nps.php?pag=1&fecha1=&fecha2=&filtro=&valor=";
				}
				redirecional();
  </script>
  <?php
}

$tabla='
<table class="table-rwd">
<thead>
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
        </thead>
		 ';
foreach ($link->query($busquedaTotal1) as $row){ 
  
   
if($row['hora']>='05:30:00' AND $row['hora']<='13:30:00'){
  $turno='Mañana';
}
else if ($row['hora']>='13:31:00' AND $row['hora']<='21:30:00'){
  $turno='Tarde';
}
else if($row['hora']>='21:31:00' AND $row['hora']<='05:29:00'){
  $turno='Noche';
}

if($row['t_patio']<'00:15:00'){
  $est_patio='Menor a 15 minutos';
} 
else if($row['t_patio']>='00:15:00' AND $row['t_patio']<'00:30:00'){
  $est_patio='De 15 a 30 minutos';
}
else if($row['t_patio']>='00:30:00' AND $row['t_patio']<'01:00:00'){
  $est_patio='De 30 a 60 minutos';
}
else if($row['t_patio']>='01:00:00' AND $row['t_patio']<'02:00:00'){
  $est_patio='De 1 a 2 horas';
}
else if($row['t_patio']>='02:00:00' AND $row['t_patio']<'03:00:00'){
  $est_patio='De 2 a 3 horas';
}
else if($row['t_patio']>='03:00:00' AND $row['t_patio']<'05:00:00'){
  $est_patio='De 3 a 5 horas';
}
else if($row['t_patio']>='05:00:00'){
  $est_patio='Mas de 5 horas';
}


if($row['descarga']<'00:15:00'){
  $t_descarga='Menor a 15 minutos';
} 
else if($row['descarga']>='00:15:00' AND $row['descarga']<'00:30:00'){
  $t_descarga='De 15 a 30 minutos';
}
else if($row['descarga']>='00:30:00' AND $row['descarga']<'00:45:00'){
  $t_descarga='De 30 a 45 minutos';
}
else if($row['descarga']>='00:45:00' AND $row['descarga']<'00:60:00'){
  $t_descarga='De 45 a 60 minutos';
}
else if($row['descarga']>='01:00:00' AND $row['descarga']<'02:00:00'){
  $t_descarga='De 1 a 2 horas';
}
else if($row['descarga']>='02:00:00' AND $row['descarga']<'03:00:00'){
  $t_descarga='De 2 a 3 horas';
}
else if($row['descarga']>='03:00:00' AND $row['descarga']<'05:00:00'){
  $t_descarga='De 3 a 5 horas';
}
else if($row['descarga']>='05:00:00'){
  $t_descarga='Mayor a 5 horas';
}



	$tabla.='
    <tr>
    <td>'.$row['idseller'].'</td>
    <td>'.$row['datatime'].'</td>
    <td>'.$row['semana'].'</td>
    <td>'.$row['seller'].'</td>
    <td>'.$row['recibidor'].'</td>
    <td>O Donnell</td>
    <td>Ingreso de producto</td>
    <td>'.$row['tipo_envio'].'</td>
    <td>'.$turno.'</td>
    <td>'.$est_patio.'</td>
    <td>'.$t_descarga.'</td>
    <td>'.$row['cal_full'].'</td>
    <td>'.$row['cal_recepcion'].'</td>
    <td>'.$row['cal_representante'].'</td>
    <td>'.$row['problemas_site'].'</td>
    <td>'.$row['problema'].'</td>
    <td>'.$row['mejora'].'</td>
    <td>'.$row['reconocimiento'].'</td>

    </tr>
    

    ';
}

$tabla.='<tr><td class="text-center" colspan="19">';

	$totalPag=ceil($total/$limit);
	$links=array();
	for($i=1; $i<=$totalPag; $i++)
	{
		$links[]="<a style='border:solid 1px blue; padding-left:.6%; padding-right:.6%; padding-top:.25%; padding-bottom:.25%;' href=\"?pag=$i&fecha1=$fecha1&fecha2=$fecha2&filtro=$filtro&valor=$valor\">$i</a>";
	}

	$tabla.=''.implode(" ", $links);


$tabla.='</td></tr></table>';



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
     
?>


<div class="contenedor">
<div class="registrar">
<div class="comentario">


<button class="Botones" style="position: absolute; right: 30;" onclick="location.href='logout.php'">
    Salir
</button>
<button class="Botones" aling="right"  name="submit" type="submit" onclick="location.href='encuesta_nps.php?pag=1&fecha1=&fecha2=&filtro=&valor='">
        Resetear filtros
      </button>
      <button class="Botones" aling="right"  name="submit" type="submit" onclick="location.href='exportar_nps.php'">
       Exportar
      </button>
      <button class="Botones" aling="right"  name="submit" type="submit" onclick="location.href='reportes.php?pag=1&fecha1=&fecha2=&filtro=&valor='">
       Arrival Reports
      </button>
<center><h2><h3><?php echo $nombre_responsable; ?><h3>Encuesta NPS</h2>  </center>
<form  method="GET">

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
    <button class="Botones" name="submit" type="submit">
        Buscar
      </button>
    </div>
</form>

    </center><br><br>

    <section>
    
      <?php echo $tabla;?>
    
    <section>

</div>
</div>
</div>
</body>
</html>