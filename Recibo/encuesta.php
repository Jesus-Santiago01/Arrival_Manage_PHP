<?php  
require("conexion.php");
$id=$_POST['id'];
$tipo_envio=$_POST['r1'];
$cal_full=$_POST['r2'];
$cal_recepcion=$_POST['r3'];
$cal_representante=$_POST['r4'];
$problemas_site=$_POST['r5'];
$problemas_txt=$_POST['r6'];
$com_mejora=$_POST['r7'];
$com_reconocido=$_POST['r8'];

$encuesta_existente = "SELECT * FROM encuesta_nps WHERE id=$id";
$result_query1 = mysqli_query($link,$encuesta_existente);
if ($result_query1->num_rows > 0) {
		?><script>
    alert("Encuesta ya realizada");
	window.location.href ='formulario_descarga.php?id=<?php echo $id;?>';

	</script>
    <?php
}
else{
    $registro_datos="INSERT INTO encuesta_nps(id,tipo_envio,cal_full,cal_recepcion,cal_representante,problemas_site,
problemas_txt,com_mejora,com_reconocido) VALUES 
('$id','$tipo_envio',$cal_full,$cal_recepcion,$cal_representante,'$problemas_site','$problemas_txt','$com_mejora',
'$com_reconocido')";
$result_query=mysqli_query($link,$registro_datos);



?>

	<script>
    alert("Encuesta Registrada");
	window.location.href ='formulario_descarga.php?id=<?php echo $id;?>';

	</script>
<?php
}
?>