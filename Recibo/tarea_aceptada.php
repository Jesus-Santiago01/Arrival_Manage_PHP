<?php
echo $id_tarea=$_GET['id'];
require("conexion.php");

/*session_start();
$id_obtenido=$_SESSION['nuevasession_recibo'];
//BUSCA EL NOMBRE Y APELLIDOS EL USUARIO
//QUERY1
$validacion_nombre="SELECT nombre,apaterno,amaterno FROM registro_recibo
WHERE id_responsable=".$id_obtenido;
//EJECUTA QUERY1
$result_query1=mysqli_query($link,$validacion_nombre);
//CONVIERTE LOS DATOS OBTENIDOS DE LA QUERY EN VARIABLES A TRAVEZ DE LA MATRIZ
while($matriz1=mysqli_fetch_array($result_query1)){
//ASIGNACION DE VARIABLE A LOS RESULTADOS DE MATRIZ
    $nombre_obtenido=$matriz1[0];
    $apaterno_obtenido=$matriz1[1];
    $amaterno_obtenido=$matriz1[2];
}
//UNE EL RESULTADO DE LA MATRIZ EN UNA VARIABLE
//UNE EL NOMBRE DEL USUARIO
$nombre_responsable=$nombre_obtenido." ".$apaterno_obtenido." ".$amaterno_obtenido;

$update="UPDATE seller SET recibidor='$nombre_responsable',id_recibidor='$id_obtenido',estatus='descargando' WHERE id=$id_tarea";
$resu=mysqli_query($link,$update);
echo '<script lenguage="javascript">
function redirecional(){
document.location.href="formulario_descarga.php?";
}
redirecional();
</script>';*/
?>
