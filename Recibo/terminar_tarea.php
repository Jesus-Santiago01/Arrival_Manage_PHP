<?php

 $id=$_POST['id'];
 $tipo=$_POST['tipo'];

require("conexion.php");
$id1="SELECT id FROM seller WHERE id='$id'";
$result_id=mysqli_query($link,$id1);
while($matriz1=mysqli_fetch_array($result_id)){

     $id2=$matriz1[0];

}

$datos_rechazos="SELECT * FROM rechazos WHERE id='$id2'";
$result_datos=mysqli_query($link,$datos_rechazos);
$datos_recibo="SELECT * FROM recibo WHERE id='$id2'";
$result_datos1=mysqli_query($link,$datos_recibo);
$encuesta_existente = "SELECT * FROM encuesta_nps WHERE id=$id2";
$result_query1 = mysqli_query($link,$encuesta_existente);
$firma_existente = "SELECT firma FROM seller WHERE id=$id2 ";
$firma_existente1 = mysqli_query($link,$firma_existente);
while($matriz2=mysqli_fetch_array($firma_existente1)){

    $firma_existente2=$matriz2[0];

}

if($result_datos->num_rows <=0 && $result_datos1->num_rows <=0) {
    ?>
	<script>
    alert("No puedes terminar la tarea sin ingresar datos");
    window.location.href ='formulario_descarga.php?id=<?php echo $id2;?>';
	</script>
<?php
}

else if($result_query1->num_rows <=0 && $result_datos1->num_rows >0) {
    ?>
	<script>
    alert("Necesitas reaizar la encuesta NPS para poder terminar la tarea");
    window.location.href ='formulario_descarga.php?id=<?php echo $id2;?>';
	</script>
<?php
}
else if($firma_existente2<=0 && $result_datos1->num_rows >0) {
    ?>
	<script>
    alert("Para finalizar la tarea necesitas pedirle la firma al operador");
    window.location.href ='formulario_descarga.php?id=<?php echo $id2;?>';
	</script>
<?php
}

else{

$terminar="UPDATE seller SET estatus='terminado',termino_hora=NOW() WHERE id='$id2'";
$result_query=mysqli_query($link,$terminar);
$tipo_query="UPDATE recibo SET tipo='$tipo' WHERE id='$id2'";
$result_query2=mysqli_query($link,$tipo_query);
?>
	<script>
    alert("Tarea terminada");
    window.location.href ='recibo.php';
	</script>
<?php
}
?>