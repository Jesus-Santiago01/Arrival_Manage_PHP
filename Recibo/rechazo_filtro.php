<?php
 $filtro=$_GET['filtro'];
 $id=$_GET['id'];

require("conexion.php");
session_start();
      //VALIDA LA SESSION
      $id_obtenido=$_SESSION['nuevasession_recibo'];
      if($id_obtenido==""){
        echo '<script lenguage="javascript">alert("Debes de iniciar sesiòn");
					function redirecional(){
						document.location.href="index.html";
					}
					redirecional();
					</script>';
      }


if($filtro=="bultos"){
    ?>
    <form action="rechazo_recibo.php" method="POST">
    <h3><input name="tipo" value="Rechazo por Bultos" style="text-decoration: none; color:#000000; border:none; text-align:center; width:100%;"></h3>
    <br>
    <span class="">ID: </span> 
      <input class="" type="text" name="id" id="id" value="
     <?php
      echo $id;
      ?> "  readonly=»readonly»></h4>
    <br><br>


		<div class="impu">
			IS:
			<input class="inputa" type="number" name="is"   placeholder="Ingresa IS..." minlength="5" maxlength="7" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off" required><br><br>
		</div>
        <div class="impu">
		Bultos rechazados:
			<input class="inputa" type="number" name="unidades"   placeholder="Ingresa la cantidad de unidades en numero..." autocomplete="off"><br><br>
		</div>
        <div class="impu">
    Motivo de rechazo:
    <select name="motivo" class="" id="motivo" style="width: 300px;">
                  <option value="Caducidad">Caducidad</option>
                  <option value="Producto no apto">Producto no apto</option>
                  <option value="Volumen no apto">Volumen no apto</option>
                  <option value="Estado del IS">Estado del IS</option>
                  <option value="Excedentes">Excedentes</option>
                  <option value="Plaga">Plaga</option>
                  <option value="Certificado de sanitización">Certificado de sanitización</option>
                  <option value="Falta de agendamiento por CBT">Falta de agendamiento por CBT</option>

              </select>
    </div><br><br>
    <div class="impu">
		Comentarios:
		<input class="inputa" type="text" name="comentario"   placeholder="Añade un comentario (opcional)..." autocomplete="off" required><br><br>
		</div>

<center>
			<button class="Botones">
	Registrar
		</button>

        </form>
<?php
}
else if($filtro=="meli"){
    ?>
<form action="rechazo_recibo.php" method="POST">
<h3><input name="tipo" value="Rechazo por Meli" style="text-decoration: none; color:#000000; border:none; text-align:center; width:100%;"></h3>
<br>
    <span class="">ID: </span> 
      <input class="" type="text" name="id" id="id" value="
     <?php
      echo $id;
      ?> "  readonly=»readonly»></h4>
    <br><br>


		<div class="impu">
			IS:
			<input class="inputa" type="number" name="is"   placeholder="Ingresa IS..." minlength="5" maxlength="7" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off" required><br><br>
		</div>

		<div class="impu">
			MELI:
			<input class="inputa" type="text" name="meli"   placeholder="Ingresa MELI..." autocomplete="off" ><br><br>
		</div>

		<div class="impu">
		Unidades Rechazadas:
			<input class="inputa" type="number" name="unidades"   placeholder="Ingresa la cantidad de unidades en numero..." autocomplete="off"><br><br>
		</div>
		<div class="impu">
    Motivo de rechazo:
    <select name="motivo" class="" id="motivo" style="width: 300px;">
                  <option value="Caducidad">Caducidad</option>
                  <option value="Producto no apto">Producto no apto</option>
                  <option value="Volumen no apto">Volumen no apto</option>
                  <option value="Estado del IS">Estado del IS</option>
                  <option value="Excedentes">Excedentes</option>
                  <option value="Plaga">Plaga</option>
                  <option value="Certificado de sanitización">Certificado de sanitización</option>
                  <option value="Falta de agendamiento por CBT">Falta de agendamiento por CBT</option>

              </select>
    </div><br><br>
    <div class="impu">
		Comentarios:
		<input class="inputa" type="text" name="comentario"   placeholder="Añade un comentario (opcional)..." autocomplete="off" required><br><br>
		</div>

<center>
			<button class="Botones">
	Registrar
		</button>
</form>

<?php
}
else if($filtro=="completo"){
    ?>
    <form action="rechazo_recibo.php" method="POST">
    <h3><input name="tipo" value="Rechazo por Inbound Shipment" style="text-decoration: none; color:#000000; border:none; text-align:center; width:100%;"></h3>
    <br>
    <span class="">ID: </span> 
      <input class="" type="text" name="id" id="id" value="
     <?php
      echo $id;
      ?> "  readonly=»readonly»></h4>
    <br><br>


		<div class="impu">
			IS:
			<input class="inputa" type="number" name="is"   placeholder="Ingresa IS..." minlength="5" maxlength="7" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off" required><br><br>
		</div>
        
        <div class="impu">
    Motivo de rechazo:
    <select name="motivo" class="" id="motivo" style="width: 300px;">
                  <option value="Caducidad">Caducidad</option>
                  <option value="Producto no apto">Producto no apto</option>
                  <option value="Volumen no apto">Volumen no apto</option>
                  <option value="Estado del IS">Estado del IS</option>
                  <option value="Excedentes">Excedentes</option>
                  <option value="Plaga">Plaga</option>
                  <option value="Certificado de sanitización">Certificado de sanitización</option>
                  <option value="Falta de agendamiento por CBT">Falta de agendamiento por CBT</option>

              </select>
    </div><br><br>
    <div class="impu">
		Comentarios:
		<input class="inputa" type="text" name="comentario"   placeholder="Añade un comentario (opcional)..." autocomplete="off" required><br><br>
		</div>

<center>
			<button class="Botones">
	Registrar
		</button>

</form>
<?php
}
?>