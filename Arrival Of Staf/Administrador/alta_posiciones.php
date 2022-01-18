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

$posicion=$_POST['nueva_posicion'];
$posicion_existente = "SELECT * FROM posiciones WHERE posicion = '$posicion'";
//EJECUTA LA QUERY1
$posicion_existente1 = mysqli_query($link,$posicion_existente);
if ($posicion_existente1->num_rows > 0) {
    //MANDA MESAJE DE USUARIO EXISTENTE Y REDIRECCIONA AL FORMULARIO DE REGISTRO
        ?>
        <script lenguage="javascript">alert("Posicion existente 👋≧◉ᴥ◉≦");
        function redirecional(){
        document.location.href="administrador.php";
        }
        redirecional();
        </script>
    
        <?php
    }else{

        $query1 ="INSERT INTO posiciones(posicion) VALUES ('$posicion')";
        $result1=mysqli_query($link,$query1);
    
        echo '<script lenguage="javascript">alert("La Posicion '.$posicion.' ah sido añadida 👊 ( ͡❛ ω ͡❛) 👊");
        function redirecional(){
            document.location.href="administrador.php";
        }
        redirecional();
        </script>';
    }

    
?>