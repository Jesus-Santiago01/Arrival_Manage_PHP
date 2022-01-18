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
        $valor=$_GET['busqueda_baja_proceso'];
        if($valor<>""){?>

            <table class="table-rwd">
                <thead>
				    <tr> 
                        <th>AREA</th>
                        <th>PROCESO</th>
                        <th></th>

                        
				    </tr>
				</thead> 
                <?php 

                

                foreach ($link->query("SELECT * 
                FROM procesos WHERE area like '%$valor%' OR proceso like '%$valor%'
               
                ") as $row){ 
                  
                   ?>
                  
                <tr>
                    <td> <?php echo $row['area']?></td>
                    <td> <?php echo $row['proceso'] ?></td>
                    

                    <td> <button class="Botones1" onclick="location.href='baja_proceso.php?id=<?php echo $row['id']?>'">Baja</button></td>
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
                        <th>AREA</th>
                        <th>PROCESO</th>
                        <th></th>

                        
				    </tr>
				</thead> 
                <?php 

                

                foreach ($link->query("SELECT * 
                FROM procesos") as $row){ 
                  
                   ?>
                  
                <tr>
                    <td> <?php echo $row['area']?></td>
                    <td> <?php echo $row['proceso'] ?></td>
                    

                    <td> <button class="Botones1" onclick="location.href='baja_proceso.php?id=<?php echo $row['id']?>'">Baja</button></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        <?php
        }
            
        ?>

