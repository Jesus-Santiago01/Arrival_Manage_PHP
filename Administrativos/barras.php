<div id="graficabarras1">
<?php 
require("conexion.php");


?>

        <!-- GRAFICA Tipos de Unidades -->
        <?php
        $query="SELECT unidad AS unidades,COUNT(id) AS cantidad FROM seller WHERE estatus='terminado' GROUP BY unidades";
        $result=mysqli_query($link,$query);
        $valoresx=array();
        $valoresy=array();
        while($matriz1=mysqli_fetch_array($result)){
                $valoresx[]=$matriz1[1];
                $valoresy[]=$matriz1[0];
            }

        $datosx=json_encode($valoresx);
        $datosy=json_encode($valoresy);

        ?>
        <h3>Tipos de Unidades</h3>
        <button class="Botones" onclick="location.href='javascript:abrir2()'">
        Datos</button>

        <div id="graficabarras">
        </div>


        <script>
        function Cadenabarras(json){
        var parsed= JSON.parse(json);
        var arr=[];
        for(var x in parsed){
            arr.push(parsed[x]);

        }
        return arr;
        }
        </script>

        <script>
          datosx=Cadenabarras('<?php echo $datosx ?>');
            datosy=Cadenabarras('<?php echo $datosy ?>');
            
            var data = [{
          type: "pie",
          values: datosx,
          labels: datosy,
          textinfo: "label+percent",
          textposition: "outside",
          automargin: true
        }]

        var data = [{
          type: "pie",
          values: datosx,
          labels: datosy,
          textinfo: "label+percent",
          insidetextorientation: "radial"
        }]

        var layout = [{
          height: 700,
          width: 700
        }]

        Plotly.newPlot('graficabarras', data, layout)
        </script>

        <script>
            function abrir2(){
                document.getElementById("ventana2").style.display="block";
                document.getElementById("grafica_estadia1").style.display="none";
                
                
            }
            function cerrar2(){
                document.getElementById("ventana2").style.display="none";
                document.getElementById("grafica_estadia1").style.display="block";
            }
        </script>

        <div class="ventana2" id="ventana2">
          
          Datos
          <div id="cerrar2">
            <button class="Botones" onclick="location.href='javascript:cerrar2()'" >
            X</button>
            
        </div>
        <div class="table-container">
            <table class="table-rwd">

                
                <thead>
          <tr>
          <th>FECHAS</th> 
            <th>SEMANA</th>
            <th>UNIDAD</th>
            <th>CANTIDAD</th>
            
          </tr>
            </thead>
            <?php foreach ($link->query("SELECT fecha AS fechas, unidad AS unidades,COUNT(id) AS cantidad, EXTRACT(week FROM fecha) AS semana FROM seller WHERE estatus='terminado' GROUP BY fechas,unidades") as $row){ // aca puedes hacer la consulta e iterarla con each.      ?>
            
            <tr>
              
                <td> <?php echo $row['fechas'] ?></td>
                <td> <?php echo $row['semana'] ?></td>
                <td> <?php echo $row['unidades'] ?></td>
                    <td> <?php echo $row['cantidad'] ?></td>
                
            </tr>
            <?php
              }
            ?>
            </table></center>

          </div>
        </div>

