<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <title>Arrival Of Staff</title>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" type="text/css" href="css/menu_lateral.css">
    <link rel="stylesheet" type="text/css" href="css/formulario.css">
    <link rel="stylesheet" type="text/css" href="css/tablas.css">
    <link rel="stylesheet" type="text/css" href="css2/men.css">
    
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">  </script>
    <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <style>
	  .fondo{
		  background:url(img/lok29.gif);
		  background-size: cover;
		  -moz-background-size: cover;
		  -webkit-background-size: cover;
	    -o-background-size: cover;
    }
    span{
        color:#000000;
    }
   
    </style>
<body class="fondo">
    
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
            $validacion_nombre="SELECT nombre,apaterno,amaterno FROM personal
            WHERE id=".$id_obtenido;
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
            
        ?>
  <div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">Arrival Manage</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a >
          <i class='bx bx-user'></i>
          <span class="links_name">Control del personal</span>
          <ul class="sec2">
              <li><a href="javascript:alta()"><i class='bx bx-user-plus'></i>Alta de Personal</a></li>
              <li><a href="javascript:baja()"><i class='bx bx-user-minus'></i>Baja de Personal</a></li>
              <li><a href="#"><i class='bx bx-edit'></i>Actualización de Datos</a></li>
              <li><a href="#"><i class='bx bx-body'></i>Personal</a></li>
            </ul>
        </a>
      </li>

      <li>
        <a >
          <i class='bx bx-package'></i>
          <span class="links_name">Procesos</span>
          <ul class="sec2">
              <li><a href="javascript:alta_procesos()"><i class='bx bxs-plus-circle'></i>Alta de Procesos</a></li>
              <li><a href="javascript:baja_procesos()"><i class='bx bxs-trash'></i>Baja de Procesos</a></li>
              <li><a href="javascript:update_procesos()"><i class='bx bx-edit'></i>Actualización de Procesos</a></li>
              <li><a href="javascript:procesos()"><i class='bx bx-expand'></i>Procesos Actuales</a></li>
            </ul>
        </a>
      </li>

      <li>
        <a >
          <i class='bx bxs-component'></i>
          <span class="links_name">Posiciones</span>
          <ul class="sec2">
              <li><a href="javascript:alta_posiciones()"><i class='bx bx-list-plus'></i>Alta de Posiciones</a></li>
              <li><a href="javascript:baja_posiciones()"><i class='bx bx-list-minus'></i>Baja de Posiciones</a></li>
              <li><a href="javascript:update_posiciones()"><i class='bx bx-refresh'></i>Actualización de Posiciones</a></li>
              <li><a href="javascript:posiciones()"><i class='bx bxs-component'></i>Posiciones Actuales</a></li>
            </ul>
        </a>
      </li>

      <li>
        <a >
          <i class='bx bx-alarm'></i>
          <span class="links_name">Turnos</span>
          <ul class="sec2">
              <li><a href="javascript:alta_turnos()"><i class='bx bxs-bell-plus'></i>Alta de Turnos</a></li>
              <li><a href="javascript:baja_turnos()"><i class='bx bxs-bell-minus'></i>Baja de Turnos</a></li>
              <li><a href="javascript:update_turnos()"><i class='bx bx-refresh'></i>Actualización de Turnos</a></li>
              <li><a href="javascript:turnos()"><i class='bx bx-alarm'></i>Turnos Actuales</a></li>
            </ul>
        </a>
      </li>
    
     <li>
       <a href="#">
         <i class='bx bx-line-chart-down'></i>
         <span class="links_name">Asistencias</span>
       </a>
       <span class="tooltip">Asistencias</span>
     </li>
     <li>
       <a href="configuraciones.php">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Configuraciones</span>
       </a>
       <span class="tooltip">Configuraciones</span>
     </li>
     <li>
       <a href="https://wa.me/525558086776/?text=Hola%20mi%20nombre%20es%20<?php echo $nombre_responsable?>.%20Te%20contacto%20desde%20la%20aplicación%20Arrival%20Of%20Staff">
        <i class='bx bxl-whatsapp'></i>
         <span class="links_name">Contacto</span>
       </a>
       <span class="tooltip">Contacto</span>
     </li>
     <li>
       <a href="mailto:jesus.santiago@mercadolibre.com.mx?subject=Arrival%20Of%20Staff&body=Hola%20mi%20nombre%20es%20<?php echo $nombre_responsable; '<br>';?>.Te%20contacto%20desde%20la%20aplicacion%20Arrival%20Of%20Staff.">
          <i class='bx bx-mail-send'></i>
         <span class="links_name">E-mail</span>
       </a>
       <span class="tooltip">E-mail</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="img/admin.jpeg" alt="profileImg">
           <div class="name_job">
             <div class="name">Alberto Santiago</div>
             <div class="job">Operations Analyst</div>
           </div>
         </div>
         <a href="logout.php">
         <i class='bx bx-log-out' id="log_out" ></i>
         </a>
     </li>
    </ul>
  </div>
  <section class="home-section" style="background: transparent;
		background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
      -o-background-size: cover;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(7px);">
  <div class="loginimg1 " >

    <center>
        <div style="color:#ffffff; background-color:#000000;">Arrival Of Staff -<?php echo ' '.$nombre_responsable; ?>
        <script>
        (function(){
            setInterval(
            function(){
                var hor_actual= new Date().toLocaleString('es-MX');
                
                $("#hora_actual1").html(hor_actual);

            },
            1000)
        })()
        </script>
            <p id="hora_actual1" style="color:#ffffff;"><?php 
            date_default_timezone_set("America/Mexico_City");
            echo $fecha_actual=date("H:i:s");
            $fecha_actual1= strtotime ($fecha_actual);
            ?></p>
        </div>
        <br>
    <!-- // ALTA DE PERSONAL //-->
        <div class="alta " id="alta">
          <div>
          <nav class="menu-h" id="menu-h">
            
          </nav>
        </div>
          <br>
            <h2 style="color: #ffffff;">Alta de Personal</h2>
            <form action="registro_personal.php" method="POST" enctype="multipart/form-data"  >
                <div class="form" >
                    <input type="text" name="nombre" autocomplete="off" id="nombre" class="form__input"
                    placeholder=" " required>
                    <label for="nombre" class="form__label">Nombre</label>
                </div>
                <br>
                <div class="form">
                    <input type="text" name="apaterno" autocomplete="off" id="apaterno" class="form__input"
                    placeholder=" " required>
                    <label for="apaterno" class="form__label">Apellido Paterno</label>
                </div>
                <br>
                <div class="form">
                    <input type="text" name="amaterno" autocomplete="off" id="amaterno" class="form__input"
                    placeholder=" " required>
                    <label for="amaterno" class="form__label">Apellido Materno</label>
                </div>
                <br>
                <center>
                    <div class="select">
                    <select name="turno" class="turno" id="turno">
                    <option value="0">Turno</option>
                    <option value="11">1a</option>
                    <option value="12">1b</option>
                    <option value="21">2a</option>
                    <option value="22">2b</option>
                    <option value="31">3a</option>
                    <option value="32">3b</option>
                    <option value="4" >Mixto</option>
                    </select>
                    </div>
                    <br>
                    <div class="select">
                    <select name="puesto" class="puesto" id="puesto">
                    <option value="0" >Puesto</option>
                    <option value="rep" >Representante</option>
                    <option value="rep2" >Auxiliar</option>
                    <option value="tl" >Team Leader</option>
                    <option value="sup" >Supervisor</option>
                    </select>
                    </div>
                    <br>
                    <div class="select">
                    <?php 
                    $query="SELECT DISTINCT area FROM procesos";
                    $query1=mysqli_query($link,$query);
                    ?>
                    <select name="area" class="" id="area">
                        <option value="0">Area</option>
                        <?php while($matriz1=mysqli_fetch_array($query1)){?>
                            <option value="<?php echo $areas=$matriz1[0]; ?>"><?php echo $areas=$matriz1[0]; ?></option>
                        <?php 
                    }?>
                        
                    </select>
                    </div>
                    <br>
                    <div class="select">
                    <?php 
                    $query_proceso="SELECT DISTINCT proceso FROM procesos";
                    $query_proceso1=mysqli_query($link,$query_proceso);
                    ?>
                    <select name="proceso" class="" id="proceso">
                        <option value="0">Proceso</option>
                        <?php while($matriz_proceso=mysqli_fetch_array($query_proceso1)){?>
                            <option value="<?php echo $proceso=$matriz_proceso[0]; ?>"><?php echo $proceso=$matriz_proceso[0]; ?></option>
                        <?php 
                    }?>
                        
                    </select>
                    </div>
                    <br>
                    <div class="select">
                    <select name="rol" class="rol" id="rol" >
                    <option value="0" >Rol</option>
                    <option value="rep" >Representante</option>
                    <option value="admin" >Administrador</option>
                    <option value="sup" >Supervisor</option>
                    <option value="tl" >Team Leader</option>
                    </select>
                    </div>
                </center>
                <br>
                <div class="form">
                    <input type="text" name="usuario" autocomplete="off" id="usuario" class="form__input"
                    placeholder=" " required>
                    <label for="usuario" class="form__label">Usuario</label>
                </div>
                <br>
                <div class="form">
                    <input type="password" name="contraseña" autocomplete="off" id="contraseña" class="form__input"
                    placeholder=" " required>
                    <label for="contraseña" class="form__label">Contraseña</label>
                </div>
                <br>
                <div class="form">
                    <input type="password" name="confirmacion" autocomplete="off" id="confirmacion" class="form__input"
                    placeholder=" " required>
                    <label for="confirmacion" class="form__label">Confirmacion de Administrador</label>
                </div>
                <button class="Botones">Registrar</button>
            </form>
            
        </div>



    <!--  // BAJA DE PERSONAL //-->
      <div class="baja" id="baja">
        <script>
          function enviar(){

            var busqueda= document.getElementById('busqueda').value;

            var dataen= 'busqueda='+busqueda;

            $.ajax({

            type:'get',
            url:'consulta_baja_personal.php',
            data:dataen,
            success:function(resp){
            $("#respa").html(resp);
            }

          });
          return false;
          }
			  </script>
 
        <div class="form">
          <form method="GET"  onsubmit="return enviar();">
          
          <input type="text" name="busqueda" autocomplete="off" id="busqueda" class="busqueda"
            placeholder=" " required>
            <button class="Botones1"><i class='bx bx-search-alt-2'></i></button>
        </div>
          </form>
        
        <br>
          <p id="respa">
       
        </div>
    

    <!--  // BAJA DE PERSONAL //-->


    <!--  // ALTA DE PROCESOS //-->
    <div class="alta_procesos" id="alta_procesos">

        <form action="registro_proceso.php" method="POST" enctype="multipart/form-data">
        <h2 style="color: #ffffff;">>>Añadir Proceso<<</h2>
        <br>
            <div class="form" >
                <input type="text" name="nuevo_proceso" autocomplete="off" id="nuevo_proceso" class="form__input"
                placeholder=" " required>
                <label for="nuevo_proceso" class="form__label">Nuevo Proceso</label>
            </div>
            <br>
            <div class="select">
            <select name="area" id="area">
                <option value="0"selected disabled>Area</option>
                <option value="Inbound">Inbound</option>
                <option value="Outbound">Outbound</option>
            </select>
            </div>
            <button class="Botones">Agregar</button>
        </form>
      
    </div>

    <!--  // ALTA DE PROCESOS //-->


    <!--PROCESOS-->

      <div class="procesos " id="procesos">
      <script>
          function enviar_proceso(){

            var busqueda_proceso= document.getElementById('busqueda_proceso').value;

            var dataen= 'busqueda_proceso='+busqueda_proceso;

            $.ajax({

            type:'get',
            url:'consulta_procesos.php',
            data:dataen,
            success:function(resp){
            $("#respa_proceso").html(resp);
            }

          });
          return false;
          }
	  </script>
        

        <h2 style="color: #ffffff;">>>Procesos Actuales<<</h2>
        <br>
        <form method="GET"  onsubmit="return enviar_proceso();">
            <div class="form">
            <input type="text" name="busqueda_proceso" autocomplete="off" id="busqueda_proceso" class="busqueda"
                placeholder=" ">
                <button class="Botones1"><i class='bx bx-search-alt-2'></i></button>
            </div>
        </form>
        <br>
        <p id="respa_proceso">
            
            <br>
      </div>

    <!--PROCESOS-->


    <!--BAJA DE PROCESOS-->
        
    <div class="baja_procesos " id="baja_procesos">
      <script>
          function enviar_baja_proceso(){

            var busqueda_baja_proceso= document.getElementById('busqueda_baja_proceso').value;

            var dataen= 'busqueda_baja_proceso='+busqueda_baja_proceso;

            $.ajax({

            type:'get',
            url:'consulta_baja_procesos.php',
            data:dataen,
            success:function(resp){
            $("#respa_baja_proceso").html(resp);
            }

          });
          return false;
          }
	    </script>
        

        <h2 style="color: #ffffff;">>>Baja de Procesos<<</h2>
        <br>
        <form method="GET"  onsubmit="return enviar_baja_proceso();">
            <div class="form">
            <input type="text" name="busqueda_baja_proceso" autocomplete="off" id="busqueda_baja_proceso" class="busqueda"
                placeholder=" ">
                <button class="Botones1"><i class='bx bx-search-alt-2'></i></button>
            </div>
        </form>
        <br>
        <p id="respa_baja_proceso">
            
            <br>
      </div>
      
    <!--BAJA DE PROCESOS-->


    <!--UPDATE PROCESOS-->
    <div class="update_procesos" id="update_procesos">

      <script>
            function enviar_update_proceso(){

              var busqueda_update_proceso= document.getElementById('busqueda_update_proceso').value;

              var dataen= 'busqueda_update_proceso='+busqueda_update_proceso;

              $.ajax({

              type:'get',
              url:'consulta_update_procesos.php',
              data:dataen,
              success:function(resp){
              $("#respa_update_proceso").html(resp);
              }

            });
            return false;
            }
      </script>
      <h2 style="color: #ffffff;">>>Actualización de Procesos<<</h2>
      <br>
      <form method="GET"  onsubmit="return enviar_update_proceso();">
        <div class="form">
          <input type="text" name="busqueda_update_proceso" autocomplete="off" id="busqueda_update_proceso" class="busqueda"
            placeholder=" " required>
        <button class="Botones1"><i class='bx bx-search-alt-2'></i></button>
        </div>
      </form>
      <br>
      <p id="respa_update_proceso">

    </div>
    <!--UPDATE PROCESOS-->

    <!--POSICIONES-->
            
    <div class="posiciones" id="posiciones">
    <script>
      function enviar_posicion(){

        var busqueda_posicion= document.getElementById('busqueda_posicion').value;

        var dataen= 'busqueda_posicion='+busqueda_posicion;

        $.ajax({

          type:'get',
          url:'consulta_posiciones.php',
          data:dataen,
          success:function(resp){
            $("#respa_posiciones").html(resp);
          }

        });
      return false;
      }
    </script>

      <h2 style="color: #ffffff;">>>Posiciones Actuales<<</h2>
      <br>
      <form method="GET"  onsubmit="return enviar_posicion();">
        <div class="form">
          <input type="text" name="busqueda_posicion" autocomplete="off" id="busqueda_posicion" class="busqueda"
            placeholder=" ">
          <button class="Botones1"><i class='bx bx-search-alt-2'></i></button>
        </div>
      </form>
      <br>
      <p id="respa_posiciones">

    </div>

    <!--POSICIONES-->

    
    <!--ALTA DE POSICIONES-->

    <div class="alta_posiciones" id="alta_posiciones">
      <h2 style="color: #ffffff;">>>Alta de Posiciones<<</h2>
      <br>
      <form action="alta_posiciones.php" method="POST" enctype="multipart/form-data"  >
        <div class="form" >
          <input type="text" name="nueva_posicion" autocomplete="off" id="nueva_posicion" class="form__input"
            placeholder=" " required>
          <label for="nueva_posicion" class="form__label">Nueva Posicion</label>
        </div>
        <button class="Botones">Agregar</button>
      </form>
  
    </div>

    <!--ALTA DE POSICIONES-->


    <!--BAJA DE POSICIONES-->

    <div class="baja_posiciones" id="baja_posiciones">
      <script>
          function enviar_baja_posiciones(){

            var busqueda_baja_posicion= document.getElementById('busqueda_baja_posicion').value;

            var dataen= 'busqueda_baja_posicion='+busqueda_baja_posicion;

            $.ajax({

            type:'get',
            url:'consulta_baja_posicion.php',
            data:dataen,
            success:function(resp){
            $("#respa_baja_posicion").html(resp);
            }

          });
          return false;
          }
	    </script>
      <h2 style="color: #ffffff;">>>Baja de Posiciones<<</h2>
      <br>
        <form method="GET"  onsubmit="return enviar_baja_posiciones();">
          <div class="form">
            <input type="text" name="busqueda_baja_posicion" autocomplete="off" id="busqueda_baja_posicion" class="busqueda"
                placeholder=" ">
            <button class="Botones1"><i class='bx bx-search-alt-2'></i></button>
          </div>
        </form>
        <br>
        <p id="respa_baja_posicion">
            
      <br>
    </div>

    <!--BAJA DE POSICIONES-->

    <!--UPDATE DE POSICIONES-->

    <div class="update_posiciones" id="update_posiciones">
    <script>
          function enviar_update_posiciones(){

            var busqueda_update_posicion= document.getElementById('busqueda_update_posicion').value;

            var dataen= 'busqueda_update_posicion='+busqueda_update_posicion;

            $.ajax({

            type:'get',
            url:'consulta_update_posicion.php',
            data:dataen,
            success:function(resp){
            $("#respa_update_posicion").html(resp);
            }

          });
          return false;
          }
	    </script>
      <h2 style="color: #ffffff;">>>Actualizacion de Posiciones<<</h2>
      <br>
          <form method="GET"  onsubmit="return enviar_update_posiciones();">
            <div class="form">
              <input type="text" name="busqueda_update_posicion" autocomplete="off" id="busqueda_update_posicion" class="busqueda"
                  placeholder=" ">
              <button class="Botones1"><i class='bx bx-search-alt-2'></i></button>
            </div>
          </form>
          <br>
          <p id="respa_update_posicion">
              
        <br>

    </div>

    <!--UPDATE DE POSICIONES-->

    <!--ALTA DE TURNOS-->

    <div class="alta_turnos" id="alta_turnos">

    <h2 style="color: #ffffff;">>>Alta de Turnos<<</h2>

    </div>

    <!--ALTA DE TURNOS-->



        </center>
      </div>
    </div>
    
  </section>
  
