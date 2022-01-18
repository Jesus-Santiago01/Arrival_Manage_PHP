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

$proceso=$_POST['nuevo_proceso'];
$proceso_existente = "SELECT * FROM procesos WHERE proceso = '$proceso'";
$proceso_existente1 = mysqli_query($link,$proceso_existente);
if ($proceso_existente1->num_rows > 0) {
?>
    <script lenguage="javascript">alert("Proceso existente 👋≧◉ᴥ◉≦");
    function redirecional(){
        document.location.href="administrador.php";
    }
    redirecional();
    </script>
        
<?php
}

else if(isset($_POST['area'])){
    $area=$_POST['area'];

    $query1 ="INSERT INTO procesos(area,proceso) VALUES ('$area','$proceso')";
    $result1=mysqli_query($link,$query1);

    echo '<script lenguage="javascript">alert("El proceso '.$proceso.' ah sido añadido al area '.$area.' 👊 ( ͡❛ ω ͡❛) 👊");
    function redirecional(){
        document.location.href="administrador.php";
    }
    redirecional();
    </script>';
}
else{
    echo '<script lenguage="javascript">alert("Debes de seleccionar un area");
    function redirecional(){
        document.location.href="administrador.php";
    }
    redirecional();
    </script>';
}

?>