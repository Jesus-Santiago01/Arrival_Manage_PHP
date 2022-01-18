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

    $id=$_POST['id_posicion'];
    $posicion=$_POST['posicion'];

    $update = "UPDATE posiciones SET posicion='$posicion' WHERE id='$id'";
    $update1 = mysqli_query($link,$update);
    echo '<script lenguage="javascript">alert("Posicion actualizada ( ͡❛ ‿っ ͡❛)👌");
    function redirecional(){
        document.location.href="administrador.php";
    }
    redirecional();
</script>';

?>