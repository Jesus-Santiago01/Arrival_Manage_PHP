<?php 
require("conexion.php");
$filtro=$_GET['filtro'];
$valor=$_GET['valor'];
$fecha1=$_GET['fecha1'];
$fecha2=$_GET['fecha2'];


if($valor<>"" && $fecha1=="" && $fecha2==""){
    //QUERY PARA NUMERO DE PAGINAS
  $sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, 
  seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
  encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
  seller.hora AS hora,encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
  encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
  encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor , 
  SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
  FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id AND $filtro LIKE '%$valor%' "; 
  
  }
  else if($valor=="" && $fecha1<>"" && $fecha2==""){
  //QUERY PARA NUMERO DE PAGINAS
  $sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, 
  seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
  encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
  seller.hora AS hora,encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
  encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
  encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor , 
  SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
  FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id AND seller.fecha='$fecha1' ";
  
  
  }
  else if($valor=="" && $fecha1=="" && $fecha2<>""){
    //QUERY PARA NUMERO DE PAGINAS
  $sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, 
  seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
  encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
  seller.hora AS hora,encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
  encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
  encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor , 
  SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
  FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id AND seller.fecha='$fecha2' ";  
  
  
  }
  
  else if($valor=="" && $fecha1<>"" && $fecha2<>""){
  //QUERY PARA NUMERO DE PAGINAS
  $sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, 
  seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
  encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
  seller.hora AS hora,encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
  encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
  encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor , 
  SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
  FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id AND seller.fecha BETWEEN '$fecha1' AND '$fecha2' ";
  
  
  }
  
  else if($valor<>"" && $fecha1<>"" && $fecha2<>""){
  //QUERY PARA NUMERO DE PAGINAS
  $sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, 
  seller.seller AS seller, EXTRACT(week FROM seller.fecha) AS semana,
  encuesta_nps.tipo_envio AS tipo_envio, encuesta_nps.cal_full AS cal_full, encuesta_nps.cal_recepcion AS cal_recepcion,
  seller.hora AS hora,encuesta_nps.cal_representante AS cal_representante, encuesta_nps.problemas_site AS problemas_site,
  encuesta_nps.problemas_txt AS problema, encuesta_nps.com_mejora AS mejora, 
  encuesta_nps.com_reconocido AS reconocimiento, seller.recibidor AS recibidor , 
  SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS descarga
  FROM encuesta_nps,seller WHERE seller.id=encuesta_nps.id AND $filtro LIKE '%$valor%' ";
  }

//Query enviada desde reportes
//nombre del archivo y charset
header('Content-Type:text/csv; charset=latin1');
header('Content-Disposition: attachment; filename="Arrival_Manage_Export_NPS.csv"');
//salida del archivo
$salida=fopen('php://output','w');
//Encabezados
fputcsv($salida, array('ID','Fecha & Hora','Semana','Seller','Representante','Tipo de envio',
'Estadia Patio','Tiempo Descarga','Calificacion FULL','Calificacion Recepcion','Calificacion Representante','Problemas al Ingresar Producto',
'Problema','Comentario de Mejora','Comentario de Reconocimiento'));
//query de reporte
$reportecsv=$link->query("$sql1");
while($filaR=$reportecsv->fetch_assoc())
fputcsv($salida,array(
    $filaR['idseller'],
    $filaR['datatime'],
    $filaR['semana'],
    $filaR['seller'],
    $filaR['recibidor'],
    $filaR['tipo_envio'],
    $filaR['t_patio'],
    $filaR['descarga'],
    $filaR['cal_full'],
    $filaR['cal_recepcion'],
    $filaR['cal_representante'],
    $filaR['problemas_site'],
    $filaR['problema'],
    $filaR['mejora'],
    $filaR['reconocimiento']));

?>