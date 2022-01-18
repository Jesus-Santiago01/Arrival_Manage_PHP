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
        $valor=$_GET['busqueda_baja_posicion'];
        if($valor<>""){?>

            <table class="table-rwd">
                <thead>
				    <tr> 
                        <th>ID</th>
                        <th>POSICION</th>
                        <th></th>

                        
				    </tr>
				</thead> 
                <?php 

                

                foreach ($link->query("SELECT * 
                FROM posiciones WHERE posicion like '%$valor%'") as $row){ 
                  
                   ?>
                  
                <tr>
                    <td> <?php echo $row['id']?></td>
                    <td> <?php echo $row['posicion'] ?></td>
                    

                    <td> <button class="Botones1" onclick="location.href='baja_posicion.php?id=<?php echo $row['id']?>'">Baja</button></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        <?php
        }
        else{?>
            <table class="table-rwd">
                <thead>
				    <tr> 
                        <th>ID</th>
                        <th>POSICION</th>
                        <th></th>

                        
				    </tr>
				</thead> 
                <?php 

                

                foreach ($link->query("SELECT * 
                FROM posiciones") as $row){ 
                  
                   ?>
                  
                <tr>
                    <td> <?php echo $row['id']?></td>
                    <td> <?php echo $row['posicion'] ?></td>
                    

                    <td> <button class="Botones1" onclick="location.href='baja_posicion.php?id=<?php echo $row['id']?>'">Baja</button></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        <?php
        }
            
        ?>

