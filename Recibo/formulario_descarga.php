<html>

  <head>
    <title>Recibo</title>
    	<meta charset="UTF-8">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">  </script>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="css/form.css">
      <link rel="stylesheet" type="text/css" href="css/form.css">
      <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.0.943/build/pdf.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.228/pdf.min.js"></script>
      <link href="css/bootstrap.css" rel="stylesheet" />
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <link href="css/bootstrap-select.css" rel="stylesheet" />
      <link href="css/app_style.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <style>
   .pa{
       letter-spacing: 4px;
       font-size: 20px;
       text-decoration: none;
       overflow: hidden;
       transition: 0.2s;
     }
     form{
	      width:90%;
	      padding:20px;
      	border-radius:10px;
      	margin:auto;
      	background-color:#FFFFFF;
      }
      .fondo{
        background:url(img/lok6.jpg);
        background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
        -o-background-size: cover;
      }
		  .sign-container {
        width: 90%;
        margin: auto;
      }
      .sign-preview {
        width: 150px;
        height: 50px;
        border: solid 1px #CFCFCF;
        margin: 10px 5px;
      }
      .tag-ingo {
        font-family: cursive;
        font-size: 12px;
        text-align: left;
        font-style: oblique;
      }
      .center-text {
        text-align: center;
      }

  </style>
  <body class="fondo">
    <?php
    //PIDE LA CONEXION CON LA BD
      require("conexion.php");
      $id=$_GET['id'];
      //session_start — Iniciar una nueva sesión o reanudar la existente
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
      //BUSCA EL NOMBRE Y APELLIDOS EL USUARIO
      //QUERY1
      $validacion_nombre="SELECT nombre,apaterno,amaterno FROM registro_recibo
      WHERE id_responsable=".$id_obtenido;
      //EJECUTA QUERY1
      $result_query1=mysqli_query($link,$validacion_nombre);
      //CONVIERTE LOS DATOS OBTENIDOS DE LA QUERY EN VARIABLES A TRAVEZ DE LA MATRIZ
      while($matriz1=mysqli_fetch_array($result_query1)){
      //ASIGNACION DE VARIABLE A LOS RESULTADOS DE MATRIZ
      		$nombre_obtenido=$matriz1[0];
      		$apaterno_obtenido=$matriz1[1];
          $amaterno_obtenido=$matriz1[2];
      }
      //UNE EL RESULTADO DE LA MATRIZ EN UNA VARIABLE
      //UNE EL NOMBRE DEL USUARIO
      $nombre_responsable=$nombre_obtenido." ".$apaterno_obtenido." ".$amaterno_obtenido;
      
      //BUSCA EL NUMERO MAXIMO DE ID DEL USUARIO SEGUN SU id_responsable
      //QUERY2
      //CAMBIO DE STATUS A DESCARGANDO
      $asignacion_query="UPDATE seller SET estatus='descargando', id_recibidor='$id_obtenido', 
      recibidor='$nombre_responsable' WHERE id='$id'";
      //EJECUTA QUERY1
      $result_query2=mysqli_query($link,$asignacion_query);
     ?>
    <div class="contenedor">
    <div class="registrar">
    <div class="comentario">

    <script>
      function abrir(){
      document.getElementById("ventana").style.display="block";
      }
      function cerrar(){
      document.getElementById("ventana").style.display="none";
      }
      function abrir2(){
      document.getElementById("ventana2").style.display="block";
      }
      function cerrar2(){
      document.getElementById("ventana2").style.display="none";
      }
      function abrir3(){
      document.getElementById("ventana3").style.display="block";
      }
      function cerrar3(){
      document.getElementById("ventana3").style.display="none";
      }
      function abrir4(){
      document.getElementById("ventana4").style.display="block";
      }
      function cerrar4(){
      document.getElementById("ventana4").style.display="none";
      }
      function abrir5(){
      document.getElementById("ventana5").style.display="block";
      }
      function cerrar5(){
      document.getElementById("ventana5").style.display="none";
      }
      function abrir6(){
      document.getElementById("ventana6").style.display="block";
      }
      function cerrar6(){
      document.getElementById("ventana6").style.display="none";
      }
      function abrir7(){
      document.getElementById("ventana7").style.display="block";
      }
      function cerrar7(){
      document.getElementById("ventana7").style.display="none";
      }
    </script>

