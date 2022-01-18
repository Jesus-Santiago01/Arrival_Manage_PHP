<?php
require("conexion.php");
$id=$_GET['id'];
$id_bulto=$_GET['id_recibo'];

$recibo_existente = "SELECT * FROM recibo WHERE id_recibo=$id_bulto";
$recibo_existente1 = mysqli_query($link,$recibo_existente);
if($recibo_existente1->num_rows > 0){
    $eliminar = "DELETE FROM recibo WHERE id_recibo=$id_bulto";
    $eliminar1 = mysqli_query($link,$eliminar);
    
    echo '<script lenguage="javascript">alert("Registro eliminado");
                            function redirecional(){
                                document.location.href="formulario_descarga.php?id='.$id.'";
                            }
                            redirecional();
                            </script>';

}else{
    echo '<script lenguage="javascript">alert("Registro no existente");
                            function redirecional(){
                                document.location.href="formulario_descarga.php?id='.$id.'";
                            }
                            redirecional();
                            </script>';
}
?>