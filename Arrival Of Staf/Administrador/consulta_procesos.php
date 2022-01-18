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
        $valor=$_GET['busqueda_proceso'];


        if($valor<>""){?>
        <table class="table-rwd">
                <thead>
                    <tr> 
                        <th>AREA</th>
                        <th>PROCESO</th>
                    </tr>
                </thead>
                <?php 
                foreach ($link->query("SELECT * FROM procesos WHERE area LIKE '%$valor%' OR proceso LIKE '%$valor%'") as $row){ ?>
                
                <tr>
                    <td> <?php echo $row['area']?></td>
                    <td> <?php echo $row['proceso'] ?></td>
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
                foreach ($link->query("SELECT * FROM procesos") as $row){ ?>
                
                <tr>
                    <td> <?php echo $row['area']?></td>
                    <td> <?php echo $row['proceso'] ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>

        <?php
        }
            
        ?>

