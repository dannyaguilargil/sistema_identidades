<?php
session_start();
include '../../Servidor/conexion.php'; 

//POR AHORA ME INTERESA ACEPTARLO, REGISTRARLO Y ENVIARLO AL ADMINISTRADOR, LUEGO QUE ELIMINE ESA SOLICITUD

?>


<!DOCTYPE html>
<!--SOLICITUD_USUARIO A LA BASE DE DATOS-->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/sistemas_supervisor_admin.css">
    <link rel="icon" href="../imgs/escudito.ico">
    <title>Solicitar sistema supervisor</title>
</head>
<body>
  
<header class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

            <div class="container-fluid" style="">

           <!-- <li class="nav-item dropdown"> -->
          <a class="fas fa-phone-laptop nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" style="color: black; background: white;">
            Sistemas
          </a>
          <ul class="dropdown-menu">
            <li><a class="fas fa-hospital-user dropdown-item" href="sistemas_admin_aprobados.php" style="">Sistemas aprobados</a></li>
            <li><a class="far fa-user-md-chat dropdown-item" href="sistemas_admin_pendientes.php">Sistemas pendientes de aprobacion</a></li>
            <li><a class="fal fa-user-shield dropdown-item" href="permisos.php">Revisar permisos</a></li>
            <li><a class="fas fa-comment-medical dropdown-item" href="notificar_sistema.php">Notificar sistema aprobado</a></li>
            <li><a class="fas fa-user-hard-hat dropdown-item" href="sistemas_supervisor_admin.php">Supervisor</a></li>
          </ul>
      <!--  </li> -->





              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="far fa-user-cog nav-link" aria-current="page" href="perfil.php">Mi perfil</a>
                  </li>
                  <li class="nav-item">
                    <a class="fas fa-id-card nav-link" href="pazysalvo.php" disabled>Paz y salvo</a>
                  </li>

                  <li class="nav-item">
                    <a class="far fa-user-check nav-link" href="validar_usuarios.php" disabled>Accesos</a>
                  </li>
                  <li class="nav-item">
                    <a class="fas fa-users nav-link" href="gestionar_usuarios.php" disabled>Gestion de usuarios</a>
                  </li>
                </ul>
              </div>
            

            


              <div class="user" style="color: white">
              SUPER ADMIN! <?php echo $_SESSION['nombre']; ?>
             <?php $tomador=$_SESSION['nombre'] ?>
              </div>

          
              <!-- EJEMPLO DE MODO OSCURO -->
              <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch"  id="checkbox" onclick="setDarkMode();">
              <label class="form-check-label" for="checkbox"></label>
               </div>
            
               <a class="btn btn-light fas fa-sign-out-alt" href="../../Servidor/logout.php"></a>
            </div>
          
          </nav>
         
                    
    </header>
    
    <div class="imagen">
    <img  src="../imgs/logoimsaludrecortado.png"  alt="" style="width: 150px; text-align: center;height: 50px">
    </div>







    <!-- AQUI INICIA EL DIV-->
    <?php 
    
    //CONSULTA DE LA SOLICITUD DEL SUPERVISOR
    $nombrer = '';
    $segundonombrer = '';
    $primerapellidor = '';
    $segundoapellidor = '';
    $cedular = 0;
    $cargor = '';
    $tiposolicitudr = '';
    $aplicativor = '';
    $observacionesr = '';
    $idr = 0;
  
   
   $consulta="SELECT * from solicitud_sistema WHERE supervisor = '$tomador';";
   $resultado=mysqli_query($mysqli,$consulta);
       if($resultado){ while($row = $resultado->fetch_array()){
          $nombrer = $row['nombre'];
          $segundonombrer = $row['segundonombre'];
          $primerapellidor = $row['primerapellido'];
          $segundoapellidor = $row['segundoapellido'];
          $cargor = $row['cargo'];
          $cedular = $row['cedula'];
          
          $tiposolicitudr = $row['tiposolicitud'];
          $aplicativor = $row['aplicativo'];
          $observacionesr = $row['observaciones'];
          $idr = $row['id'];
          }
    
        } 
       
    //SEGUN EL APLICATIVO QUE HAY VOY A REGISTRARLO HACIENDO CONDICIONAL A LA BASE DE DATOS

    ?>


   <!-- SEGUNDA CONSULTA DE PHP SOLO PARA TRERME LA FECHA FINAL DE CONTRATO DEL USUARIO SOLICITANTE-->
  <?php
  include '../../Servidor/conexion.php';
  $fechafinalcontrator = ''; 
  
  
  
  $consulta2="SELECT fechafinalcontrato from usuarios_registrados WHERE cedula = $cedular;";
  $resultado2=mysqli_query($mysqli,$consulta2);
      if($resultado2){ while($row = $resultado2->fetch_array()){
         $fechafinalcontrator = $row['fechafinalcontrato'];
         }
   
       } 
  
       $totalr = ''; 
  
    //CONSULTA PARA LA NOTIFICACIONES 
    //SELECT COUNT(*) FROM solicitud_sistema;
    $consulta3="SELECT COUNT(*) from solicitud_sistema;";
    $resultado3=mysqli_query($mysqli,$consulta3);
        if($resultado3){ while($row = $resultado3->fetch_array()){
           $totalr = $row['COUNT(*)'];
           }
     
         } 
  
  
  
  ?>


    <div class="centrar">
        <div class="centrar1 col-sm-10 col-md-10 col-lg-10 col-xl-10">


            <?php if($nombrer==''){
            ?><center style="color: red;"> <b class="carita fas fa-comment-alt-smile"> <?php echo "No hay solicitudes actuales"; }?> </b>
            
            </center> 


          <div class="container notificador">
          <button type="button" class="btn btn-success position-relative">
           Total
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          <?php echo $totalr; ?>
          <span class="visually-hidden">unread messages</span>
          </span>
          </button>
          </div>





       

            <div class="container form-control form-control" >
           
            <form action="../../Servidor/registrar_solicitud_supervisor.php" method="POST">

                <fieldset><b>Informacion general del colaborador</b></fieldset> 
                <div class="row">
                <div class="col">
                <label for="nombre" class="emerge"><b>Primer nombre:</b></label> <br>
                <input type="text" name="nombre" id="nombre" class="emerge" value="<?php echo $nombrer?>">
                </div>

                <div class="col">
                <label for="segundonombre" class="emerge">Segundo nombre:</label> <br>
                <input type="text" name="segundonombre" id="segundonombre" class="emerge" value="<?php echo $segundonombrer?>">
                </div>

                <div class="col">
                <label for="primerapellido" class="emerge"><b>Primer apellido:</b></label> <br>
                <input type="text" name="primerapellido" id="primerapellido" class="emerge" value="<?php echo $primerapellidor ?>"> 
                </div>
              

                <div class="col">
                <label for="segundoapellido" class="emerge">Segundo apellido:</label> <br>
                <input type="text" name="segundoapellido" id="segundoapellido" class="emerge" value="<?php echo $segundoapellidor?>">  
                </div>

                
                </div>

                <div class="row">
                <div class="col">
                <label for="supervisor">Supervisor o jefe inmediato:</label> <br>
                <input type="text" name="supervisor" id="supervisor" value="<?php echo $tomador ?>">
                </div>

              
                <div class="col">
                  <!-- DEBO VALIDAR SI ALFIN  VA FECHA FINAL DE CONTRATO -->
                <label for="fechafinalcontrato">Permisos hasta:</label> <br>
                <input type="text" name="fechafinalcontrato" id="fechafinalcontrato" value="<?php echo $fechafinalcontrator ?>" placeholder="25/01/2023">
                </div>

                <div class="col">
                <label for="cedula" class="emerge">Cedula:</label> <br>
                <input type="number" name="cedula" id="cedula" class="" value="<?php echo $cedular ?>"> 
                </div>
              

                <div class="col">
                <label for="cargo" class="emerge"><b>Cargo o N° de contrato:</b></label> <br>
                <input type="text" name="cargo" id="cargo" class="" value="<?php echo $cargor?>">  
                </div>

                
                </div>


              <hr>
                <h6><b>Sistema de informacion requerido</b></h6> 
                <div class="row">
                <div class="col">
                <label for="tiposolicitud" class="emerge">Tipo de solicitud</label> <br>
                <input type="text" name="tiposolicitud"  id="tiposolicitud"  value="<?php echo $tiposolicitudr ?>">
                </div>
                

                <div class="col">
                <label for="">Aplicativo</label> <br>
                <input type="text" name="aplicativo" id="aplicativo"  value="<?php echo $aplicativor ?>">
                 </div>
               
                <div class="col">
                <label for="observaciones" class="">Explicacion de los permisos</label> <br>
                <input type="text" name="observaciones" id="observaciones" class="" value="<?php echo $observacionesr?>">  <br> <br>

                </div>



                <div class="col">
                <label for="id_solicitud">Id de solicitud:</label> <br>
                <input type="text" name="id_solicitud" id="id_solicitud" value="<?php echo $idr ?>">
                </div>


                </div>

                <div class="row">
             
                <div class="col">
                  <center>
                   <b> <label for="">Validacion del supervisor</label><b><br>
                <input  class="obs" type="text" name="observaciones_supervisor" id="observaciones_supervisor"  style="color: green;" placeholder="Explique los permisos del sistema" required>
                </center>
              </div>
              
                </div>

