<html>

<head>
<title>Arrival Reports</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
<script src="librerias/jquery-3.3.1.min.js">  </script>
<script src="librerias/plotly-2.3.0.min.js">  </script>
<link rel="stylesheet" type="text/css" href="css/tablas.css">

</head>

<body>
<?php
require("conexion.php");

//echo $valor=$_GET['filtro'];



?>
<div class="">
<div class="registrar">
<div class="comentario">

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
            
                <div class="panel panel-heading">
                    Arrival Reports
                    <div >
                    <button class="Botones" style="position: absolute; right: 30;" onclick="location.href='logout.php'">
                        Salir
                    </button>


                     <!--<center>
                <form  method="GET">
                    <h4>Filtro por semana
                    <?php /*
                    $query="SELECT EXTRACT(week FROM fecha) AS semana FROM seller GROUP BY (SELECT EXTRACT(week FROM fecha)) ORDER BY fecha DESC";
                    $query1=mysqli_query($link,$query);
                    ?>
                    <select name="filtro" class="" id="filtro" style="color:#000000;">
                        <option value="0">Semanas</option>
                        <?php while($matriz1=mysqli_fetch_array($query1)){?>
                            <option value="<?php echo $semanas=$matriz1[0]; ?>"><?php echo $semanas=$matriz1[0]; ?></option>
                        <?php 
                    }*/?>
                        
                    </select>
                    
                    <button class="Botones" >
                        Filtrar
                    </button>
                    </h4>
                </form>
                    </center>-->

                    
                    </div>
                </div><center>
                <div class="panel panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                        
                            <div id="cargalineal1"></div>
                        </div>
                        <div class="col-sm-6">
                        
                            <div id="cargabarras1"></div>
                        </div>
                    </div>
                    <br>
                    
                    </div>
                </div>
            <div>
        <div>
    </div>
</div>
</div>
</div>



</body>

</html>

<script>
    $(document).ready(function(){
        $('#cargalineal1').load('lineal.php');
        $('#cargabarras1').load('barras.php');
    })
</script>
