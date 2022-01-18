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
        $valor=$_GET['busqueda_posicion'];


        if($valor<>""){?>
        <table class="table-rwd">
                <thead>
                    <tr> 
                        <th>ID</th>
                        <th>POSICION</th>
                    </tr>
                </thead>
                <?php 
                foreach ($link->query("SELECT * FROM posiciones WHERE posicion LIKE '%$valor%'") as $row){ ?>
                
                <tr>
                    <td> <?php echo $row['id']?></td>
                    <td> <?php echo $row['posicion'] ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        <?php

        }
        else if($valor==""){?>
            <table class="table-rwd">
                <thead>
                    <tr> 
                        <th>AREA</th>
                        <th>PROCESO</th>
                    </tr>
                </thead>
                <?php 
                foreach ($link->query("SELECT * FROM posiciones") as $row){ ?>
                
                <tr>
                    <td> <?php echo $row['id']?></td>
                    <td> <?php echo $row['posicion'] ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>

        <?php
        }
            
        ?>

