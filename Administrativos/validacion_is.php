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
<?php
require("conexion.php");
session_start();
$id_obtenido=$_SESSION['nuevasession_ext'];
if($id_obtenido==""){
    echo '<script lenguage="javascript">alert("Debes de iniciar sesiòn");
        function redirecional(){
            document.location.href="index.html";
        }
        redirecional();
        </script>';
    }
$ibshipment=$_GET['ibshipment'];

$sql1="SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, EXTRACT(week FROM seller.fecha) AS semana,
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.firma AS firma1, seller.firma AS firma1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, seller.recibidor AS recibidor1, recibo.guia AS guia1,seller.carga AS carga1, seller.unidad AS unidad1, recibo.tipo AS envio,
SUBTIME(seller.cortina_hora, seller.hora) AS t_patio, SUBTIME(seller.inicio_hora, seller.cortina_hora)AS inicio, SUBTIME(seller.termino_hora, seller.inicio_hora) AS termino,
SUBTIME(seller.termino_hora, seller.hora) AS estadia,seller.tipo AS tipo2,seller.operador AS operador1,seller.cortina AS cortina1,seller.placas AS placas1
FROM seller,recibo WHERE seller.id=recibo.id AND recibo.ibshipment=$ibshipment";
$resultado = mysqli_query($link, $sql1);



?>
<center>
<h2>Inbound Shipment: <?php echo $ibshipment ?></h2>
<br>
</center>
<div>
<h3> Información de recibo: </h3>
<?php echo 'Resultados: '. $total=$resultado->num_rows; ?>
<br>
<script>

        function cerrar5(){
        document.getElementById("documentacion").style.display="none";
        }
        function enviar(){
        document.getElementById("documentacion").style.display="block";
        var consul= document.getElementById('consul').value;

        var dataen= 'consul='+consul;

        $.ajax({

            type:'get',
            url:'documentacion.php',
            data:dataen,
            success:function(resp){
            $("#respa").html(resp);
        }

        });
        return false;
        }
    </script>
<div id="documentacion" class="documentacion">
    <div id="cerrar5">
        <button class="Botones" onclick="location.href='javascript:cerrar5()'" >
        X</button>
        
    </div>
<center>
<p id="respa">
</center>
</div>

<div id="informacion">
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
            <th>GUIA</th>
            <th>OPERADOR</th>
            <th>CORTINA</th>
            <th>TIPO</th>
            <th>CARGA</th>
            <th>UNIDAD</th>
            <th>PLACAS</th>
            <th>ESTATUS</th>
            <th>T.PATIO</th>
            <th>T.CORTINA</th>
            <th>T.DESCARGA</th>
            <th>T.ESTADIA</th>
            <th>DOCUMENTACION</th>
        </tr>
    
            <?php
    
    
            while ($fila = mysqli_fetch_assoc($resultado)) {
                if($fila['tipo2']=='f1'){
                    $tipo2='Formula IB';
                }else if($fila['tipo2']=='r1'){
                    $tipo2='Regular IB';
                }else if($fila['tipo2']=='tr'){
                    $tipo2='Transfer';
                }else if($fila['tipo2']=='cl'){
                    $tipo2='Colecta';
                } 
                ?>
                <tr>
                <td> <input id="consul" value=<?php echo$fila['idseller']?> style="text-align:center;" disabled></td>
                <td> <?php echo $fila['ibshipment1']?></td>
                <td><?php echo$fila['datatime']?> </td>
                <td><?php echo $fila['semana'] ?></td>
                <td> <?php echo$fila['seller1'] ?></td>
                <td> <?php echo$fila['bultos1'] ?></td>
                <td> <?php echo$fila['pallet1'] ?></td>
                <td> <?php echo$fila['recibidor1'] ?></td>
                <td> <?php echo$fila['envio']?> </td>
                <td> <?php echo$fila['guia1']?> </td>
                <td> <?php echo$fila['operador1']?> </td>
                <td> <?php echo$fila['cortina1']?> </td>
                <td> <?php echo$tipo2 ?> </td>
                <td> <?php echo$fila['carga1'] ?></td>
                <td> <?php echo$fila['unidad1'] ?></td>
                <td> <?php echo$fila['placas1'] ?></td>
                <td> <?php echo$fila['estatus1'] ?></td>
                <td> <?php echo$fila['t_patio']?> </td>
                <td> <?php echo$fila['inicio']?> </td>
                <td> <?php echo$fila['termino']?> </td>
                <td> <?php echo$fila['estadia'] ?></td>
                <td> <button class="Botones" onclick="location.href='javascript:enviar()'"> Abrir</button></td>

                </tr>
                <?php
            }
    
            ?>
    
        </table>
</div>

</div>
<div>
<h3> Información de rechazos: </h3>
<?php
$rechazo="SELECT id AS id1, ibshipment AS ibshipment1, fecha AS fecha1, tipo AS tipo1 ,EXTRACT(week FROM fecha) AS semana, responsable AS responsable1, 
            meli AS meli1, unidades AS unidades1, motivo AS motivo1, comentarios AS comentarios1
            FROM rechazos WHERE ibshipment=$ibshipment";
$rechazo1 = mysqli_query($link, $rechazo);
echo 'Resultados: '.$total1=$rechazo1->num_rows;
if($total1>0){

    ?>
    <br>
    <table class="table-rwd">
        <tr>
        <th>ID</th>
            <th>IS</th>
            <th>FECHA Y HORA</th>
            <th>TIPO</th>
            <th>SEMANA</th>
            <th>RECIBIDOR</th>
            <th>MELI</th>
            <th>UNIDADES</th>
            <th>MOTIVO</th>
            <th>COMENTARIOS</th>
        </tr>
        <?php
 
 
    while ($fila1 = mysqli_fetch_assoc($rechazo1)) {
        ?>
        <tr>
            <td> <?php echo$fila1['id1']?> </td>
            <td><?php echo$fila1['ibshipment1']?> </td>
            <td><?php echo $fila1['fecha1'] ?></td>
            <td><?php echo $fila1['tipo1'] ?></td>
            <td> <?php echo$fila1['semana'] ?></td>
            <td> <?php echo$fila1['responsable1'] ?></td>
            <td> <?php echo$fila1['meli1'] ?></td>
            <td> <?php echo$fila1['unidades1'] ?></td>
            <td> <?php echo$fila1['motivo1']?> </td>
            <td> <?php echo$fila1['comentarios1'] ?></td>

        </tr>
        <?php
    }

    ?>

    </table>
    <?php

}
else{
    ?>
    <center>
    <h3>Sin rechazos</h3>
    <?php
}
?>

</div>
