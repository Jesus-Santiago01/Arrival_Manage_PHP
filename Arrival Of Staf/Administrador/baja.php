<?php

require("conexion.php");

session_start();
    //VALIDA LA SESSION
    $id_obtenido=$_SESSION['sesion_admin'];
    if($id_obtenido==""){
        echo '<script lenguage="javascript">alert("Debes de iniciar sesiòn");
                    function redirecional(){
                        document.location.href="index.html";
                    }
                    redirecional();
                    </script>';
    }

$id=$_GET['id'];

foreach ($link->query("SELECT usuario,nombre,apaterno,amaterno FROM personal WHERE id='$id'") as $row){ 
    
    $user=$row['usuario'];
    $name=$row['nombre'].' '.$row['apaterno'].' '.$row['amaterno'];

}


$query1="DELETE FROM personal WHERE id=$id";
$result1=mysqli_query($link,$query1);

echo '<script lenguage="javascript">alert("☠ El usuario '.$user.' a nombre de '.$name.' ha sido eliminado ⚰");
        function redirecional(){
        document.location.href="administrador.php";
        }
        redirecional();
    </script>';
    
?>
