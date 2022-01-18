<?php
require("conexion.php");
session_start();
      //VALIDA LA SESSION
      $id_obtenido=$_SESSION['nuevasession_recibo'];
      if($id_obtenido==""){
        echo '<script lenguage="javascript">alert("Debes de iniciar sesiòn");
					function redirecional(){
						document.location.href="index.html";
					}
					redirecional();
					</script>';
      }


echo  $tipo=$_POST['tipo'];
$id=$_POST['id'];

if($tipo=="Rechazo por Bultos"){
    $id=$_POST['id'];
    $ib_shipment=$_POST['is'];
    $unidades=$_POST['unidades'];
    $motivo=$_POST['motivo'];
    $comentario=$_POST['comentario'];
    $meli="";
    
}
else if($tipo=="Rechazo por Meli"){
    $id=$_POST['id'];
    $ib_shipment=$_POST['is'];
    $meli=$_POST['meli'];
    $unidades=$_POST['unidades'];
    $motivo=$_POST['motivo'];
    $comentario=$_POST['comentario'];
}
else if($tipo=="Rechazo por Inbound Shipment"){
    $id=$_POST['id'];
    $ib_shipment=$_POST['is'];
    $motivo=$_POST['motivo'];
    $comentario=$_POST['comentario'];
    $meli="";
    $unidades="";
}

$id1="SELECT id,recibidor FROM seller WHERE id='$id'";
$result_id=mysqli_query($link,$id1);
while($matriz1=mysqli_fetch_array($result_id)){

      $id2=$matriz1[0];
      $responsable=$matriz1[1];

}

$registro_datos="INSERT INTO rechazos(id,responsable,fecha,tipo,ibshipment,meli,unidades,motivo,comentarios) VALUES 
('$id2','$responsable',NOW(),'$tipo','$ib_shipment','$meli','$unidades','$motivo','$comentario')";
$result_query=mysqli_query($link,$registro_datos);

?>
	<script>
    alert("Rechazo registrado");
	window.location.href ='formulario_descarga.php?id=<?php echo $id2;?>';

	</script>

