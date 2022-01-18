<?php 
require("conexion.php");
$filtro=$_GET['filtro'];
$valor=$_GET['valor'];
$fecha1=$_GET['fecha1'];
$fecha2=$_GET['fecha2'];

if($valor<>"" && $fecha1=="" && $fecha2==""){
  //QUERY PARA NUMERO DE PAGINAS
$sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, 
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1 , seller.carga AS carga1, seller.unidad AS unidad1, recibo.guia AS guia1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora) AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia, seller.tipo AS tipo2,
seller.cortina_hora  AS h_cortina, seller.inicio_hora AS h_inicio, seller.termino_hora AS h_termino
FROM seller,recibo WHERE seller.id=recibo.id AND $filtro LIKE '%$valor%' "; 

}
else if($valor=="" && $fecha1<>"" && $fecha2==""){
//QUERY PARA NUMERO DE PAGINAS
$sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, 
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1 , seller.carga AS carga1, seller.unidad AS unidad1, recibo.guia AS guia1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora) AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia, seller.tipo AS tipo2,
seller.cortina_hora  AS h_cortina, seller.inicio_hora AS h_inicio, seller.termino_hora AS h_termino
FROM seller,recibo WHERE seller.id=recibo.id AND seller.fecha='$fecha1' ";


}
else if($valor=="" && $fecha1=="" && $fecha2<>""){
  //QUERY PARA NUMERO DE PAGINAS
$sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, 
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1 , seller.carga AS carga1, seller.unidad AS unidad1, recibo.guia AS guia1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora) AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia, seller.tipo AS tipo2,
seller.cortina_hora  AS h_cortina, seller.inicio_hora AS h_inicio, seller.termino_hora AS h_termino
FROM seller,recibo WHERE seller.id=recibo.id AND seller.fecha='$fecha2' ";  


}

else if($valor=="" && $fecha1<>"" && $fecha2<>""){
//QUERY PARA NUMERO DE PAGINAS
$sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, 
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1 , seller.carga AS carga1, seller.unidad AS unidad1, recibo.guia AS guia1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora) AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia, seller.tipo AS tipo2,
seller.cortina_hora  AS h_cortina, seller.inicio_hora AS h_inicio, seller.termino_hora AS h_termino
FROM seller,recibo WHERE seller.id=recibo.id AND seller.fecha BETWEEN '$fecha1' AND '$fecha2' ";


}

else if($valor<>"" && $fecha1<>"" && $fecha2<>""){
//QUERY PARA NUMERO DE PAGINAS
$sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, 
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1 , seller.carga AS carga1, seller.unidad AS unidad1, recibo.guia AS guia1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora) AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia, seller.tipo AS tipo2,
seller.cortina_hora  AS h_cortina, seller.inicio_hora AS h_inicio, seller.termino_hora AS h_termino
FROM seller,recibo WHERE seller.id=recibo.id AND $filtro LIKE '%$valor%' ";
}



//Query enviada desde reportes
//nombre del archivo y charset
header('Content-Type:text/csv; charset=latin1');
header('Content-Disposition: attachment; filename="Arrival_Manage_Export.csv"');
//salida del archivo
$salida=fopen('php://output','w');
//Encabezados
fputcsv($salida, array('ID','Inbound Shipment','Fecha & Hora','Seller','Bultos','Pallet','Recibidor','Guia','Carga','Unidad','Envio','T_Patio',
'T_Cortina','T_Descarga','T_Estadia','H_Cortina','H_Inicio','H_Termino','Tipo'));
//query de reporte
$reportecsv=$link->query("$sql1");

while($filaR=$reportecsv->fetch_assoc())
fputcsv($salida,array(
    $filaR['idseller'],
    $filaR['ibshipment1'],
    $filaR['datatime'],
    $filaR['seller1'],
    $filaR['bultos1'],
    $filaR['pallet1'],
    $filaR['recibidor1'],
    $filaR['guia1'],
    $filaR['carga1'],
    $filaR['unidad1'],
    $filaR['envio'],
    $filaR['t_patio'],
    $filaR['inicio'],
    $filaR['termino'],
    $filaR['estadia'],
    $filaR['h_cortina'],
    $filaR['h_inicio'],
    $filaR['h_termino'],
    $filaR['tipo2']));


?>