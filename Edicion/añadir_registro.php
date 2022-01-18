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

    
     $id_descarga=$_POST['id_descarga'];
     $ibshipment=$_POST['ibshipment'];
     $bultos=$_POST['bultos'];
     $guia=$_POST['guia'];
     $pallet=$_POST['pallet'];

    if($bultos <=0){
        echo '<script lenguage="javascript">alert("Debes de ingresar al menos un bulto");
        function redirecional(){
            document.location.href="agregacion.php";
        }
        redirecional();
        </script>';
    }else if($ibshipment<=999){
        echo '<script lenguage="javascript">alert("IS no valido");
        function redirecional(){
            document.location.href="agregacion.php";
        }
        redirecional();
        </script>';
    }else if (preg_match("/^PL-0-/", $pallet)){

        $update_datos="INSERT INTO recibo (id,fecha,hora,ibshipment,bultos,guia,pallet) VALUES 
            ('$id_descarga',NOW(), NOW(),'$ibshipment','$bultos','$guia','$pallet')";
        $result_query=mysqli_query($link,$update_datos);
        echo '<script lenguage="javascript">alert("Datos añadidos");
        function redirecional(){
            document.location.href="agregacion.php";
        }
        redirecional();
        </script>';
    }else{
        echo '<script lenguage="javascript">alert("Pallet no valido");
        function redirecional(){
            document.location.href="agregacion.php";
        }
        redirecional();
        </script>';
    }



    ?>