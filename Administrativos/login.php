<?php
//PIDE LA CONEXION CON BD
require("conexion.php");
//session_start — Iniciar una nueva sesión o reanudar la existente
session_start();
//EXTRAE USUARIO Y CONTRASEÑA OTORGADAS POR EL USUARIO EN EL FORMULARIO(index.html)
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
//VALIDA LO QUE INGRESA EL USUARIO CON LO QUE HAY EN LA BD
//QUERY1
$validacion_usuario="SELECT usuario,contraseña,id FROM registro_externos WHERE usuario='$usuario';";
//EJECUTA QUERY1
$result_query1= mysqli_query($link,$validacion_usuario);
//CONVIERTE LOS DATOS OBTENIDOS DE LA QUERY EN VARIABLES A TRAVEZ DE LA MATRIZ
while($matriz1=mysqli_fetch_array($result_query1)){
//ASIGNACION DE VARIABLE A LOS RESULTADOS DE MATRIZ
		$usuario_obtenido=$matriz1[0];
		$contraseña_obtenida=$matriz1[1];
    $id_obtenido=$matriz1[2];
}
//VALIDA QUE EL USUARIO Y CONTRASEÑA COINCIDAN CON LOS OBTENIDOS DE LA BD
if($contraseña_obtenida==$contraseña && $usuario_obtenido==$usuario){
	//GUARDA LA SESSION EN EL ID DEL USUARIO ($id_obtenido)
	$_SESSION['nuevasession_ext']=$id_obtenido;
	
	
		$id_obtenido=$_SESSION['nuevasession_ext'];
		//BUSCA EL NOMBRE Y APELLIDOS EL USUARIO
		//QUERY3
		$validacion_nombre="SELECT nombre,apaterno,amaterno FROM registro_externos
		WHERE id=".$id_obtenido;
		//EJECUTA QUERY3
		$result_query3=mysqli_query($link,$validacion_nombre);
		//CONVIERTE LOS DATOS OBTENIDOS DE LA QUERY EN VARIABLES A TRAVEZ DE LA MATRIZ
		while($matriz3=mysqli_fetch_array($result_query3)){
		//ASIGNACION DE VARIABLE A LOS RESULTADOS DE MATRIZ
		    $nombre_obtenido=$matriz3[0];
		    $apaterno_obtenido=$matriz3[1];
		    $amaterno_obtenido=$matriz3[2];
		}
		//UNE EL RESULTADO DE LA MATRIZ EN UNA VARIABLE
		//UNE EL NOMBRE DEL USUARIO
		$nombre_responsable=$nombre_obtenido." ".$apaterno_obtenido." ".$amaterno_obtenido;
	//REDIRECCIONA A PAGINA PRINCIPAL (recepccion.php)
	  // Obteniendo la fecha actual del sistema con PHP
  $fechaActual = date('Y-m-d');
  $fechaAntes=date("Y-m-d",strtotime($fechaActual."- 7 days")); 
   
  echo '<script lenguage="javascript">
				function redirecional(){
				document.location.href="reportes1.php?fecha1='.$fechaAntes.'&fecha2='.$fechaActual.'&filtro=&valor=&pag=1";
				}
				redirecional();
				</script>';
			}
//DE CUALQUIER OTRA FORMA MANDARA MENSAJE DE INCORRECTO Y VOLVERA AL LOGIN (index.html)
else {
  echo '<script lenguage="javascript">alert("Usuario o Contraseña incorrecta");
				function redirecional(){
				document.location.href="index.html";
				}
				redirecional();
				</script>';
}
?>
