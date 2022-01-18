<?php
//PIDE LA CONEXION CON LA BD
require("conexion.php");
$documento="";
if (is_uploaded_file($_FILES['image_post']['tmp_name'])) {
$p=pathinfo($_FILES['image_post']['name']);
$ext=strtolower($p['extension']);
if ($ext!="pdf") {
	echo '<script lenguage="javascript">alert("Solo pudes subir archivos PDF");
	function redirecional(){
	document.location.href="actualizacion_formulario.php";
	}
	redirecional();
	</script>';
}
$documento=$id."update.".$ext;
}
if ($documento==""){
	echo '<script lenguage="javascript">alert("Debes de seleccionar un documento");
  </script>';
}
else {
	echo '<script lenguage="javascript">alert("'.$documento	.'");
  </script>';
}

  // Actualizar



?>
