<?php
require("conexion.php");
$id=$_GET['consul'];

$sql="SELECT documento, firma FROM seller WHERE id=$id";
$result=mysqli_query($link,$sql);
while($matriz1=mysqli_fetch_array($result)){
    //ASIGNACION DE VARIABLE A LOS RESULTADOS DE MATRIZ
            $doc=$matriz1[0];
            $firma=$matriz1[1];
    }

?>
<h3> Firma: </h3>
<img src="../Recepccion/firmas/<?php echo$firma?>" style="width:30%;">
<h3> Documento: </h3>
<br><embed src="../Recepccion/documento/<?php echo$doc?>" type="application/pdf" width="60%" height="1150px" />