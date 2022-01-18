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
            
        ?>

<table class="table-rwd">
                <thead>
				    <tr> 
                        <th>NOMBRE</th>
                        <th>AREA</th>
                        <th>PUESTO</th>
                        <th>TURNO</th>
                        <th>ROL</th>
                        <th>USUARIO</th>
                        <th>CONTRASEÑA</th>
                        <th></th>

                        
				    </tr>
				</thead> 
                <?php 

                $valor=$_GET['busqueda'];

                foreach ($link->query("SELECT * 
                FROM personal
                WHERE 
                NOT rol = 'admin' AND 
                (CASE
                WHEN nombre like '%$valor%' then 1
                WHEN apaterno like '%$valor%' then 1
                WHEN amaterno like '%$valor%' then 1
                WHEN area like '%$valor%' then 1
                WHEN usuario like '%$valor%' then 1
                WHEN usuario like '%$valor%' then 1
                WHEN puesto like '%$valor%' then 1
                WHEN rol like '%$valor%' then 1
                WHEN turno like '%$valor%' then 1
                else 0
                end ) = 1") as $row){ 
                  
                  
                  
                  $_SESSION['id_rep']=$row['id'];
                  
                   ?>
                  
                <tr>
                    <td> <?php echo $row['nombre']; echo ' '.$row['apaterno']; echo ' '.$row['amaterno'];?></td>
                    <td> <?php echo $row['area'] ?></td>
                    <td> <?php echo $row['puesto'] ?></td>
                    <td> <?php echo $row['turno'] ?></td>
                    <td> <?php echo $row['rol']?></td>
                    <td> <?php echo $row['usuario'] ?></td>
                    <td> <input type='password' onclick="this.type='text',value=''" value='<?php echo $row['contraseña'] ?>' disabled> </td>
                     

                    <td> <button class="Botones1" onclick="location.href='baja.php?id=<?php echo $row['id']?>'">Baja</button></td>
                </tr>
                <?php
                    }
                ?>
            </table>