<?php
//DECLARACION DE VARIABLES QUE EXTRAERA DEL FORMULARIO DE registro.html
//CON EL METODO POST
$nombre=$_POST['nombre'];
$apaterno=$_POST['apaterno'];
$amaterno=$_POST['amaterno'];
$turno=$_POST['turno'];
$puesto=$_POST['puesto'];
$area=$_POST['area'];
$rol=$_POST['rol'];
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
$confirmacion=$_POST['confirmacion'];
//DECLARACION DE LA CLAVE PARA REGISTRAR
$clave="!SisoFStJAST_20*";
//PIDE LA CONEXION CON LA BASE DE DATOS DECLARADA EN conexion.php
require("conexion.php");
//BUSCA USUARIOS EXISTENTES MEDIANTE LA QUERY DE LA VARIABLE $usuario_existente
//QUERY1
$usuario_existente = "SELECT * FROM personal WHERE usuario = '$usuario'";
//EJECUTA LA QUERY1
$result_query1 = mysqli_query($link,$usuario_existente);
//COMPARA SI HAY RESULTADOS EN LA BUSQUEDA
//SI LOS RESULTADOS SON MAYOR A 0 EL USUARIO YA EXISTE
if ($result_query1->num_rows > 0) {
//MANDA MESAJE DE USUARIO EXISTENTE Y REDIRECCIONA AL FORMULARIO DE REGISTRO
?>
	<script lenguage="javascript">alert("Usuario existente, ingresa uno nuevo");
	function redirecional(){
	document.location.href="administrador.php";
	}
	redirecional();
	</script>

	<?php
}
else if($turno==0){
	?>
	<script lenguage="javascript">alert("Debes de seleccionar un turno");
	function redirecional(){
	document.location.href="administrador.php";
	}
	redirecional();
	</script>

	<?php
}
else if($puesto==0){
	?>
	<script lenguage="javascript">alert("Debes de seleccionar un puesto");
	function redirecional(){
	document.location.href="administrador.php";
	}
	redirecional();
	</script>

	<?php
}
else if($area==0){
	?>
	<script lenguage="javascript">alert("Debes de seleccionar un area");
	function redirecional(){
	document.location.href="administrador.php";
	}
	redirecional();
	</script>

	<?php
}
else if($rol==0){
	?>
	<script lenguage="javascript">alert("Debes de seleccionar un rol");
	function redirecional(){
	document.location.href="administrador.php";
	}
	redirecional();
	</script>

	<?php
}
//SI NO HAY RESULTADOS EN LA BUSQUEDADE QUERY1
//Y SI LA $confirmacion = $clave HARÀ EL REGISTRO EN LA BD
else {
	if($confirmacion==$clave){
//QUERY PARA INSERTAR REGISTROS EN BD
//QUERY2

	$registro ="INSERT INTO personal(nombre,apaterno,amaterno,area,puesto,turno,rol,usuario,contraseña,confirmacion) VALUES
	('$nombre','$apaterno','$amaterno','$area','$puesto','$turno','$rol','$usuario','$contraseña','$confirmacion')";
//EJECUTA LA QUERY2
	$result_query2= mysqli_query($link,$registro);
//MANDA MENSAJE DE REGISTRO EXITOSO Y REDIRECCIONA AL LOGIN (index.html)
	echo '<script lenguage="javascript">alert("Personal agregado (👍︡• ͜ʖ•︠)👍");
	function redirecional(){
	document.location.href="administrador.php";
	}
	redirecional();
	</script>';
	}
//DE CUALQUIER OTRA FORMA SERA UN REGISTRO FALLIDO
	else{
		echo '<script lenguage="javascript">alert("Registro fallido (︡• 👅•︠)👎");
		function redirecional(){
		document.location.href="administrador.php";
		}
		redirecional();
		</script>';
	}
}
mysqli_close($link);
?>
