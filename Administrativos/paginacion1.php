<?php
require('conexion.php');

echo $valor=$_GET['valor'];
$pag=$_GET['pag'] ;



$limit=10;
if($pag<1)
{
$pag=1;
} 


$offset=($pag-1)*$limit;
echo $pag;

$busquedaTotal1="SELECT seller.id AS idseller,seller.fecha AS fechaseller, seller.hora AS horaseller, 
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1
FROM seller,recibo WHERE seller.id=recibo.id";
		//EJECUTA QUERY3
$busquedaTotal=mysqli_query($link,$busquedaTotal1);
$total=$busquedaTotal->num_rows;

$tabla='
<table class="table-rwd">
<thead>
        <tr> 
            <th>ID</th>
            <th>IS</th>
            <th>FECHA Y HORA</th>
            <th>SELLER</th>
            <th>UNIDAD</th>
            <th>BULTOS</th>
            <th>PALLET</th>
            <th>GUIA</th>
            <th>TIPO</th>

            <th>ESTATUS</th>
            <th>DOCUMENTO</th>
        </tr>
        </thead>
		 ';
foreach ($link->query("SELECT seller.id AS idseller,ADDTIME(CAST(seller.fecha AS DATETIME), seller.hora) AS datatime, 
seller.seller AS seller1, seller.unidad AS unidad1, seller.documento AS documento1, seller.estatus AS estatus1,
recibo.ibshipment AS ibshipment1, recibo.bultos AS bultos1, recibo.pallet AS pallet1, recibo.guia AS guia1, recibo.tipo AS tipo1

FROM seller,recibo WHERE seller.id=recibo.id LIMIT $offset,$limit ") as $row){ 
   
	$tabla.='
    <tr>
    <td>'.$row['idseller'].'</td>
    <td>'.$row['ibshipment1'].'</td>
    <td>'.$row['datatime'].'</td>
    <td>'.$row['seller1'].'</td>
    <td>'.$row['unidad1'].'</td>
    <td>'.$row['bultos1'].'</td>
    <td>'.$row['pallet1'].'</td>
    <td>'.$row['guia1'].'</td>
    <td>'.$row['tipo1'].'</td>

    <td>'.$row['estatus1'].'</td>
    <td><a class="Botones" href=../Recepccion/documento/'.$row['documento1'].' target="_blank" style="text-decoration:none;">
    Abrir</a></td>
    </tr>
    

    ';
}

$tabla.='<tr><td class="text-center" colspan="10">';

	$totalPag=ceil($total/$limit);
	$links=array();
	for($i=1; $i<=$totalPag; $i++)
	{
		$links[]="<a style='border:solid 1px blue; padding-left:.6%; padding-right:.6%; padding-top:.25%; padding-bottom:.25%;' href=\"?pag=$i\">$i</a>";
	}

	$tabla.=''.implode(" ", $links);


$tabla.='</td></tr></table>';
?>
