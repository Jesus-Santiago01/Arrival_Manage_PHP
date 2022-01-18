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

foreach ($link->query("SELECT * FROM posiciones WHERE id='$id'") as $row){ 
    
    $area=$row['id'];
    $proceso=$row['posicion'];

}


$query1="DELETE FROM posiciones WHERE id=$id";
$result1=mysqli_query($link,$query1);

echo '<script lenguage="javascript">alert("☠ La posicion '.$posicion.' ha sido eliminada ⚰");
        function redirecional(){
        document.location.href="administrador.php";
        }
        redirecional();
    </script>';
    
?>
