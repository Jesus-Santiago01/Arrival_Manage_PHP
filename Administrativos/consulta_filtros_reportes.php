<?php
require("conexion.php");
echo $filtro=$_GET['filtro'];
echo $valor=$_GET['valor'];
echo $fecha1=$_GET['fecha1'];
echo $fecha2=$_GET['fecha2'];
$numElementos = 5;
if (isset($_GET['pag'])) {
  $pagina = $_GET['pag'];
} else {
  $pagina = 1;
}

if($valor<>"" && $fecha1=="" && $fecha2==""){
    //QUERY PARA NUMERO DE PAGINAS
$sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1, recibo.guia AS guia1,seller.carga AS carga1, seller.unidad AS unidad1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id AND $filtro=$valor ";

  $sql="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1 , seller.recibidor AS recibidor1, recibo.guia AS guia1, seller.carga AS carga1, seller.unidad AS unidad1 ,recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id AND $filtro=$valor LIMIT " . (($pagina - 1) * $numElementos)  . "," . $numElementos;;   

}
else if($valor=="" && $fecha1<>"" && $fecha2==""){
  //QUERY PARA NUMERO DE PAGINAS
$sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1, recibo.guia AS guia1,seller.carga AS carga1, seller.unidad AS unidad1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id AND seller.fecha='$fecha1' ";

$sql="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1 , seller.recibidor AS recibidor1, recibo.guia AS guia1, seller.carga AS carga1, seller.unidad AS unidad1 ,recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id  AND seller.fecha='$fecha1' LIMIT " . (($pagina - 1) * $numElementos)  . "," . $numElementos;   


}

else if($valor=="" && $fecha1<>"" && $fecha2<>""){
  //QUERY PARA NUMERO DE PAGINAS
$sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1, recibo.guia AS guia1,seller.carga AS carga1, seller.unidad AS unidad1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id AND seller.fecha BETWEEN '$fecha1' AND '$fecha2' ";

$sql="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1 , seller.recibidor AS recibidor1, recibo.guia AS guia1, seller.carga AS carga1, seller.unidad AS unidad1 ,recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id AND seller.fecha BETWEEN '$fecha1' AND '$fecha2' LIMIT " . (($pagina - 1) * $numElementos)  . "," . $numElementos;


}

else if($valor<>"" && $fecha1<>"" && $fecha2<>""){
  //QUERY PARA NUMERO DE PAGINAS
$sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1, recibo.guia AS guia1,seller.carga AS carga1, seller.unidad AS unidad1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id AND $filtro=$valor ";

$sql="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1 , seller.recibidor AS recibidor1, recibo.guia AS guia1, seller.carga AS carga1, seller.unidad AS unidad1 ,recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2
FROM seller,recibo WHERE seller.id=recibo.id AND $filtro=$valor LIMIT " . (($pagina - 1) * $numElementos)  . "," . $numElementos;

}
else if($valor=="" && $fecha1=="" && $fecha2==""){
  ?>
  <script>
  alert("Valor no encontrado");
  function redirecional(){
				document.location.href="reportes1.php";
				}
				redirecional();
  </script>
  <?php
}
else if($total==0){
  ?>
  <script>
  alert("Valor no encontrado");
  function redirecional(){
				document.location.href="reportes1.php";
				}
				redirecional();
  </script>
  <?php
}
$resultado = mysqli_query($link, $sql);
$resultadoMaximo = mysqli_query($link, $sql1);
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
                <a href="consulta_filtros_reportes.php?pag=<?php echo $_GET['pag'] - 1; ?>"><button class="Botones">Anterior</button></a>
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
            <a href="consulta_filtros_reportes.php?pag=<?php echo $_GET['pag'] + 1; ?>"><button class="Botones">Siguiente</button></a>
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
            <a href="consulta_filtros_reportes.php?pag=2"><button class="Botones">Siguiente</button></a>
        <?php
        }
 
 
        ?>
 
 
    </div>