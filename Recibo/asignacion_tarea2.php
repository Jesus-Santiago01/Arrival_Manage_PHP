<html>
<head>
    <title>Receiving</title>
    	<meta charset="UTF-8">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">  </script>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="css/form.css">
      <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.0.943/build/pdf.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.228/pdf.min.js"></script>
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
	      width:100%;
	      padding:20px;
      	border-radius:10px;
      	margin:auto;
      	background-color:#FFFFFF;
      }

</style>
<body class="fondo">
<?php
require("conexion.php");
 $tarea=$_GET['id'];
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
    //VALIDA ID CON USUARIO RECIBIENDO EN TAREA
    $id_recibiendo="SELECT id,id_recibidor,estatus,recibidor FROM seller 
    WHERE id_recibidor='$id_obtenido' AND recibidor='$nombre_responsable' AND estatus='descargando'";
    $resu_recibiendo=mysqli_query($link,$id_recibiendo);

    $tarea_existente="SELECT id,cortina,documento,estatus FROM seller 
    WHERE id='$tarea' AND cortina>0 AND documento!='' AND estatus='aceptado'";
    $resu_tarea=mysqli_query($link,$tarea_existente);

    $tarea_asignada="SELECT id,recibidor,id_recibidor,estatus FROM seller 
    WHERE id='$tarea' AND recibidor='$nombre_responsable' AND id_recibidor='$id_obtenido' AND estatus='asignado'";
    $resu_tarea_asignada=mysqli_query($link,$tarea_asignada);


    if ($resu_recibiendo->num_rows >0){
      ?>
      <script>
      alert("Tienes una tarea pendiente recibo");
      window.location.href ='formulario_descarga.php?id=<?php echo $id_recibiendo1; ?>';
  
      </script>
      <?php
    }else if($resu_tarea->num_rows >0){
      
    
      $asignacion_query="UPDATE seller SET estatus='asignado', id_recibidor='$id_obtenido', 
      recibidor='$nombre_responsable',inicio_hora=NOW() WHERE id='$tarea'";
      //EJECUTA QUERY1
      $result_query2=mysqli_query($link,$asignacion_query);
    }else if($resu_tarea->num_rows <=0){

      ?>
		<script>
		alert("Tarea inexistente toma otra");
		window.location.href ='recibo.php';

		</script>
		<?php
    }

?>
<div class="contenedor">
<div class="registrar">
<div class="comentario">
<center><h2>Documentación</h2>
<br>
<?php
foreach ($link->query("SELECT * FROM seller
	WHERE id='$tarea'") as $row){ // aca puedes hacer la consulta e iterarla con each. ?>
	<center><p> ID: <?php echo $row['id']; ?><br><br>
  <center><p> Fecha y Hora:  <?php echo $row['fecha'] ?> <?php echo "    "; ?> <?php echo $row['hora'] ?><br><br>
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
        _PDF_DOC = await pdfjsLib.getDocument({ url: pdf_url });
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
$tarea1=$row['id'];
?>
  <br>
  <button class="Botones" onclick="location.href=<?php echo "'rechazo_tarea.php?id=$tarea1'";
      	?>">
      Rechazar
    </button>
    <button class="Botones" onclick="location.href=<?php echo "'formulario_descarga.php?id=$tarea1'";
      	?>">
       Siguiente
    </button>
</div>
</div>
</div>

<body>
</html>



