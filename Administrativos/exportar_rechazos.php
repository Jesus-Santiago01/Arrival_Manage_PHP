<?php
require("conexion.php");
$filtro=$_GET['filtro'];
$valor=$_GET['valor'];
$fecha1=$_GET['fecha1'];
$fecha2=$_GET['fecha2'];

if($valor<>"" && $fecha1=="" && $fecha2==""){
    //QUERY PARA NUMERO DE PAGINAS
 $sql1="SELECT id AS id1, ibshipment AS ibshipment1, fecha AS fecha1, tipo AS tipo1 ,EXTRACT(week FROM fecha) AS semana, responsable AS responsable1, 
 meli AS meli1, unidades AS unidades1, motivo AS motivo1, comentarios AS comentarios1
 FROM rechazos WHERE $filtro LIKE '%$valor%'  ";
 
 }
 else if($valor=="" && $fecha1<>"" && $fecha2==""){
  //QUERY PARA NUMERO DE PAGINAS
 $sql1="SELECT id AS id1, ibshipment AS ibshipment1, fecha AS fecha1, tipo AS tipo1 ,EXTRACT(week FROM fecha) AS semana, responsable AS responsable1, 
 meli AS meli1, unidades AS unidades1, motivo AS motivo1, comentarios AS comentarios1
 FROM rechazos WHERE DATE(fecha)='$fecha1' ";
 
 
 }
 else if($valor=="" && $fecha1=="" && $fecha2<>""){
    //QUERY PARA NUMERO DE PAGINAS
  $sql1="SELECT id AS id1, ibshipment AS ibshipment1, fecha AS fecha1, tipo AS tipo1 ,EXTRACT(week FROM fecha) AS semana, responsable AS responsable1, 
  meli AS meli1, unidades AS unidades1, motivo AS motivo1, comentarios AS comentarios1
  FROM rechazos WHERE DATE(fecha)='$fecha2' ";
  
  
  }
 
 else if($valor=="" && $fecha1<>"" && $fecha2<>""){
  //QUERY PARA NUMERO DE PAGINAS
 $sql1="SELECT id AS id1, ibshipment AS ibshipment1, fecha AS fecha1, tipo AS tipo1 ,EXTRACT(week FROM fecha) AS semana, responsable AS responsable1, 
 meli AS meli1, unidades AS unidades1, motivo AS motivo1, comentarios AS comentarios1
 FROM rechazos WHERE  DATE(fecha) BETWEEN '$fecha1' AND '$fecha2' ";
 
 
 }
 
 else if($valor<>"" && $fecha1<>"" && $fecha2<>""){
  //QUERY PARA NUMERO DE PAGINAS
 $sql1="SELECT id AS id1, ibshipment AS ibshipment1, fecha AS fecha1, tipo AS tipo1 ,EXTRACT(week FROM fecha) AS semana, responsable AS responsable1, 
 meli AS meli1, unidades AS unidades1, motivo AS motivo1, comentarios AS comentarios1
 FROM rechazos WHERE $filtro LIKE '%$valor%' ";
 
 }

 //Query enviada desde reportes
//nombre del archivo y charset
header('Content-Type:text/csv; charset=latin1');
header('Content-Disposition: attachment; filename="Arrival_Manage_Export.csv"');
//salida del archivo
$salida=fopen('php://output','w');

fputcsv($salida, array('ID','Inbound Shipment','Fecha & Hora','Tipo','Semana','Recibidor',
'Meli','Unidades','Motivo','Comentarios'));

$reportecsv=$link->query("$sql1");

while($filaR=$reportecsv->fetch_assoc())
fputcsv($salida,array(
    $filaR['id1'],
    $filaR['ibshipment1'],
    $filaR['fecha1'],
    $filaR['tipo1'],
    $filaR['semana'],
    $filaR['responsable1'],
    $filaR['meli1'],
    $filaR['unidades1'],
    $filaR['motivo1'],
    $filaR['comentarios1']));

?>