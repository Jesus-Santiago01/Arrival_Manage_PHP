<?php
//PIDE CONEXION CON BD
require("conexion.php");
//EXTRAE LOS VALORES INGRESADOS POR EL USUARIO A TRAVEZ DEL FORMULARIO (Recepcciòn.php)
$id=$_POST['id'];
$documento="";
//session_start — Iniciar una nueva sesión o reanudar la existente
session_start();
//VALIDA LA SESSION
$id_obtenido=$_SESSION['nuevasession'];
//VALIDACION DE ARCHIVOS PDF


if (is_uploaded_file($_FILES['image_post']['tmp_name'])) {
  $p=pathinfo($_FILES['image_post']['name']);
  $ext=strtolower($p['extension']);
  if ($ext!="pdf") {
    echo '<script lenguage="javascript">alert("Solo puedes seleccionar archivos PDF");
    function redirecional(){
        document.location.href="recepccion.php";
        }
        redirecional();
  </script>';
  }else if($ext=="pdf"){
 $documento=$id.".".$ext;
$ubicacion="documento/".$documento;
 if(file_exists($ubicacion)){
   if(unlink($ubicacion)){
     
    echo "exito";
   }else{
     echo "sin exito";
   }

 }else{
   echo "archivo no existe";
 }
  
  move_uploaded_file($_FILES['image_post']['tmp_name'],"documento/".$documento);
  
  }
}
//DE OTRA MANERA SI NO SE HA SELECCIONADO DOCUMENTO SE DIRIGIRA A LA PAGINA PRINCIPAL SIN GUARDAR DATOS
if($documento==""){
  echo '<script lenguage="javascript">alert("Debes de seleccionar un documento");
	function redirecional(){
    document.location.href="recepccion.php";
    }
    redirecional();
  </script>';
}

//DE CUALQUIER OTRA FORMA SE REGISTRARAN LOS DATOS DEL SELLER
//SE GENERA UN NUEVO ID Y SE MUESTRA EL FORMULARIO PRINCIPAL
else{
  //REGISTRA DATOS DE LOS SELLERS
  //QUERY5
  $registro_escaneo="UPDATE seller SET documento='$documento' WHERE id='$id'";
  $resultado_escaneo=mysqli_query($link,$registro_escaneo);
  //INSERTA NUEVO ID A NOMBRE DEL RESPOSABLE EN LA TABLA ID
  //QUERY6
  echo '<script>
  alert("Documentos guardados");
  function redirecional(){
  document.location.href="recepccion.php";
  }
  redirecional();
  </script>';
}

//CIERRA LA BD
mysqli_close($link);
?>
