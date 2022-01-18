<link rel="stylesheet" type="text/css" href="css/formulario.css">
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
    $validacion = "SELECT * FROM recibo WHERE id=$busqueda";
    $validacion1 = mysqli_query($link,$validacion);
    if ($validacion1->num_rows > 0) {
        ?><form action="añadir_registro.php" method="POST" style="background: transparent;
            background-size: cover;
            -moz-background-size: cover;
            -webkit-background-size: cover;
            -o-background-size: cover;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(7px);">
    
        
        <div class="form">
            <input type="text" name="id_descarga" autocomplete="off" id="id_descarga" class="form__input"
            placeholder=" " value="<?php echo $busqueda ?>" readonly=»readonly»>
            <label for="id_descarga" class="form__label">ID Descarga</label>
        </div>
        <br>
        <div class="form">
            <input type="text" name="ibshipment" autocomplete="off" id="ibshipment" class="form__input"
            placeholder=" " required>
            <label for="ibshipment" class="form__label">Inbound Shipment</label>
        </div>
        <br>
        <div class="form">
            <input type="number" name="bultos" autocomplete="off" id="bultos" class="form__input"
            placeholder=" " required>
            <label for="bultos" class="form__label">Bultos</label>
        </div>
        <br>
        <div class="form">
            <input type="text" name="guia" autocomplete="off" id="guia" class="form__input"
            placeholder=" ">
            <label for="guia" class="form__label">Guia</label>
        </div>
        <br>
        <div class="form">
            <input type="text" name="pallet" autocomplete="off" id="pallet" class="form__input"
            placeholder=" " required>
            <label for="pallet" class="form__label">Pallet</label>
        </div>
        <br>
        <button class="Botones">Añadir Registro</button>
    </form>
    <?php
    }else {
    echo 'VALOR NO ENCONTRADO';
}


?>