<div class="ventana7" id="ventana7">
  <div id="cerrar7">
    <button class="Botones" onclick="location.href='javascript:cerrar7()'" >
    X</button>
  </div>
    <center>
    <h3>Firma de conformidad</h3>
    <div class="panel-body center-text">

		<div id="signArea" >
				<div class="sig sigWrapper" style="height:auto;">
					<div class="typed"></div>
						<canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
					</div>
				</div>
      <div>
        <?php 

        //Conformidad de entrega de bultos
         $sumbultos="SELECT SUM(bultos) FROM recibo WHERE id='$id'";
         $sumbultos1= mysqli_query($link,$sumbultos);
         while($array1=mysqli_fetch_array($sumbultos1)){
             $sumabultos=$array1[0];
             
         }
         if($sumabultos==""){
          $sumabultos=0;
         }
         //Conformidad de rechazos

         $consulta_rechazo="SELECT tipo,ibshipment,meli,unidades,motivo,comentarios FROM rechazos WHERE id='$id'";
         $consulta_rechazo1= mysqli_query($link,$consulta_rechazo);
         $numero_rechazos=$consulta_rechazo1->num_rows;
         
         ?>
        <h1>¡IMPORTANTE!</h1>
      <h2>Firmo de conformidad al:
      <br>
      <br>
      <mark>Entregar <?php echo $sumabultos?> bultos</mark></h2>
      <br>
      
      <?php
      if($numero_rechazos>0){
        ?><h2>Y recibir los siguientes rechazos:</h2>
      <br></h2>
      <table class="table-rwd">
          <tr>
              <th>TIPO</th>
              <th>ENVIO</th>
              <th>MELI</th>
              <th>UNIDADES</th>
              <th>MOTIVO</th>
              <th>COMENTARIOS</th>
          </tr>
          <?php
   
   
      while ($fila = mysqli_fetch_assoc($consulta_rechazo1)) {
          ?>
          <tr>
              <td><?php echo$fila['tipo']?> </td>
              <td><?php echo $fila['ibshipment'] ?></td>
              <td> <?php echo$fila['meli'] ?></td>
              <td> <?php echo$fila['unidades'] ?></td>
              <td> <?php echo$fila['motivo']?> </td>
              <td> <?php echo$fila['comentarios'] ?></td>
  
          </tr>
          <?php
      }
  
      ?>
  
      </table>
      <?php
         }
        ?>




      </div>
			<button id="btnSaveSign" class="Botones">Firmar</button>
		
		</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    
    <link href="./css/jquery.signaturepad.css" rel="stylesheet">
    <script src="./js/numeric-1.2.6.min.js"></script> 
    <script src="./js/bezier.js"></script>
    <script src="./js/jquery.signaturepad.js"></script> 
    
    <script type='text/javascript' src="./js/html2canvas.js"></script>
    <script src="./js/json2.min.js"></script>
    
    <script>

    $(document).ready(function(e){

      $(document).ready(function() {
        $('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
      });
      
      $("#btnSaveSign").click(function(e){
        html2canvas([document.getElementById('sign-pad')], {
          onrendered: function (canvas) {
            var canvas_img_data = canvas.toDataURL('image/png');
            var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
            var id_firma= <?php echo $id;?>;
            //ajax call to save image inside folder
            $.ajax({
              url: 'firma_download.php',
              data: { img_data:img_data , id_firma:id_firma },
              type: 'post',
              dataType: 'json',
              success: function (response) {
                window.location.reload();
              }
            });
            alert("Firma registrada");
            window.location.reload();
          }
        });
      });

    });
    </script>
    </center>
</div>

<div class="ventana6" id="ventana6">
    <div id="cerrar6">
      <button class="Botones" onclick="location.href='javascript:cerrar6()'" >
      X</button>
    </div>
      <form action="encuesta.php" method="POST">
      <h3>Encuesta NPS</h3>
    <br><br>
    <span class="">ID: </span> 
      <input class="" type="text" name="id" id="id" value="
     <?php
      echo $id;
      ?> "  readonly=»readonly»></h4>
    <br><br>
      <div class="impu">
			Tipo de envió:
        <select name="r1" class="" id="r1" style="width: 150px;">
                  <option value="vendedor">Por Vendedor</option>
                  <option value="paquetera">Por Paquetera</option>
                  <option value="flete">Flete Privado</option>
        </select><br><br>
      ¿Cómo calificarías tu experiencia FULL?

      <select name="r2" class="" id="r2" >
      <option value="10">10</option>    
                  <option value="9">9</option>
                  <option value="8">8</option>
                  <option value="7">7</option>
                  <option value="6">6</option>
                  <option value="5">5</option>
                  <option value="4">4</option>
                  <option value="3">3</option>
                  <option value="2">2</option>
                  <option value="1">1</option>
      </select><br><br>

      ¿Cómo calificarías la atención que se te brindó en recepción?

      <select name="r3" class="" id="r3" >
      <option value="10">10</option>
                  <option value="9">9</option>
                  <option value="8">8</option>
                  <option value="7">7</option>
                  <option value="6">6</option>
                  <option value="5">5</option>
                  <option value="4">4</option>
                  <option value="3">3</option>
                  <option value="2">2</option>
                  <option value="1">1</option>
      </select><br><br>

      ¿Cómo calificarías el trabajo del representante de envios que te atendió?

      <select name="r4" class="" id="r4" >
                  <option value="10">10</option>
                  <option value="9">9</option>
                  <option value="8">8</option>
                  <option value="7">7</option>
                  <option value="6">6</option>
                  <option value="5">5</option>
                  <option value="4">4</option>
                  <option value="3">3</option>
                  <option value="2">2</option>
                  <option value="1">1</option>
      </select><br><br>

      ¿Tuviste algún problema al dejar tu producto en el site?

      <select name="r5" class="" id="r5" >
                  <option value="no">NO</option>
                  <option value="si">SI</option>
                  
      </select><br><br>
      Escribe aquí el problema que tuviste (Opcional):
      <br><input class="inputa" type="text" name="r6"   placeholder="Opcional..." autocomplete="off" ><br><br>


      ¿Porfavor dejanos algún comentario sobre alguna otra oportunidad de mejora que no te hayamos preguntado?
			<br><input class="inputa" type="text" name="r7"   placeholder="Respuesta..." autocomplete="off"><br><br>

      ¿Porfavor destaca algún aspecto que vale la pena reconocer sobre la calidad del trabajo brindado?
			<br><input class="inputa" type="text" name="r8"   placeholder="Respuesta..." autocomplete="off" required><br><br>
      <button class="Botones" >
      Enviar</button>
		</div>
      </form>
    </div>



    <div class="ventana5" id="ventana5">
    <div id="cerrar5">
      <button class="Botones" onclick="location.href='javascript:cerrar5()'" >
      X</button>
      </div>
      <form action="terminar_tarea.php" method="POST">
        <h3>Terminar tarea</h3>
        <h4>ID:
        <input class="" type="text" name="id" id="id" value="
        <?php
        echo $id;
        ?> "  readonly=»readonly»></h4>
        <br><br>
        <label for="tipo"  class="tipo">Tipo de recibo:</label>

        <select name="tipo" class="tipo" id="tipo">
        <option value="full">FULL</option>
        <option value="cpg">CPG</option>
        <option value="full | cpg">FULL & CPG</option>
        <option value="cbt">CBT</option>

        </select><br><br>

        <button class="Botones">
        Terminar tarea
        </button>
      </form>
    </div>


    <div class="ventana4" id="ventana4">
    <div id="cerrar4">
      <button class="Botones" onclick="location.href='javascript:cerrar4()'" >
      X</button>
      </div>
      <h4>Pallet´s & Bultos</h4><br>
      <div class="table-container">
      <table class="table-rwd">
        <?php
       
        echo 'Total de bultos:'.$sumabultos;
        ?>
        <thead>
          <tr>
            <th>IS</th>
            <th>PALLET</th>
            <th>Bultos</th>
            <th></th>
          </tr>
        </thead>
        <?php foreach ($link->query("SELECT id_recibo,id,pallet,bultos,ibshipment FROM recibo WHERE id='$id'") as $row){ // aca puedes hacer la consulta e iterarla con each.      ?>
    
          <tr>
            <td> <?php echo $row['ibshipment'] ?></td>
            <td> <?php echo $row['pallet'] ?></td>
            <td> <?php echo $row['bultos'] ?></td>
            <td> <button class="Botones" onclick="location.href='eliminar_bulto.php?id_recibo=<?php echo $row['id_recibo']?>&id=<?php echo $row['id']?>'">Eliminar</button></td>

            
          </tr>
		<?php
			}

		?>
      </table>
      </div>
    </div>

    


    <div class="ventana3" id="ventana3">
    <div id="cerrar3">
      <button class="Botones" onclick="location.href='javascript:cerrar3()'" >
      X</button>
      </div>
      <form action="abandonar.php" method="POST">
      <h3>SOLICITA LA AUTORIZACIÓN A TU TEAM LIDER</h3><br>
      <h4>ID:
      <input class="" type="text" name="id" id="id" value="
     <?php
      echo $id;
      ?> "  readonly=»readonly»></h4>

      <br><br>
      <h4>Confirmación</h4>
      <div class="imputt">
      <input class="inputa" type="password" name="confirmacion"  id="confirmacion" placeholder="Ingresa la clave de confirmación..." required>
      <span class="imputf"></span>
      </div>

      <br><br>
      <button class="Botones">
      Continuar
      </button>
    </form>
    </div>

    <div class="ventana2" id="ventana2">
    <h4>Rechazos</h4>
    <br>
    <div id="cerrar2">
      <button class="Botones" onclick="location.href='javascript:cerrar2()'" >
      X</button>
    </div>
    <div class="query_personal" id="query_personal">
      <script>
          function enviar_filtro(){

            var filtro= document.getElementById('filtro').value;
            var id= document.getElementById('id').value;

            var dataen= 'filtro='+filtro+'&id='+id;

            $.ajax({

            type:'get',
            url:'rechazo_filtro.php',
            data:dataen,
            success:function(resp){
            $("#respa_filtro").html(resp);
            }

          });
          return false;
          }
			  </script>
        <div class="select">
            <select name="filtro" class="filtro" id="filtro" onchange="return enviar_filtro();">
            <option value="" selected="selected" disabled="disabled">Rechazo por:</option>  
            <option value="bultos">Bultos</option>
              <option value="meli" >Meli</option>
              <option value="completo" >Completo</option>
            </select>
          </div>
          <br>
          <p id="respa_filtro">
      </div>
    </div>

    <div class="ventana" id="ventana">
      <h3>Documentación</h3><br>
      <div id="cerrar">
      <button class="Botones" onclick="location.href='javascript:cerrar()'" >
      X</button>
    </div>
      <?php foreach ($link->query("SELECT * FROM seller
      WHERE id='$id'") as $row){ // aca puedes hacer la consulta e iterarla con each. ?>
      <center><p> ID: <?php echo $row['id']; ?><br><br>
      <center><p> Fecha y Hora:  <?php echo $row['fecha']; ?> <?php echo "    "; ?> <?php echo $row['hora'] ?><br><br>
      <center><p> Operador: <?php echo $row['operador']; ?><br><br>
      <center><p> Seller:  <?php echo $row['seller']; ?><br><br>
      <center><p> Cortina:  <?php echo $row['cortina']; ?><br><br>
      <center><p> Carga:  <?php echo $row['carga']; ?><br><br>
      <center><p> Unidad:  <?php echo $row['unidad']; ?><br><br>
      <center><p> Estatus:  <?php echo $row['estatus']; ?><br><br>
      <center><p> Documento: <center><br>
      <?php 
      $doc=$row['documento'];
      ?>
     
      
     <button id="show-pdf-button">Show PDF</button> 

<div id="pdf-main-container">
	<div id="pdf-loader">Loading document ...</div>
	<div id="pdf-contents">
		<div id="pdf-meta">
			<div id="pdf-buttons">
				<button id="pdf-prev">Previous</button>
				<button id="pdf-next">Next</button>
			</div>
			<div id="page-count-container">Page <div id="pdf-current-page"></div> of <div id="pdf-total-pages"></div></div>
		</div>
		<canvas id="pdf-canvas" width="400"></canvas>
		<div id="page-loader">Loading page ...</div>
	</div>
</div>

<script>

var _PDF_DOC,
    _CURRENT_PAGE,
    _TOTAL_PAGES,
    _PAGE_RENDERING_IN_PROGRESS = 0,
    _CANVAS = document.querySelector('#pdf-canvas');

// initialize and load the PDF
async function showPDF(pdf_url) {
    document.querySelector("#pdf-loader").style.display = 'block';

    // get handle of pdf document
    try {
        _PDF_DOC = await pdfjsLib.getDocument({ url: '../Recepccion/documento/<?php echo $doc;?>' });
    }
    catch(error) {
        alert(error.message);
    }

    // total pages in pdf
    _TOTAL_PAGES = _PDF_DOC.numPages;
    
    // Hide the pdf loader and show pdf container
    document.querySelector("#pdf-loader").style.display = 'none';
    document.querySelector("#pdf-contents").style.display = 'block';
    document.querySelector("#pdf-total-pages").innerHTML = _TOTAL_PAGES;

    // show the first page
    showPage(1);
}

// load and render specific page of the PDF
async function showPage(page_no) {
    _PAGE_RENDERING_IN_PROGRESS = 1;
    _CURRENT_PAGE = page_no;

    // disable Previous & Next buttons while page is being loaded
    document.querySelector("#pdf-next").disabled = true;
    document.querySelector("#pdf-prev").disabled = true;

    // while page is being rendered hide the canvas and show a loading message
    document.querySelector("#pdf-canvas").style.display = 'none';
    document.querySelector("#page-loader").style.display = 'block';

    // update current page
    document.querySelector("#pdf-current-page").innerHTML = page_no;
    
    // get handle of page
    try {
        var page = await _PDF_DOC.getPage(page_no);
    }
    catch(error) {
        alert(error.message);
    }

    // original width of the pdf page at scale 1
    var pdf_original_width = page.getViewport(1).width;
    
    // as the canvas is of a fixed width we need to adjust the scale of the viewport where page is rendered
    var scale_required = _CANVAS.width / pdf_original_width;

    // get viewport to render the page at required scale
    var viewport = page.getViewport(scale_required);

    // set canvas height same as viewport height
    _CANVAS.height = viewport.height;

    // setting page loader height for smooth experience
    document.querySelector("#page-loader").style.height =  _CANVAS.height + 'px';
    document.querySelector("#page-loader").style.lineHeight = _CANVAS.height + 'px';

    // page is rendered on <canvas> element
    var render_context = {
        canvasContext: _CANVAS.getContext('2d'),
        viewport: viewport
    };
        
    // render the page contents in the canvas
    try {
        await page.render(render_context);
    }
    catch(error) {
        alert(error.message);
    }

    _PAGE_RENDERING_IN_PROGRESS = 0;

    // re-enable Previous & Next buttons
    document.querySelector("#pdf-next").disabled = false;
    document.querySelector("#pdf-prev").disabled = false;

    // show the canvas and hide the page loader
    document.querySelector("#pdf-canvas").style.display = 'block';
    document.querySelector("#page-loader").style.display = 'none';
}

// click on "Show PDF" buuton
document.querySelector("#show-pdf-button").addEventListener('click', function() {
    this.style.display = 'none';
    showPDF('../Recepccion/documento/<?php echo $doc;?>');
});

// click on the "Previous" page button
document.querySelector("#pdf-prev").addEventListener('click', function() {
    if(_CURRENT_PAGE != 1)
        showPage(--_CURRENT_PAGE);
});

// click on the "Next" page button
document.querySelector("#pdf-next").addEventListener('click', function() {
    if(_CURRENT_PAGE != _TOTAL_PAGES)
        showPage(++_CURRENT_PAGE);
});

</script>


      <?php
      }
      $id1=$row['id'];
      ?>
    </div>
    


    <font size="6" face="AR ESSENCE";>
      <center>
      <div>
      <button class="Botones" onclick="location.href='javascript:abrir5()'">
       Terminar
      </button>
      
      <button class="Botones" onclick="location.href='javascript:abrir4()'">
       Bultos
      </button>
      <button class="Botones" onclick="location.href='javascript:abrir3()'">
       Abandonar
      </button>
      <button class="Botones" onclick="location.href='javascript:abrir2()'">
       Rechazos
      </button>
      <button class="Botones" onclick="location.href='javascript:abrir()'">
       Documentos
      </button>
      <button class="Botones" onclick="location.href='javascript:abrir6()'">
       Encuesta
      </button>
      <button class="Botones" onclick="location.href='javascript:abrir7()'">
       Firma
      </button>
    </div>
    </center>
    <center>
    </div>
    <form  action="datos_recibo.php" method="POST" enctype="multipart/form-data">
      <center>
      <span class="">ID: </span> 
      <input class="" type="text" name="id" id="id" value="
     <?php
      echo $id1;
      ?> "readonly=»readonly»  style="width:150px"> 
      </center>
<br>
<div class="imputt">
	<span class="labelinput">IS</span>
	<input class="inputa" type="number" name="is" id="is" placeholder="Escanea IS..." maxlength="7" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off" required >
	<span class="imputf"></span>
</div>
<div class="imputt">
	<span class="labelinput">Bultos</span>
	<input class="inputa" type="number" name="bultos"  id="bultos" placeholder="Ingresa la cantidad de bultos recibidos..." autocomplete="off" required>
	<span class="imputf"></span>
</div>

<div class="imputt">
		<span class="labelinput"> Guia </span>
		<input class="inputa" type="text" name="guia" id="guia" placeholder="Escanea Guia..." autocomplete="off">
		<span class="imputf"> </span>
	</div>

	<div class="imputt">
			<span class="labelinput"> Pallet </span>
			<input class="inputa" type="text" name="pallet" id="pallet" placeholder="Escanea Pallet..." autocomplete="off" required>
			<span class="imputf"> </span>
		</div>
		<br>


		<br>
		<center>
			<button class="Botones">
				Siguiente
			</button>
            <br>
      </form>
      <br>
      <button class="Botones" onclick="location.href='logout.php'">
        Pausar Recibo
      </button>
    </div>
      </div>


  </body>


</html>
