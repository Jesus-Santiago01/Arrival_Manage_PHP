<?php
//DECLARACION DE VARIABLES QUE EXTRAERA DEL FORMULARIO DE registro.html
//CON EL METODO POST
$nombre=$_POST['nombre'];
$apaterno=$_POST['apaterno'];
$amaterno=$_POST['amaterno'];
$turno=$_POST['turno'];
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
$confirmacion=$_POST['confirmacion'];
//DECLARACION DE LA CLAVE PARA REGISTRAR
$clave="#JAST%Low_rECeiving";
//PIDE LA CONEXION CON LA BASE DE DATOS DECLARADA EN conexion.php
require("conexion.php");
//BUSCA USUARIOS EXISTENTES MEDIANTE LA QUERY DE LA VARIABLE $usuario_existente
//QUERY1
$usuario_existente = "SELECT * FROM registro_patio WHERE usuario = '$usuario'";
//EJECUTA LA QUERY1
$result_query1 = mysqli_query($link,$usuario_existente);
//COMPARA SI HAY RESULTADOS EN LA BUSQUEDA
//SI LOS RESULTADOS SON MAYOR A 0 EL USUARIO YA EXISTE
if ($result_query1->num_rows > 0) {
//MANDA MESAJE DE USUARIO EXISTENTE Y REDIRECCIONA AL FORMULARIO DE REGISTRO
	echo '<script lenguage="javascript">alert("Usuario existente, ingresa uno nuevo");
	function redirecional(){
	document.location.href="registro.html";
	}
	redirecional();
	</script>';
}
//SI NO HAY RESULTADOS EN LA BUSQUEDADE QUERY1
//Y SI LA $confirmacion = $clave HARÀ EL REGISTRO EN LA BD
else {
	if($confirmacion==$clave){
//QUERY PARA INSERTAR REGISTROS EN BD
//QUERY2
#FGFFF
	$registro ="INSERT INTO registro_patio(nombre,apaterno,amaterno,usuario,turno,contraseña,confirmacion) VALUES
	('$nombre','$apaterno','$amaterno','$usuario','$turno','$contraseña','$confirmacion')";
//EJECUTA LA QUERY2
	$result_query2= mysqli_query($link,$registro);
//MANDA MENSAJE DE REGISTRO EXITOSO Y REDIRECCIONA AL LOGIN (index.html)
	echo '<script lenguage="javascript">alert("Registro exitoso");
	function redirecional(){
	document.location.href="index.html";
	}
	redirecional();
	</script>';
	}
//DE CUALQUIER OTRA FORMA SERA UN REGISTRO FALLIDO
	else{
		echo '<script lenguage="javascript">alert("Registro fallido");
		function redirecional(){
		document.location.href="registro.html";
		}
		redirecional();
		</script>';
	}
}
mysqli_close($link);
?>
