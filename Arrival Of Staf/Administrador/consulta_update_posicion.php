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
    $valor=$_GET['busqueda_update_posicion'];
    $validacion = "SELECT * FROM posiciones WHERE posicion = '$valor'";
    $result_validacion = mysqli_query($link,$validacion);

    if($result_validacion->num_rows > 0){
        foreach ($link->query("SELECT * FROM posiciones WHERE posicion = '$valor'") as $row){ ?>
            <form action="update_posicion.php" method="POST">
                <div class="form">
                    <input type="text" name="id_posicion" autocomplete="off" id="id_posicion" class="form__input"
                    value="<?php echo $row['id'] ?>" readonly=»readonly»>
                    <label for="id_posicion" class="form__label">ID</label>
                </div>
                <br>
                <br>
                <div class="form">
                    <input type="text" name="posicion" autocomplete="off" id="posicion" class="form__input"
                    value="<?php echo $row['posicion'] ?>">
                    <label for="posicion" class="form__label">Area</label>
                </div>
                <br>
                <button class="Botones1"><i class='bx bx-refresh'></i> Actualizar Posicion<i class='bx bx-refresh'></i></button>
            </form>
        <?php
        }
    }

?>