<!-- GRAFICA UNIDADES INGRESADAS -->

        
        <?php
        $query1="SELECT fecha AS fechas,hora AS horas,cortina_hora AS hcortina,inicio_hora AS inicio,
        termino_hora AS termino, if(cortina_hora='00:00:00',hora,cortina_hora) AS dif_patio, 
        AVG(TIMESTAMPDIFF(MINUTE,hora,if(cortina_hora='00:00:00',hora,cortina_hora))) AS t_patio, 
        AVG(TIMESTAMPDIFF(MINUTE,if(cortina_hora='00:00:00',hora,cortina_hora),inicio_hora)) AS t_cortina, 
        AVG(TIMESTAMPDIFF(MINUTE,inicio_hora,termino_hora)) AS t_descarga,

        AVG(TIMESTAMPDIFF(MINUTE,hora,if(cortina_hora='00:00:00',hora,cortina_hora)) + 
        TIMESTAMPDIFF(MINUTE,if(cortina_hora='00:00:00',hora,cortina_hora),inicio_hora) + 
        TIMESTAMPDIFF(MINUTE,inicio_hora,termino_hora)) AS estadia
        
        
        FROM seller WHERE estatus='terminado' GROUP by fecha ORDER BY fecha ASC";

       /* $query1="SELECT fecha, SEC_TO_TIME(AVG(TIME_TO_SEC(cortina_hora))) AS promedio_cortina, 
        SEC_TO_TIME(AVG(TIME_TO_SEC(hora))) AS promedio_hora, 
        SEC_TO_TIME(AVG(TIME_TO_SEC(cortina_hora))-AVG(TIME_TO_SEC(hora)) DIV 60) AS promedio_patio
        FROM seller WHERE estatus='terminado' GROUP by fecha ORDER BY fecha ASC";*/
        $result1=mysqli_query($link,$query1);
        $valoresxx=array();
        $valoresyy=array();
        $valoresyy1=array();
        $valoresyy2=array();
        $valoresyy3=array();
        while($matriz2=mysqli_fetch_array($result1)){
                $valoresxx[]=$matriz2['fechas'];
                $valoresyy[]=$matriz2['t_patio'];
                $valoresyy1[]=$matriz2['t_cortina'];
                $valoresyy2[]=$matriz2['t_descarga'];
                $valoresyy3[]=$matriz2['estadia'];
            }

        $datosxx=json_encode($valoresxx);
        $datosyy=json_encode($valoresyy);
        $datosyy1=json_encode($valoresyy1);
        $datosyy2=json_encode($valoresyy2);
        $datosyy3=json_encode($valoresyy3);

        ?>
        
        <h3>Tiempos Promedios</h3>
        <button class="Botones" onclick="location.href='javascript:abrir4()'">
        Datos</button>

        <div id="grafica_estadia1">
        </div>

        <script>
            datosxx=Cadenabarras('<?php echo $datosxx ?>');
            datosyy=Cadenabarras('<?php echo $datosyy ?>');
            datosyy1=Cadenabarras('<?php echo $datosyy1 ?>');
            datosyy2=Cadenabarras('<?php echo $datosyy2 ?>');
            datosyy3=Cadenabarras('<?php echo $datosyy3 ?>');
            var trace1 = {
              x: datosxx,
              y: datosyy,
              name: 'Promedio Patio',
              type: 'bar'
              
            };
            var trace2 = {
              x: datosxx,
              y: datosyy1,
              name: 'Promedio Cortina',
              type: 'bar'
            };
            var trace3 = {
              x: datosxx,
              y: datosyy2,
              name: 'Promedio Descarga',
              type: 'bar'
            };
            var trace4 = {
              x: datosxx,
              y: datosyy3,
              name: 'Promedio Estadia',
              type: 'bar'
            };

            var data = [trace1, trace2, trace3, trace4];

            var layout = {barmode: 'stack'};

            Plotly.newPlot('grafica_estadia1', data, layout);
        </script>
        <script>
            function abrir4(){
                document.getElementById("ventana4").style.display="block";
                document.getElementById("graficabarras").style.display="none";
                
                
            }
            function cerrar4(){
                document.getElementById("ventana4").style.display="none";
                document.getElementById("graficabarras").style.display="block";
            }
            </script>

      <div class="ventana4" id="ventana4">
          
          Datos
          <div id="cerrar4">
            <button class="Botones" onclick="location.href='javascript:cerrar4()'" >
            X</button>
            
        </div>
        <div class="table-container">
            <table class="table-rwd">

                
                <thead>
          <tr>
          <th>FECHAS</th> 
          <th>SEMANA</th> 
            <th>Patio</th>
            <th>Cortina</th>
            <th>Descarga</th>
            <th>Estadia</th>
            
          </tr>
            </thead>
            <?php foreach ($link->query("SELECT fecha AS fechas,hora AS horas,cortina_hora AS hcortina,inicio_hora AS inicio,
        termino_hora AS termino, if(cortina_hora='00:00:00',hora,cortina_hora) AS dif_patio, 
        TIME_FORMAT(SEC_TO_TIME(AVG(TIMESTAMPDIFF(SECOND,hora,if(cortina_hora='00:00:00',hora,cortina_hora)))), '%H:%i:%s') AS t_patio, 
        TIME_FORMAT(SEC_TO_TIME(AVG(TIMESTAMPDIFF(SECOND,if(cortina_hora='00:00:00',hora,cortina_hora),inicio_hora))), '%H:%i:%s') AS t_cortina, 
        TIME_FORMAT(SEC_TO_TIME(AVG(TIMESTAMPDIFF(SECOND,inicio_hora,termino_hora))), '%H:%i:%s') AS t_descarga,

        TIME_FORMAT(SEC_TO_TIME(AVG(TIMESTAMPDIFF(SECOND,hora,if(cortina_hora='00:00:00',hora,cortina_hora)) + 
        TIMESTAMPDIFF(SECOND,if(cortina_hora='00:00:00',hora,cortina_hora),inicio_hora) + 
        TIMESTAMPDIFF(SECOND,inicio_hora,termino_hora))), '%H:%i:%s') AS estadia,
        EXTRACT(week FROM fecha) AS semana
        
        
        FROM seller WHERE estatus='terminado' GROUP by fecha ORDER BY fecha DESC") as $row){ // aca puedes hacer la consulta e iterarla con each.      ?>
            
            <tr>
              
                <td> <?php echo $row['fechas'] ?></td>
                <td> <?php echo $row['semana'] ?></td>
                <td> <?php echo $row['t_patio'] ?></td>
                <td> <?php echo $row['t_cortina'] ?></td>
                <td> <?php echo $row['t_descarga'] ?></td>
                <td> <?php echo $row['estadia'] ?></td>
                
            </tr>
            <?php
              }
            ?>
            </table></center>

          </div>
        </div>



  </div>


<?php

/*
//FILTRO POR SEMANA
SELECT fecha AS fechas,hora AS horas,cortina_hora AS hcortina,inicio_hora AS inicio,
termino_hora AS termino, if(cortina_hora='00:00:00',hora,cortina_hora) AS dif_patio, 
TIME_FORMAT(SEC_TO_TIME(AVG(TIMESTAMPDIFF(SECOND,hora,if(cortina_hora='00:00:00',hora,cortina_hora)))), '%H:%i:%s') AS t_patio, 
TIME_FORMAT(SEC_TO_TIME(AVG(TIMESTAMPDIFF(SECOND,if(cortina_hora='00:00:00',hora,cortina_hora),inicio_hora))), '%H:%i:%s') AS t_cortina, 
TIME_FORMAT(SEC_TO_TIME(AVG(TIMESTAMPDIFF(SECOND,inicio_hora,termino_hora))), '%H:%i:%s') AS t_descarga,

TIME_FORMAT(SEC_TO_TIME(AVG(TIMESTAMPDIFF(SECOND,hora,if(cortina_hora='00:00:00',hora,cortina_hora)) + 
TIMESTAMPDIFF(SECOND,if(cortina_hora='00:00:00',hora,cortina_hora),inicio_hora) + 
TIMESTAMPDIFF(SECOND,inicio_hora,termino_hora))), '%H:%i:%s') AS estadia,
EXTRACT(week FROM fecha) AS semana


FROM seller WHERE estatus='terminado' AND (SELECT EXTRACT(week FROM fecha))=28  GROUP by fecha ORDER BY fecha ASC
*/?>

