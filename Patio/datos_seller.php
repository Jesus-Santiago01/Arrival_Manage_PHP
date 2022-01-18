<?php
//PIDE CONEXION CON BD
require("conexion.php");
//EXTRAE LOS VALORES INGRESADOS POR EL USUARIO A TRAVEZ DEL FORMULARIO (Recepcciòn.php)
$nombre_operador=$_POST['operador'];
$nombre_seller=$_POST['seller'];
$placas=$_POST['placas'];
$cortina=$_POST['cortina'];
$carga=$_POST['carga'];
$unidad=$_POST['unidad'];
echo $t_recibo=$_POST['R_FIB'];
//session_start — Iniciar una nueva sesión o reanudar la existente
session_start();
//VALIDA LA SESSION
$id_obtenido=$_SESSION['nuevasession_patio'];
//BUSCA EL NOMBRE Y APELLIDOS EL USUARIO
//QUERY1
$validacion_nombre="SELECT nombre,apaterno,amaterno FROM registro_patio
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
//BUSCA EL NUMERO MAXIMO DE ID DEL USUARIO SEGUN SU id_responsable
//QUERY2
$maximo_id="SELECT MAX(id) FROM id WHERE id_responsable=".$id_obtenido;
//EJECUTA QUERY2
$result_query2=mysqli_query($link,$maximo_id);
//CONVIERTE LOS DATOS OBTENIDOS DE LA QUERY EN VARIABLES A TRAVEZ DE LA MATRIZ
while ($matriz2=mysqli_fetch_array($result_query2)) {
      $id_maximo=$matriz2[0];
}

//BUSCA SI EL ID QUE SE ESTA TRABAJANDO YA EXISTE
//QUERY3
$id_existente="SELECT * FROM seller WHERE id=".$id_maximo;
//EJECUTA QUERY3
$result_query3=mysqli_query($link,$id_existente);
//SI HAY RESULTADOS EN LA QUERY SE GENERARÀ UN NUEVO ID
if($result_query3->num_rows >0){
  //INSERTA NUEVO ID A NOMBRE DEL RESPOSABLE EN LA TABLA ID
  //QUERY4
  $nuevo_id="INSERT INTO id(id_responsable,fecha,responsable)
  VALUES ('$id_obtenido',NOW(),'$nombre_responsable')";
  //EJECUTA LA QUERY4
  $result_query4= mysqli_query($link,$nuevo_id);
  echo '<script lenguage="javascript">alert("ID ya registrado, Se generara un nuevo ID");
  function redirecional(){
  document.location.href="patio.php";
  }
  redirecional();
  </script>';
}

//DE CUALQUIER OTRA FORMA SE REGISTRARAN LOS DATOS DEL SELLER
//SE GENERA UN NUEVO ID Y SE MUESTRA EL FORMULARIO PRINCIPAL
else{
  //REGISTRA DATOS DE LOS SELLERS
  //QUERY5
if($cortina>0){
  $registro_datos="INSERT INTO seller(id,responsable_recepccion,fecha,hora,operador,seller,cortina,cortina_hora,carga,unidad,placas,documento,firma,estatus,tipo)
  VALUES ('$id_maximo','$nombre_responsable',NOW(),NOW(),'$nombre_operador','$nombre_seller','$cortina',NOW()
  ,'$carga','$unidad','$placas','$documento',0,'aceptado','$t_recibo')";

}
else{
  $registro_datos="INSERT INTO seller(id,responsable_recepccion,fecha,hora,operador,seller,cortina,carga,unidad,placas,documento,firma,estatus,tipo)
  VALUES ('$id_maximo','$nombre_responsable',NOW(),NOW(),'$nombre_operador','$nombre_seller','$cortina'
  ,'$carga','$unidad','$placas','$documento',0,'aceptado','$t_recibo')";
}


  //EJECUTA QUERY5
  $result_query5= mysqli_query($link,$registro_datos);
  //INSERTA NUEVO ID A NOMBRE DEL RESPOSABLE EN LA TABLA ID
  //QUERY6
  $nuevo_id1="INSERT INTO id(id_responsable,fecha,responsable)
  VALUES ('$id_obtenido',NOW(),'$nombre_responsable')";
  //EJECUTA LA QUERY6
  $result_query6= mysqli_query($link,$nuevo_id1);
  echo '<script>
  function redirecional(){
  document.location.href="patio.php";
  }
  redirecional();
  </script>';
}
//CIERRA LA BD
mysqli_close($link);
?>
