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
     $busqueda=$_GET['busqueda'];
     $filtro=$_GET['filtro'];

    $validacion = "SELECT * FROM recibo WHERE $filtro=$busqueda";
    $validacion1 = mysqli_query($link,$validacion);

    if ($validacion1->num_rows > 0) {
   


        ?>
        <table class="table-rwd">
        <thead>
            <tr> 
                <th>ID RECIBO</th>
                <th>ID DESCARGA</th>
                <th>FECHA</th>
                <th>HORA</th>
                <th>INBOUND SHIPMENT</th>
                <th>BULTOS</th>
                <th>GUIA</th>
                <th>PALLET</th>
                <th>TIPO</th>
                <th></th>
    
                
            </tr>
        </thead> 
        <?php 
    
        
    
        foreach ($link->query("SELECT * 
        FROM recibo WHERE $filtro=$busqueda") as $row){ 
          
           ?>
          
        <tr>
            <td> <?php echo $row['id_recibo']?></td>
            <td> <?php echo $row['id']?></td>
            <td> <?php echo $row['fecha'] ?></td>
            <td> <?php echo $row['hora']?></td>
            <td> <?php echo $row['ibshipment']?></td>
            <td> <?php echo $row['bultos']?></td>
            <td> <?php echo $row['guia']?></td>
            <td> <?php echo $row['pallet']?></td>
            <td> <?php echo $row['tipo']?></td>
            
    
            <td> <button class="Botones" onclick="location.href='delete_registro.php?id_recibo=<?php echo $row['id_recibo']?>'">Eliminar</button></td>
        </tr>
        <?php
            }
        ?>
    </table>
 
<?php
    }else {
        echo 'VALOR NO ENCONTRADO';
    }
?>



