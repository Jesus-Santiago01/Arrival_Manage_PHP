<?php
$id=$_POST['id'];
$confirmacion=$_POST['confirmacion'];
$motivo=$_POST['motivo'];

require("conexion.php");
$id1="SELECT id FROM seller WHERE id='$id'";
$result_id=mysqli_query($link,$id1);
while($matriz1=mysqli_fetch_array($result_id)){

    $id2=$matriz1[0];

}
session_start();
//VALIDA LA SESSION
$id_obtenido=$_SESSION['nuevasession_recibo'];


$validacion_datos="SELECT id,recibidor,seller,carga,unidad,placas,documento FROM seller WHERE id='$id2'";
//EJECUTA QUERY1
$result_datos=mysqli_query($link,$validacion_datos);
//CONVIERTE LOS DATOS OBTENIDOS DE LA QUERY EN VARIABLES A TRAVEZ DE LA MATRIZ
while($matriz3=mysqli_fetch_array($result_datos)){
//ASIGNACION DE VARIABLE A LOS RESULTADOS DE MATRIZ
     $id3=$matriz3[0];
    $recibidor=$matriz3[1];
    $seller=$matriz3[2];
    $carga=$matriz3[3];
    $unidad=$matriz3[4];
    $placas=$matriz3[5];
    $documento=$matriz3[6];
}





$clave="#JAST%Low_rECeiving";






if($confirmacion==$clave){
    $registro_datos="INSERT INTO tarea_rechazada(id,recibidor,fecha,hora,seller,carga,unidad,placas,causal,documento) 
VALUES ('$id3','$recibidor',NOW(),NOW(),'$seller','$carga','$unidad','$placas','$motivo','$documento')";
$result_query=mysqli_query($link,$registro_datos);

$estatus="UPDATE seller SET estatus='aceptado',recibidor='',id_recibidor=0, inicio_hora='' WHERE id='$id2'";
$result_query=mysqli_query($link,$estatus);
?>
<script>
    alert("Tarea abandonada");
	window.location.href ='logout.php';

	</script>

<?php
}else{
$estatus1="UPDATE seller SET estatus='aceptado',recibidor='',id_recibidor=0 WHERE id='$id2'";
$result_query1=mysqli_query($link,$estatus1);
?>
<script>
    alert("Clave incorrecta");
	window.location.href ='asignacion_tarea2.php?id=<?php echo $id3;?>';

</script>
<?php
}
?>