</body>
</html>
<script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
<script>
function alta(){
  document.getElementById("alta").style.display="block";
  document.getElementById("baja").style.display="none";
  document.getElementById("alta_procesos").style.display="none";
  document.getElementById("procesos").style.display="none";
  document.getElementById("baja_procesos").style.display="none";
  document.getElementById("update_procesos").style.display="none";
  document.getElementById("posiciones").style.display="none";
  document.getElementById("alta_posiciones").style.display="none";
  document.getElementById("baja_posiciones").style.display="none";
  document.getElementById("update_posiciones").style.display="none";
  document.getElementById("alta_turnos").style.display="none";
  
}
function baja(){
	document.getElementById("baja").style.display="block";
  document.getElementById("alta").style.display="none";
  document.getElementById("alta_procesos").style.display="none";
  document.getElementById("procesos").style.display="none";
  document.getElementById("baja_procesos").style.display="none";
  document.getElementById("update_procesos").style.display="none";
  document.getElementById("posiciones").style.display="none";
  document.getElementById("alta_posiciones").style.display="none";
  document.getElementById("baja_posiciones").style.display="none";
  document.getElementById("update_posiciones").style.display="none";
  document.getElementById("alta_turnos").style.display="none";
}
function alta_procesos(){
  document.getElementById("alta_procesos").style.display="block";
	document.getElementById("baja").style.display="none";
  document.getElementById("alta").style.display="none";
  document.getElementById("procesos").style.display="none";
  document.getElementById("baja_procesos").style.display="none";
  document.getElementById("update_procesos").style.display="none";
  document.getElementById("posiciones").style.display="none";
  document.getElementById("alta_posiciones").style.display="none";
  document.getElementById("baja_posiciones").style.display="none";
  document.getElementById("update_posiciones").style.display="none";
  document.getElementById("alta_turnos").style.display="none";
}
function update_procesos(){
  document.getElementById("update_procesos").style.display="block";
  document.getElementById("alta_procesos").style.display="none";
	document.getElementById("baja").style.display="none";
  document.getElementById("alta").style.display="none";
  document.getElementById("procesos").style.display="none";
  document.getElementById("baja_procesos").style.display="none";
  document.getElementById("posiciones").style.display="none";
  document.getElementById("alta_posiciones").style.display="none";
  document.getElementById("baja_posiciones").style.display="none";
  document.getElementById("update_posiciones").style.display="none";
  document.getElementById("alta_turnos").style.display="none";
}

