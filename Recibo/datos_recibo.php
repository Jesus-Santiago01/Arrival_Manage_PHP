<?php
$id=$_POST['id'];
$is=$_POST['is'];
$bultos=$_POST['bultos'];
$guia=$_POST['guia'];
$pallet=$_POST['pallet'];

require("conexion.php");
$id1="SELECT id FROM seller WHERE id='$id'";
$result_id=mysqli_query($link,$id1);
while($matriz1=mysqli_fetch_array($result_id)){

    $id2=$matriz1[0];

}

if($bultos<=0){

?>
<script>
    alert("Debes de ingresar al menos un bulto");
	window.location.href ='formulario_descarga.php?id=<?php echo $id2;?>';

</script>
<?php

}
else if(preg_match("/^PL-0-/", $pallet))
{
	$registro_datos="INSERT INTO recibo(id,fecha,hora,ibshipment,bultos,guia,pallet) VALUES ('$id',NOW(),NOW(),'$is',
	'$bultos','$guia','$pallet')";
	$result_query=mysqli_query($link,$registro_datos);
	?>
	<script>
		window.location.href ='formulario_descarga.php?id=<?php echo $id2;?>';
	
	</script>
	<?php

}

else{

	?>
	<script>
		alert("Pallet no valido");
		window.location.href ='formulario_descarga.php?id=<?php echo $id2;?>';
	
	</script>
	<?php
}
?>