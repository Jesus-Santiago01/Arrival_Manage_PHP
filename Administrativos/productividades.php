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
                        
                        <div class="">
                        

                        
                        <div id="graficaprueba">
                        <center>
                                </div>
                        <script>
                        var data = [{
                        type: "sunburst",
                        ids: [
                            "Miguel Cervantes","Veronica Parra","Josue Rocha","Luis Benitez","Raul Garcia","Cesar Javier","VP1","VP2"
                            ,"VP3","VP4","VP5","VP6","VP7","VP8","VP9","VP10","VP11","VP12","VP13","VP14","VP15","VP16","JR1","JR2","JR3"
                            ,"JR4","JR5","JR6","JR7","JR8","JR9","JR10","JR11","LB1","LB2","LB3","LB4","LB5","LB6","LB7","LB8","LB9"
                            ,"LB10","LB11","LB12","LB13","LB14","LB15","RG1","RG2","RG3","RG4","RG5","RG6","RG7","RG8","RG9","RG10"
                            ,"RG11","RG12","RG13","CJ1","CJ2","CJ3","CJ4","CJ5","CJ6","CJ7","CJ8","CJ9","CJ10","CJ11","CJ12","CJ13"
                            ,"CJ14","CJ15"
                        ],  
                        labels: [
                            "Miguel <br> Cervantes","Veronica <br> Parra", "Josue <br> Rocha",
                            "Luis <br> Benitez","Raul <br> Garcia","Cesar <br> Javier","Eduardo Arista","Judith Alcantara"
                            ,"Luis Bravo","Dulce Casas","Rosario Cruz","Monica Del Castillo"
                            ,"Julio Ibarra","Noemi Lopez","Dilan Hernandez","Jahir Medina","Paola Vazquez",
                            "Araceli Ortega","Heliberto Quintero","Erick Santizo","Freddy Solano","Omenayeli Uribe"
                            ,"Karina Rojas","Luis Paez","Marco De La Cruz","Sonia Santos","Ana Garcia"
                            ,"Atzin Espinosa","Claudia Bello","Dulce Sanchez","Edgar Corona"
                            ,"Jonathan Solis","Maria Santana","Alejandro Copado","Bitia Perez","Carlos Bobadilla","Claudia Lechuga"
                            ,"Fabiola Reyes","Jenedith Arevalo","Jessua Lopez","Luis Rivas","Reynaldo Garcia","Laura Chavez"
                            ,"Lucero Lopez","Areli Gutiereez","Cesar Silva","Jazmin Ocaña","Rafael Baez","Julio Rojas",
                            "Aaron Luna","Alan Gonzalez","Daniel Loyola","Erick Gaona","Francisco Camarena","Héctor Aguilar",
                            "Gerardo Bautista","Jatzibe Badillo","Osvaldo Barrera","Samanta Melgarejo","Jordy Sanchez","Guadalupe Ortega"
                            ,"Luis Ortiz","Luis Tellez","Adriana Vega","Brandon Rivero","Carlos Bobadilla","Daniela Gonzalez"
                            ,"David Gaspar","Diana Ruiz","Dulce Gonzalez","Jose Cedillo","Karla Valdes","Lizet Reyes"
                            ,"Maria Garcia","Nayeli Martinez","Paola Lopez"
                        ],
                        parents: [
                            "", "Miguel Cervantes", "Miguel Cervantes","Miguel Cervantes","Miguel Cervantes","Miguel Cervantes"
                            ,"Veronica Parra","Veronica Parra","Veronica Parra","Veronica Parra","Veronica Parra","Veronica Parra"
                            ,"Veronica Parra","Veronica Parra","Veronica Parra","Veronica Parra","Veronica Parra","Veronica Parra"
                            ,"Veronica Parra","Veronica Parra","Veronica Parra","Veronica Parra","Josue Rocha","Josue Rocha"
                            ,"Josue Rocha","Josue Rocha","Josue Rocha","Josue Rocha","Josue Rocha","Josue Rocha","Josue Rocha"
                            ,"Josue Rocha","Josue Rocha","Luis Benitez","Luis Benitez","Luis Benitez","Luis Benitez","Luis Benitez"
                            ,"Luis Benitez","Luis Benitez","Luis Benitez","Luis Benitez","Luis Benitez","Luis Benitez","Luis Benitez"
                            ,"Luis Benitez","Luis Benitez","Luis Benitez","Raul Garcia","Raul Garcia","Raul Garcia","Raul Garcia"
                            ,"Raul Garcia","Raul Garcia","Raul Garcia","Raul Garcia","Raul Garcia","Raul Garcia","Raul Garcia"
                            ,"Raul Garcia","Raul Garcia","Cesar Javier","Cesar Javier","Cesar Javier","Cesar Javier","Cesar Javier"
                            ,"Cesar Javier","Cesar Javier","Cesar Javier","Cesar Javier","Cesar Javier","Cesar Javier","Cesar Javier"
                            ,"Cesar Javier","Cesar Javier","Cesar Javier"
                        ],
                        outsidetextfont: {size: 20, color: "#377eb8"},
                        // leaf: {opacity: 0.4},
                        marker: {line: {width: 2}},
                        }];

                        var layout = {
                        margin: {l: 0, r: 0, b: 0, t:0},
                        sunburstcolorway:["#636efa","#ef553b","#00cc96"],
                        };


                        Plotly.newPlot('graficaprueba', data, layout);
                        </script>





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
