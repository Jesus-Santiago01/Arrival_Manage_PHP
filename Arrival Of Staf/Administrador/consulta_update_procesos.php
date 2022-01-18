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
    $valor=$_GET['busqueda_update_proceso'];
    $validacion = "SELECT * FROM procesos WHERE proceso = '$valor'";
    $result_validacion = mysqli_query($link,$validacion);

    if($result_validacion->num_rows > 0){
        foreach ($link->query("SELECT * FROM procesos WHERE proceso = '$valor'") as $row){ ?>
            <form action="update_proceso.php" method="POST">
                <div class="form">
                    <input type="text" name="id_proceso" autocomplete="off" id="id_proceso" class="form__input"
                    value="<?php echo $row['id'] ?>" readonly=»readonly»>
                    <label for="id_proceso" class="form__label">ID proceso</label>
                </div>
                <br>
                <br>
                <div class="form">
                    <input type="text" name="area_proceso" autocomplete="off" id="area_proceso" class="form__input"
                    value="<?php echo $row['area'] ?>" readonly=»readonly»>
                    <label for="area_proceso" class="form__label">Area</label>
                </div>
                <br>
                <h3 style="color:#ffffff; background-color: #060b23;"><<< Solo si se cambia el area seleccione el area de cambio /<p>
                </p> En dado caso que no sea cambio de area omitir este paso >>></h3>
                <br>
                <div class="select">
                <select name="area" id="area">
                    <option value="0"selected disabled>Area</option>
                    <option value="Inbound">Inbound</option>
                    <option value="Outbound">Outbound</option>
                </select>
                </div>
                <br>
                <br>
                <div class="form">
                    <input type="text" name="proceso" autocomplete="off" id="proceso" class="form__input"
                    value="<?php echo $row['proceso'] ?>">
                    <label for="proceso" class="form__label">Proceso</label>
                </div>
                <br>
                <br>
                <button class="Botones1"><i class='bx bx-refresh'></i> Actualizar Proceso<i class='bx bx-refresh'></i></button>
            </form>
        <?php
        }
    }

?>