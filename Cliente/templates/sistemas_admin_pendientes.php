<?php
session_start();
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
    <link rel="stylesheet" href="../css/solicitud_usuario.css">
    <link rel="icon" href="imgs/logoimsaludrecortado.ico">
    <title>Sistemas administrador</title>
</head>
<body>
  
    <header class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

            <div class="container-fluid">

           <!-- <li class="nav-item dropdown"> -->
          <a class="fas fa-phone-laptop  nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="color=green;background:white;">
            Sistemas
          </a>
          <ul class="dropdown-menu">
            <li><a class="fas fa-hospital-user dropdown-item" href="sistemas_admin_aprobados.php" style="">Sistemas aprobados</a></li>
            <li><a class="far fa-user-md-chat dropdown-item" href="sistemas_admin_pendientes.php">Sistemas pendientes</a></li>
            <li><a class="fal fa-user-shield dropdown-item" href="permisos.php">Revisar permisos</a></li>
            <li><a class="fas fa-comment-medical dropdown-item" href="notificar_sistema.php">Notificar sistema aprobado</a></li>
            <li><a class="fas fa-user-hard-hat dropdown-item" href="sistemas_supervisor_admin.php">Opcion de supervisor</a></li>
            <li><a class="dropdown-item" href="sistemas_admin_solicitud.php">Opcion de solicitud</a></li>
          </ul>
      <!--  </li> -->





              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="far fa-user-cog nav-link" aria-current="page" href="perfil_admin.php">Mi perfil</a>
                  </li>
                  <li class="nav-item">
                    <a class="fas fa-id-card nav-link" href="pazysalvo_admin.php" disabled>Paz y salvo</a>
                  </li>

                  <li class="nav-item">
                    <a class="far fa-user-check nav-link" href="validar_usuarios.php" disabled>Accesos</a>
                  </li>
                  <li class="nav-item">
                    <a class="fas fa-users nav-link" href="gestion_usuario.php" disabled>Gestion de usuarios</a>
                  </li>
                </ul>
              </div>
            

            


              <div class="user" style="color: white">
              <span class="typed"></span>  <?php echo $_SESSION['nombre']; ?>
               <?php $tomador=$_SESSION['nombre'] ?>
              </div>

          
              <div class="form-check form-switch">
                <label class="form-check-label" for="flexSwitchCheckChecked" style="color: white;"></label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"> 
               </div>
            
               <a class="btn btn-light fas fa-sign-out-alt" href="../../Servidor/logout.php"></a>
            </div>
          
          </nav>
         
                    
    </header>

    <div class="imagen">
    <img  src="../imgs/logocompleto.png"  alt="" style="width: 130px; text-align: center;height: 50px">
    </div>

