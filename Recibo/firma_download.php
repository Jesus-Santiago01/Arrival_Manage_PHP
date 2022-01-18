<?php 

	require("conexion.php");
	$id=$_POST['id_firma'];
	$result = array();
	echo $imagedata = base64_decode($_POST['img_data']);
	echo $filename = md5(date("dmYhisA"));
	//Location to where you want to created sign image
	$file_name = '../Recepccion/firmas/'.$id.'.png';
	file_put_contents($file_name,$imagedata);
	$result['file_name'] = $id;
	json_encode($result);
	$firma=''.$id.'.png';
	$registro_firma="UPDATE seller SET firma='$firma' WHERE id=$id";
	$resultado_firma=mysqli_query($link,$registro_firma);
?>	