function alta_posiciones(){
  document.getElementById("alta_posiciones").style.display="block";
  document.getElementById("posiciones").style.display="none";
  document.getElementById("update_procesos").style.display="none";
  document.getElementById("alta_procesos").style.display="none";
	document.getElementById("baja").style.display="none";
  document.getElementById("alta").style.display="none";
  document.getElementById("procesos").style.display="none";
  document.getElementById("baja_procesos").style.display="none";
  document.getElementById("baja_posiciones").style.display="none";
  document.getElementById("update_posiciones").style.display="none";
  document.getElementById("alta_turnos").style.display="none";
}
function update_posiciones(){
  document.getElementById("update_posiciones").style.display="block";
  document.getElementById("alta_posiciones").style.display="none";
  document.getElementById("posiciones").style.display="none";
  document.getElementById("update_procesos").style.display="none";
  document.getElementById("alta_procesos").style.display="none";
	document.getElementById("baja").style.display="none";
  document.getElementById("alta").style.display="none";
  document.getElementById("procesos").style.display="none";
  document.getElementById("baja_procesos").style.display="none";
  document.getElementById("baja_posiciones").style.display="none";
  document.getElementById("alta_turnos").style.display="none";
}

function alta_turnos(){
  document.getElementById("alta_turnos").style.display="block";
  document.getElementById("update_posiciones").style.display="none";
  document.getElementById("alta_posiciones").style.display="none";
  document.getElementById("posiciones").style.display="none";
  document.getElementById("update_procesos").style.display="none";
  document.getElementById("alta_procesos").style.display="none";
	document.getElementById("baja").style.display="none";
  document.getElementById("alta").style.display="none";
  document.getElementById("procesos").style.display="none";
  document.getElementById("baja_procesos").style.display="none";
  document.getElementById("baja_posiciones").style.display="none";
}

