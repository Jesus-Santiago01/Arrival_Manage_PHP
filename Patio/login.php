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
$validacion_usuario="SELECT usuario,contraseña,id_responsable FROM registro_patio WHERE usuario='$usuario';";
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
	//GUARDA LA SESSION EN EL ID DEL USUARIO ($id__obtenido)
	$_SESSION['nuevasession_patio']=$id_obtenido;
	//BUSCA EL NUMERO MAXIMO DE ID DEL USUARIO SEGUN SU id_responsable
	//QUERY2
	$maximo_id="SELECT MAX(id) FROM id WHERE id_responsable=".$id_obtenido;
	//EJECUTA QUERY2
	$result_query2=mysqli_query($link,$maximo_id);
	//CONVIERTE LOS DATOS OBTENIDOS DE LA QUERY EN VARIABLES A TRAVEZ DE LA MATRIZ
	while ($matriz2=mysqli_fetch_array($result_query2)) {
		 		$id_maximo=$matriz2[0];
	}
	if($id_maximo==0){
		$id_obtenido=$_SESSION['nuevasession_patio'];
		//BUSCA EL NOMBRE Y APELLIDOS EL USUARIO
		//QUERY3
		$validacion_nombre="SELECT nombre,apaterno,amaterno FROM registro_patio
		WHERE id_responsable=".$id_obtenido;
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
		//INSERTA NUEVO ID A NOMBRE DEL RESPOSABLE EN LA TABLA ID
		$nuevo_id="INSERT INTO id(id_responsable,fecha,responsable)
		VALUES ('$id_obtenido',NOW(),'$nombre_responsable')";
		//EJECUTA LA QUERY
		$result_nuevo_id= mysqli_query($link,$nuevo_id);
	}
	//REDIRECCIONA A PAGINA PRINCIPAL (recepccion.php)
  echo '<script lenguage="javascript">
				function redirecional(){
				document.location.href="patio.php";
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