<br>
                <div class="row">
                <div class="col">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked required>
                    <label class="form-check-label" for="flexCheckChecked">
                      Acepto tratamiento de datos
                    </label>
                  </div>
                </div>

                <div class="col">
                <button type="submit"  class="btn btn-success" name="registro" id="registro" onclick="envio();">Validarlo</button>
                </div>
                
                <div class="col">
                <button type="submit" class="btn btn-danger"  name="eliminar" id="eliminar"  onclick="envio();">Rechazarlo</button>
                </div>

                </form>
              </div>


           

           

                  


          </div>
          </div>
        </div>
</div>


<!--
<footer>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
      </footer>
-->
      <script>
      function envio(){
        alert("ENVIO EXITOSO");
      }
     </script>

<script>
        //setDarkMode
        console.log("se ejecuto script")
        if(localStorage.getItem('theme') == 'dark'){
          setDarkMode();

            if(document.getElementById('checkbox').checked){
              localStorage.setItem('checkbox', true)
            }
        }


        function setDarkMode(){
          console.log("se ejecuto script 2")
          let isDark = document.body.classList.toggle('darkmode');


          if(isDark){
            setDarkMode.checked = true;
            localStorage.setItem('theme', 'dark');
            document.getElementById('checkbox').setAttribute('checked', 'checked');
          }
          else{
            setDarkMode.checked = true;
            localStorage.removeItem('theme', 'dark');
          }
        }
      </script>


      <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
      <script src="../js/main3.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>