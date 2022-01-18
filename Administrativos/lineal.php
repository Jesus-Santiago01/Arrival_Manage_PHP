<div id="graficalineal1">
<?php require("conexion.php");?>

    
        
 <!-- GRAFICA UNIDADES INGRESADAS -->
        <?php
        
            $query="SELECT fecha AS fechas,COUNT(id) AS unidades FROM seller WHERE estatus='terminado' GROUP by fecha ORDER BY fecha";
            $result=mysqli_query($link,$query);
            $valoresx=array();
            $valoresy=array();
            while($matriz1=mysqli_fetch_array($result)){
                    $valoresx[]=$matriz1[0];
                    $valoresy[]=$matriz1[1];
                }

            $datosx=json_encode($valoresx);
            $datosy=json_encode($valoresy);

        ?>
        <h3>Unidades Ingresadas</h3>
            <button class="Botones" onclick="location.href='javascript:abrir()'">
            Datos</button>

            <div id="graficalineal">
            </div>

            <script>
            function Cadenalineal(json){
            var parsed= JSON.parse(json);
            var arr=[];
            for(var x in parsed){
                arr.push(parsed[x]);

            }
            return arr;
            }
            </script>

            <script>
                datosx=Cadenalineal('<?php echo $datosx ?>');
                datosy=Cadenalineal('<?php echo $datosy ?>');

            var trace1 = {
            x: datosx,
            y: datosy,
            type: 'scatter'
            };


            var data = [trace1];

            Plotly.newPlot('graficalineal', data);
            </script>

            <script>
            function abrir(){
                document.getElementById("ventana").style.display="block";
                document.getElementById("grafica_tipo").style.display="none";
                
                
            }
            function cerrar(){
                document.getElementById("ventana").style.display="none";
                document.getElementById("grafica_tipo").style.display="block";
            }
            </script>

            <div class="ventana" id="ventana">
            
            Datos
            <div id="cerrar">
                <button class="Botones" onclick="location.href='javascript:cerrar()'" >
                X</button>
                
            </div>
            <div class="table-container">
                <table class="table-rwd">

                            
                    <thead>
                <tr> 
                    <th>FECHA</th>
                    <th>SEMANA</th>
                    <th>UNIDADES</th>
                    
                </tr>
                    </thead>
                    <?php foreach ($link->query("SELECT fecha AS fechas,COUNT(id) AS unidades,EXTRACT(week FROM seller.fecha) AS semana FROM seller WHERE estatus='terminado' GROUP BY fechas") as $row){ // aca puedes hacer la consulta e iterarla con each.      ?>
                
                <tr>
                        
                        <td> <?php echo $row['fechas'] ?></td>
                        <td> <?php echo $row['semana'] ?></td>
                        <td> <?php echo $row['unidades'] ?></td>
                    
                    </tr>
                    <?php
                        }
                    ?>
                    </table></center>

            </div>
           

    </div>


 <!-- GRAFICA TIPO DE RECIBO -->

    <?php
        
            $query1="SELECT fecha AS fechas, tipo AS tipos ,COUNT(id) AS unidades FROM seller WHERE tipo='r1' AND estatus='terminado' GROUP by fecha,tipos ORDER BY fecha";
            $result1=mysqli_query($link,$query1);
            $query2="SELECT fecha AS fechas, tipo AS tipos ,COUNT(id) AS unidades FROM seller WHERE tipo='f1' AND estatus='terminado' GROUP by fecha,tipos ORDER BY fecha";
            $result2=mysqli_query($link,$query2);
            $query3="SELECT fecha AS fechas, tipo AS tipos ,COUNT(id) AS unidades FROM seller WHERE tipo='cl' AND estatus='terminado' GROUP by fecha,tipos ORDER BY fecha";
            $result3=mysqli_query($link,$query3);
            $query4="SELECT fecha AS fechas, tipo AS tipos ,COUNT(id) AS unidades FROM seller WHERE tipo='tr' AND estatus='terminado' GROUP by fecha,tipos ORDER BY fecha";
            $result4=mysqli_query($link,$query4);

            $valoresxx=array();
            $valoresyy=array();
            $valoresxx1=array();
            $valoresyy1=array();
            $valoresxx2=array();
            $valoresyy2=array();
            $valoresxx3=array();
            $valoresyy3=array();

            while($matriz2=mysqli_fetch_array($result1)){
                    $valoresxx[]=$matriz2[0];
                    $valoresyy[]=$matriz2[2];
                }
                while($matriz3=mysqli_fetch_array($result2)){
                    $valoresxx1[]=$matriz3[0];
                    $valoresyy1[]=$matriz3[2];
                }
                while($matriz4=mysqli_fetch_array($result3)){
                    $valoresxx2[]=$matriz4[0];
                    $valoresyy2[]=$matriz4[2];
                }
                while($matriz5=mysqli_fetch_array($result4)){
                    $valoresxx3[]=$matriz5[0];
                    $valoresyy3[]=$matriz5[2];
                }

            $datosxx=json_encode($valoresxx);
            $datosyy=json_encode($valoresyy);
            $datosxx1=json_encode($valoresxx1);
            $datosyy1=json_encode($valoresyy1);
            $datosxx2=json_encode($valoresxx2);
            $datosyy2=json_encode($valoresyy2);
            $datosxx3=json_encode($valoresxx3);
            $datosyy3=json_encode($valoresyy3);

    ?>
            
            <h3>Tipos de Recibo</h3>
            <button class="Botones" onclick="location.href='javascript:abrir3()'">
            Datos</button>
            <div id="grafica_tipo">
            </div>

            <script>
                datosxx=Cadenalineal('<?php echo $datosxx ?>');
                datosyy=Cadenalineal('<?php echo $datosyy ?>');
                datosxx1=Cadenalineal('<?php echo $datosxx1 ?>');
                datosyy1=Cadenalineal('<?php echo $datosyy1 ?>');
                datosxx2=Cadenalineal('<?php echo $datosxx2 ?>');
                datosyy2=Cadenalineal('<?php echo $datosyy2 ?>');
                datosxx3=Cadenalineal('<?php echo $datosxx3 ?>');
                datosyy3=Cadenalineal('<?php echo $datosyy3 ?>');

                var trace1 = {
              x: datosxx,
              y: datosyy,
              name: 'Regular IB',
              type: 'bar'
            };

            var trace2 = {
              x: datosxx1,
              y: datosyy1,
              name: 'Formula IB',
              type: 'bar'
            };
            var trace3 = {
              x: datosxx1,
              y: datosyy2,
              name: 'Colecta',
              type: 'bar'
            };
            var trace4 = {
              x: datosxx1,
              y: datosyy3,
              name: 'Transfer',
              type: 'bar'
            };

            var data = [trace1, trace2, trace3, trace4];

            var layout = {barmode: 'stack'};

            Plotly.newPlot('grafica_tipo', data, layout);


            </script>

            <script>
            function abrir3(){
                document.getElementById("ventana3").style.display="block";
                document.getElementById("graficalineal").style.display="none";
                
                
            }
            function cerrar3(){
                document.getElementById("ventana3").style.display="none";
                document.getElementById("graficalineal").style.display="block";
            }
            </script>

            <div class="ventana3" id="ventana3">
            
            Datos
            <div id="cerrar3">
                <button class="Botones" onclick="location.href='javascript:cerrar3()'" >
                X</button>
                
            </div>
            <div class="table-container">
                <table class="table-rwd">

                            
                    <thead>
                <tr> 
                    <th>FECHA</th>
                    <th>SEMANA</th>
                    <th>TIPOS</th>
                    <th>CANTIDAD</th>
                    
                </tr>
                    </thead>
                    <?php foreach ($link->query("SELECT fecha AS fechas, tipo AS tipos ,COUNT(id) AS cantidad, EXTRACT(week FROM fecha) AS semana FROM seller
                    WHERE estatus='terminado' GROUP by fecha,tipos ORDER BY fecha") as $row){ // aca puedes hacer la consulta e iterarla con each.     
                     if($row['tipos']=='f1'){
                        $tipo2='Formula IB';
                      }else if($row['tipos']=='r1'){
                        $tipo2='Regular IB';
                      }else if($row['tipos']=='tr'){
                        $tipo2='Transfer';
                      }else if($row['tipos']=='cl'){
                        $tipo2='Colecta';
                      }    
                        ?>
                
                <tr>
                        
                        <td> <?php echo $row['fechas'] ?></td>
                        <td> <?php echo $row['semana'] ?></td>
                        <td> <?php echo $tipo2 ?></td>
                        <td> <?php echo $row['cantidad'] ?></td>
                    
                    </tr>
                    <?php
                        }
                    ?>
                    </table></center>

            </div>
           

  

  </div>