function posiciones(){
  document.getElementById("posiciones").style.display="block";
  document.getElementById("update_procesos").style.display="none";
  document.getElementById("alta_procesos").style.display="none";
	document.getElementById("baja").style.display="none";
  document.getElementById("alta").style.display="none";
  document.getElementById("procesos").style.display="none";
  document.getElementById("baja_procesos").style.display="none";
  document.getElementById("alta_posiciones").style.display="none";
  document.getElementById("baja_posiciones").style.display="none";
  document.getElementById("update_posiciones").style.display="none";
  document.getElementById("alta_turnos").style.display="none";
  var busqueda_posicion= document.getElementById('busqueda_posicion').value;

  var dataen= 'busqueda_posicion='+busqueda_posicion;

  $.ajax({

    type:'get',
    url:'consulta_posiciones.php',
    data:dataen,
    success:function(resp){
      $("#respa_posiciones").html(resp);
    }

  });
  return false;
}

function baja_posiciones(){
  document.getElementById("baja_posiciones").style.display="block";
  document.getElementById("alta_posiciones").style.display="none";
  document.getElementById("posiciones").style.display="none";
  document.getElementById("update_procesos").style.display="none";
  document.getElementById("alta_procesos").style.display="none";
	document.getElementById("baja").style.display="none";
  document.getElementById("alta").style.display="none";
  document.getElementById("procesos").style.display="none";
  document.getElementById("baja_procesos").style.display="none";
  document.getElementById("update_posiciones").style.display="none";
  document.getElementById("alta_turnos").style.display="none";

  var busqueda_baja_posicion= document.getElementById('busqueda_baja_posicion').value;

  var dataen= 'busqueda_baja_posicion='+busqueda_baja_posicion;

  $.ajax({

    type:'get',
    url:'consulta_baja_posicion.php',
    data:dataen,
    success:function(resp){
    $("#respa_baja_posicion").html(resp);
    }

    });
    return false;
}
function procesos(){
  document.getElementById("procesos").style.display="block";
  document.getElementById("update_procesos").style.display="none";
  document.getElementById("alta_procesos").style.display="none";
	document.getElementById("baja").style.display="none";
  document.getElementById("alta").style.display="none";
  document.getElementById("baja_procesos").style.display="none";
  document.getElementById("posiciones").style.display="none";
  document.getElementById("alta_posiciones").style.display="none";
  document.getElementById("baja_posiciones").style.display="none";
  document.getElementById("update_posiciones").style.display="none";
  document.getElementById("alta_turnos").style.display="none";
  var busqueda_proceso= document.getElementById('busqueda_proceso').value;

    var dataen= 'busqueda_proceso='+busqueda_proceso;
    $.ajax({

      type:'get',
      url:'consulta_procesos.php',
      data:dataen,
      success:function(resp){
      $("#respa_proceso").html(resp);
      }

     });
          return false;
    }

  function baja_procesos(){
  document.getElementById("baja_procesos").style.display="block";
  document.getElementById("update_procesos").style.display="none";
	document.getElementById("baja").style.display="none";
  document.getElementById("alta_procesos").style.display="none";
  document.getElementById("alta").style.display="none";
  document.getElementById("procesos").style.display="none";
  document.getElementById("posiciones").style.display="none";
  document.getElementById("alta_posiciones").style.display="none";
  document.getElementById("baja_posiciones").style.display="none";
  document.getElementById("update_posiciones").style.display="none";
  document.getElementById("alta_turnos").style.display="none";
  var busqueda_baja_proceso= document.getElementById('busqueda_baja_proceso').value;

  var dataen= 'busqueda_baja_proceso='+busqueda_baja_proceso;

  $.ajax({

    type:'get',
    url:'consulta_baja_procesos.php',
    data:dataen,
    success:function(resp){
    $("#respa_baja_proceso").html(resp);
    }

  });
  return false;
}
</script>
