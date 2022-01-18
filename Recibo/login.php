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
$validacion_usuario="SELECT usuario,contraseña,id_responsable FROM registro_recibo WHERE usuario='$usuario'";
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
	$_SESSION['nuevasession_recibo']=$id_obtenido;

	$validacion_nombre="SELECT nombre,apaterno,amaterno FROM registro_recibo
	WHERE id_responsable='$id_obtenido'";
	//EJECUTA QUERY1
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

	//VALIDA ID CON USUARIO ASIGNADO EN TAREA
	$id_asignado="SELECT id,id_recibidor,estatus,recibidor FROM seller 
	WHERE id_recibidor='$id_obtenido' AND recibidor='$nombre_responsable' AND estatus='asignado'";
	$resu_asignado=mysqli_query($link,$id_asignado);
	while($matriz2=mysqli_fetch_array($resu_asignado)){
		//ASIGNACION DE VARIABLE A LOS RESULTADOS DE MATRIZ
				$id_asignado1=$matriz2[0];
				$id_recibidor_asignado1=$matriz2[1];
				$estatus_asignado1=$matriz2[2];
				$recibidor_asignado1=$matriz2[3];
				
	}
	//VALIDA ID CON USUARIO RECIBIENDO EN TAREA
	$id_recibiendo="SELECT id,id_recibidor,estatus,recibidor FROM seller 
	WHERE id_recibidor='$id_obtenido' AND recibidor='$nombre_responsable' AND estatus='descargando'";
	$resu_recibiendo=mysqli_query($link,$id_recibiendo);
	while($matriz3=mysqli_fetch_array($resu_recibiendo)){
		//ASIGNACION DE VARIABLE A LOS RESULTADOS DE MATRIZ
				$id_recibiendo1=$matriz3[0];
				$id_recibidor_recibiendo1=$matriz3[1];
				$estatus_recibiendo1=$matriz3[2];
				$recibidor_recibiendo1=$matriz3[3];
				
	}
	if ($resu_asignado->num_rows >0){
		$cambio_estatus="UPDATE seller SET estatus='aceptado', id_recibidor=0, recibidor='' 
		WHERE id='$id_asignado1' ";
		$resu_cambio=mysqli_query($link,$cambio_estatus);
		?>
		<script>
		alert("Tienes una tarea pendiente");
		window.location.href ='asignacion_tarea2.php?id=<?php echo $id_asignado1; ?>';

		</script>
		<?php
		
	}
	else if ($resu_recibiendo->num_rows >0){
		?>
		<script>
		alert("Tienes una tarea pendiente recibo");
		window.location.href ='formulario_descarga.php?id=<?php echo $id_recibiendo1; ?>';

		</script>
		<?php
		
	}
	else{
	
	//REDIRECCIONA A PAGINA PRINCIPAL (recibo.php)
  	echo '<script lenguage="javascript">
				function redirecional(){
				document.location.href="recibo.php";
				}
				redirecional();
				</script>';
			}
//DE CUALQUIER OTRA FORMA MANDARA MENSAJE DE INCORRECTO Y VOLVERA AL LOGIN (index.html)
}else {
  echo '<script lenguage="javascript">alert("Usuario o Contraseña incorrecta");
				function redirecional(){
				document.location.href="index.html";
				}
				redirecional();
				</script>';
}
?>
