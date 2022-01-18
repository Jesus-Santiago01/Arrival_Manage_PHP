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
    $id_proceso=$_POST['id_proceso'];
    $proceso=$_POST['proceso'];
    
    if(isset($_POST['area'])){
        $area=$_POST['area'];
        $update = "UPDATE procesos SET area='$area', proceso='$proceso' WHERE id='$id_proceso'";
        $update1 = mysqli_query($link,$update);
        echo '<script lenguage="javascript">alert("Proceso Actualizado ( ͡❛ ω ͡❛)👌");
                function redirecional(){
                    document.location.href="administrador.php";
                }
                redirecional();
            </script>';
    }else {
        $update = "UPDATE procesos SET proceso='$proceso' WHERE id='$id_proceso'";
        $update1 = mysqli_query($link,$update);
        echo '<script lenguage="javascript">alert("Proceso Actualizado ( ͡❛ ω ͡❛)👌");
                function redirecional(){
                    document.location.href="administrador.php";
                }
                redirecional();
            </script>';
    }
?>