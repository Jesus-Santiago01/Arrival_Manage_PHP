<?php
$id=$_POST['id'];
$confirmacion=$_POST['confirmacion'];

require("conexion.php");
$id1="SELECT id FROM seller WHERE id='$id'";
$result_id=mysqli_query($link,$id1);
while($matriz1=mysqli_fetch_array($result_id)){

     $id2=$matriz1[0];

}

$estatus="UPDATE seller SET estatus='aceptado' WHERE id='$id2'";
$result_query=mysqli_query($link,$estatus);

$clave="#JAST%Low_rECeiving";

if($confirmacion==$clave){
?>
<script>
    alert("Tarea abandonada");
	window.location.href ='logout.php';

	</script>

<?php
}else{
?>
<script>
    alert("Clave incorrecta");
	window.location.href ='formulario_descarga.php?id=<?php echo $id2;?>';

</script>
<?php
}
?>