<div class="centrar">
        <div class="centrar1 col-sm-10 col-md-10 col-lg-10 col-xl-10">


        <?php

            include '../../Servidor/conexion.php';
            
            
                        $nombrer = '';
                        $cedular = 0;
                        $cargor = '';
                        $tiposolicitudr = '';
                        $aplicativor = '';
                        $observacionesr = '';
                        $observaciones_supervisorr = '';
                        //
                        $fechafinalcontrator = '';
                        $supervisorr = '';







                        $totalr = ''; 
                        //CONSULTA PARA LA NOTIFICACIONES 
                       //SELECT COUNT(*) FROM sistema_validado_supervisor;
                       $consulta3="SELECT COUNT(*) from sistema_validado_supervisor;";
                       $resultado3=mysqli_query($mysqli,$consulta3);
                           if($resultado3){ while($row = $resultado3->fetch_array()){
                              $totalr = $row['COUNT(*)'];
                              }
                        
                            } 



                   ?>   


                <?php


                $nombrer = '';
                $cedular = 0;
                $cargor = '';
                $tiposolicitudr = '';
                $aplicativor = '';
                $observacionesr = '';
                $observaciones_supervisorr = '';
                $idr = 0;



                ?>

                
                <?php $consulta="SELECT * from sistema_validado_supervisor;";
                $resultado=mysqli_query($mysqli,$consulta);
                if($resultado){ while($row = $resultado->fetch_array()){
                $nombrer = $row['nombre'];
                $cedular = $row['cedula'];
                $cargor = $row['cargo'];
                $tiposolicitudr = $row['tiposolicitud'];
                $aplicativor = $row['aplicativo'];
                $observacionesr = $row['observaciones'];
                $observaciones_supervisorr = $row['observaciones_supervisor'];
                $idr = $row['id'];
                }
   
                } 
                ?>



          
              <?php if($nombrer==''){
              ?><center style="color: grey;"> <b> <?php echo "No hay solicitudes actuales"; }?> </b>
              </center>


          <div class="notificador">
          <button type="button" class="btn btn-warning position-relative">
          Total
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          <?php echo $totalr; ?>
          <span class="visually-hidden">unread messages</span>
          </span>
          </button>
          </div>





            <div class="container form-control form-control" >
            <h5 class="centrar">Solicitud de sistemas</h5>


            <form action="../../Servidor/registrar_solicitud_admin.php" method="POST">

                <fieldset><b>Informacion general del colaborador</b></fieldset> 
                <div class="row">
                <div class="col">
                <label for="nombre" class="emerge">Nombre completo:</label> <br>
                <input type="text" name="nombre" id="nombre" class="emerge" value="<?php echo $nombrer?>">
                </div>


                <div class="col">
                <label for="cedula" class="emerge">Cedula:</label> <br>
                <input type="number" name="cedula" id="cedula" class="emerge" value="<?php echo $cedular ?>"> 
                </div>
              

                <div class="col">
                <label for="cargo" class="emerge">Cargo:</label> <br>
                <input type="text" name="cargo" id="cargo" class="emerge" value="<?php echo $cargor ?>">  
                </div>
                </div>


                <br> 
                <h6><b>Sistema de informacion requerido</b></h6> 
                <div class="row">
                <div class="col">
                <label for="tiposolicitud" class="emerge">Tipo de solicitud</label> <br>
                <input type="text"  name="tiposolicitud" id="tiposolicitud" value="<?php echo $tiposolicitudr ?>">
                </div>
                

                <div class="col">
                <label for="">Aplicativo</label> <br>
                <input type="text"  name="aplicativo" id="aplicativo" value="<?php echo $aplicativor ?>">
                </div>
               
                <div class="col">
                <label for="observaciones" class="emerge">Explicacion de los permisos</label> <br>
                <input type="text" name="observaciones" id="observaciones" class="obs emerge" value="<?php echo $observacionesr  ?>">  <br> <br>
                <textarea name="" id="" cols="2" rows="2" class="obs emerge"  style="color: black; background: #ECEFE4;"  value="<?php echo $observacionesr ?>" placeholder="<?php echo $observaciones_supervisorr ?>"></textarea>
                </div>
                </div>


                <!-- -->
                <?php $consulta2="SELECT * from usuarios_registrados WHERE cedula=$cedular;";
                $resultado2=mysqli_query($mysqli,$consulta2);
                if($resultado2){ while($row = $resultado2->fetch_array()){
                $fechafinalcontrator = $row['fechafinalcontrato'];
                $supervisorr = $row['supervisor'];
                }
   
                } 
                ?>
                <!-- -->
                <div class="row">
                <div class="col">
                <label for="">Id:</label> <br>
                <input type="text"  name="id" id="id"  value="<?php echo $idr?>">
                </div>

                <div class="col">
                <label for="">Supervisor:</label> <br>
                <input type="text" name="supervisor" id="supervisor"  value="<?php echo $supervisorr ?>">
                </div>

                <div class="col">
                <label for="">Permisos hasta:</label> <br>
                <input type="text"  name="fechafinalcontrato" id="fechafinalcontrato" placeholder="fecha final del permiso" value="<?php echo $fechafinalcontrator?>">
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
                <button type="submit" class="btn btn-success" name="registro" id="registro">Aprobarlo</button>
                </div>

                <div class="col">
                <button type="submit" class="btn btn-danger" name="eliminar" id="eliminar">Rechazarlo</button>
                </div>


                </form>
              </div>



           


            </div>
          </div>
          </div>
  </div>


  

      
      <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
      <script src="../js/main2.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
   
</html>

