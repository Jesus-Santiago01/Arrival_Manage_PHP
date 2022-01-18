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
  document.location.href="reportes.php?pag=1&fecha1='.$fecha1.'&fecha2='.$fecha2.'&filtro='.$filtro.'&valor='.$valor.'";
  }
  redirecional();
  </script>';
}



  
if($valor==""){
//QUERY PARA NUMERO DE PAGINAS
$busquedaTotal2="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1 , seller.carga AS carga1, seller.unidad AS unidad1, recibo.guia AS guia1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora) AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia, seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id";
  

$busquedaTotal1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1, seller.carga AS carga1, seller.unidad AS unidad1, recibo.guia AS guia1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2

FROM seller,recibo WHERE seller.id=recibo.id ORDER BY recibo.id DESC LIMIT $offset,$limit";
}
else if($valor<>""){
//QUERY PARA NUMERO DE PAGINAS
$busquedaTotal2="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1, recibo.guia AS guia1,seller.carga AS carga1, seller.unidad AS unidad1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id AND $filtro LIKE '%$valor%' ";

  $busquedaTotal1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1 , seller.recibidor AS recibidor1, recibo.guia AS guia1, seller.carga AS carga1, seller.unidad AS unidad1 ,recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id AND $filtro LIKE '%$valor%' LIMIT $offset,$limit ";
}

$Total1=mysqli_query($link,$busquedaTotal2);
echo $total=$Total1->num_rows;

$busquedaTotal=mysqli_query($link,$busquedaTotal1);


if($total==0){
  ?>
  <script>
  alert("Valor no encontrado");
  function redirecional(){
				document.location.href="reportes.php?pag=1&fecha1=&fecha2=&filtro=&valor=";
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
        </thead>
		 ';
foreach ($link->query($busquedaTotal2) as $row){ 
  if($row['tipo2']=='f1'){
    $tipo2='Formula IB';
  }else if($row['tipo2']=='r1'){
    $tipo2='Regular IB';
  }else if($row['tipo2']=='tr'){
    $tipo2='Transfer';
  }else if($row['tipo2']=='cl'){
    $tipo2='Colecta';
  } 
  
   
	$tabla.='
    <tr>
    <td>'.$row['idseller'].'</td>
    <td>'.$row['ibshipment1'].'</td>
    <td>'.$row['datatime'].'</td>
    <td>'.$row['semana'].'</td>
    <td>'.$row['seller1'].'</td>
    <td>'.$row['bultos1'].'</td>
    <td>'.$row['pallet1'].'</td>
    <td>'.$row['recibidor1'].'</td>
    <td>'.$row['guia1'].'</td>
    <td>'.$row['carga1'].'</td>
    <td>'.$row['unidad1'].'</td>
    <td>'.$row['envio'].'</td>

    <td>'.$row['estatus1'].'</td>
    <td>'.$row['t_patio'].'</td>
    <td>'.$row['inicio'].'</td>
    <td>'.$row['termino'].'</td>
    <td>'.$row['estadia'].'</td>
    <td>'.$tipo2.'</td>
    <td><a class="Botones" href=../Recepccion/documento/'.$row['documento1'].' target="_blank" style="text-decoration:none;">
    Abrir</a></td>
    </tr>
    

    ';
}

$tabla.='<tr><td class="text-center" colspan="19 ">';

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
<button class="Botones" aling="right"  name="submit" type="submit" onclick="location.href='reportes.php?pag=1&fecha1=&fecha2=&filtro=&valor='">
        Resetear filtros
      </button>
      <button class="Botones" aling="right"  name="submit" type="submit" onclick="location.href='exportar.php'">
       Exportar
      </button>
      <button class="Botones" aling="right"  name="submit" type="submit" onclick="location.href='encuesta_nps.php?pag=1&fecha1=&fecha2=&filtro=&valor='">
       Encuesta NPS
      </button>
<center><h2><h3><?php echo $nombre_responsable; ?><h3>Arrival Reports</h2>  </center>
<form  method="GET">

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