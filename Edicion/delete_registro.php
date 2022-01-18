<?php
require("conexion.php");

session_start();

$id_obtenido=$_SESSION['nuevasession_edicion'];
if($id_obtenido==""){
    echo '<script lenguage="javascript">alert("Debes de iniciar sesiòn");
        function redirecional(){
            document.location.href="index.html";
        }
        redirecional();
        </script>';
    }

    $id_recibo=$_GET['id_recibo'];

    $delete_datos="DELETE FROM recibo WHERE id_recibo=$id_recibo";
    $result_query=mysqli_query($link,$delete_datos);
    echo '<script lenguage="javascript">alert("Datos eliminados");
        function redirecional(){
            document.location.href="edicion.php";
        }
        redirecional();
        </script>';