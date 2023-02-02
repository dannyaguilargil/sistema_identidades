<?php
session_start();

?>
<!-- FORMULARIO TEMPORAL DE VALIDAR USUARIOS -->

<!DOCTYPE html>
<!--SOLICITUD_USUARIO A LA BASE DE DATOS-->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/solicitud_usuarios.css">
    <link rel="icon" href="../imgs/escudito.ico">
    <title>Validar usuarios pruebas</title>
</head>
<body>
  
<header class="">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
       
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           
            
            
              <li class="nav-item dropdown">
                <a class="fas fa-phone-laptop nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Sistemas
                </a>
                <ul class=" dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="administra.php">Pendientes</a></li>
                  <li><a class="dropdown-item" target="_blank" href="sistemas_solicitud_supervisor.php">Solicitud</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" target="_blank" href="sistemas_solicitud_supervisor.php">Notificar</a></li>
                </ul>
              </li>

            
              <li class="nav-item dropdown">
                <a class="fas fa-id-card nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Paz y salvo
                </a>
                <ul class=" dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="pazysalvo_admin.php">Pendientes</a></li>
                  <li><a class="dropdown-item" target="_blank" href="pazysalvo_aprobados.php">Aprobados</a></li>
                </ul>
              </li>
                

              <li class="nav-item dropdown">
                <a class="fas fa-user-cog nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Usuarios
                </a>
                <ul class=" dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="usuarios_pendientes.php">Pendientes</a></li>
                  <li><a class="dropdown-item" href="usuarios.php">Registrados</a></li>
                </ul>
              </li>



            </ul>
            <a class="far fa-user-cog navbar-brand " href="perfil_admin.php">Mi perfil</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            <a class="btn btn-light fas fa-sign-out-alt" href="../../Servidor/logout.php"></a>

          </div>
        </div>
      </nav>
      <!--NAVBAR-->
                    
</header>


    <center>
    <div class="imagen">
        <img  src="../imgs/logoimsaludrecortado.png"  alt="" style="width: 200px; text-align: center;">
    </div>

    </center>
    

<br>
           

            <?php $nombrer='';
                  $segundonombrer='';
                  $primerapellidor='';
                  $segundoapellidor='';
                  $cargor='';
                  $emailr='';
                  $supervisorr='';
                  $cedular='';
                  $tipodocumento='';
                 
            ?>
              
              <table class="container table table-light table-striped">
              <form action="../../Servidor/registrarusuarios_validados2.php" method="POST" class="container form-control" id="envio">


                    <tr class="tre">
                    <th>Ver</th>
                    <th>Primer nombre:</th>
                    <th>Primer apellido</th>
                    <th>Cargo o N° contrato</th>
                    <th>Tipo de documento</th>
                    <th>Cedula</th>
                    <th>Aceptar</th>
                    <th>Denegar</th>
                    </tr>


            <?php
            include '../../Servidor/conexion.php';
            $consulta="SELECT * from solicitud_usuario";
            $resultado=mysqli_query($mysqli,$consulta);
                    if($resultado){ while($row = $resultado->fetch_array()){
                        $nombrer = $row['nombre'];
                        $segundonombrer = $row['segundonombre'];
                        $primerapellidor = $row['primerapellido'];
                        
                        $segundoapellidor = $row['segundoapellido'];
                        $cargor = $row['cargo'];
                        $emailr = $row['email'];
                        $supervisorr = $row['supervisor'];
                        $tipodocumentor = $row['tipodocumento'];
                       // $tipodocumentor = $row['tipodocumento'];
                        $tipodocumentor = $row['tipodocumento'];
                        $cedular = $row['cedula'];
                     
                        ?>


                  
                    <tr>
                    <td> <button type="button" class="fas fa-eye modals btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@mdo" onclick="detener();"></button></td>
                    <td> <input type="text" name="nombre" id="nombre" class="emerge" value="<?php echo $nombrer?>"></td>
                    <!-- 
                    <td> <input type="text" name="nombre" id="nombre" class="emerge" value="<?php //echo $segundonombrer?>"></td>
                    -->
                    <td> <input type="text" name="nombre" id="nombre" class="emerge" value="<?php echo $primerapellidor?>"></td>
                    <!--
                    <td> <input type="text" name="nombre" id="nombre" class="emerge" value="<?php // echo $segundoapellidor?>"></td>
                    -->
                    <td> <input type="text" name="cargo" id="cargo" class="emerge" value="<?php  echo $cargor?>"> </td>
                    <!--
                    <td><input type="text" name="email" id="email" class="emerge" value="<?php// echo $emailr?>"></td>
                    -->
                    <!--
                    <td><input type="text" name="supervisor" id="supervisor" class="emerge" value="<?php //echo $supervisorr?>"></td>
                    -->
                    <td> <input type="text" name="tipodocumento" id="tipodocumento" class="emerge" value="<?php echo $tipodocumento?>"> </td>
                    <td> <input type="text" name="cedula" id="cedula" class="emerge" value="<?php echo $cedular?>"> </td>

                    <td><button type="submit" class="fa fa-check btn btn-success" name="registro" id="registro"  onclick="envio();"></button></td>
                    <td><button type="submit" class="fas fa-user-times fa-x btn btn-danger" name="eliminar" id="eliminar" onclick="envio2();"></button></td>
                    </tr>

                    
                   <?php
                    
                   
                    }
                    }
                    
                    
                
                  ?>

                    </form>
            </table>
         
       
<!--Modal de inserccion -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel"><b>Usario solicitado</b></h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
       <form  action="../../Servidor/registrar_usuario.php" method="POST" enctype="multipart/form-data" >

        <!--
         <div class="mb-1">
           <label for="id" class="col-form-label">Id</label> <br> 
           <input type="text" class="form-control-sm" id="id"  name="id" disabled> 
         </div> -->
          <div class="row">
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Primer nombre:</b></label> 
                <input type="text" class="emerge form-control-sm" id="nombre" name="nombre" required value="<?php echo $nombrer; ?>"> 
              </div>
            </div>
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label">Segundo nombre:</label>
                <input type="text" class="emerge form-control-sm" id="segundonombre" name="segundonombre" required value="<?php echo $segundonombrer; ?>"> 
              </div>
            </div>
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Primer apellido:</b></label>
                <input type="text" class="emerge form-control-sm" id="primerapellido" name="primerapellido" required value="<?php echo $primerapellidor; ?>">
              </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label">Segundo apellido:</label> 
                <input type="text" class="emerge form-control-sm" id="segundoapellido" name="segundoapellido" required value="<?php echo $segundoapellidor; ?>">
              </div>
            </div>
        <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Tipo de documento:</b></label>
                <input type="text" class="emerge form-control-sm" id="tipodocumento" name="tipodocumento" required value="<?php echo $tipodocumentor; ?>">
              </div>
        </div>
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Cedula:</b></label>
                <input type="text" class="emerge form-control-sm" id="cedula" name="cedula" required value="<?php echo $cedular; ?>"> 
              </div>
            </div>


        </div>

          <div class="row">
            
          <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Correo:</b></label> <br>
                <input type="text" class="emerge form-control-sm" id="nombre" name="nombre" required value="<?php echo $emailr; ?>"> 
              </div>
        </div>

            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Supervisor:</b></label>  <br>
                <input type="text" class="emerge form-control-sm" id="nombre" name="nombre" required value="<?php echo $supervisorr; ?>"> 
              </div>
            </div>
            
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Cargo/n° de contrato:</b></label>  <br>
                <input type="text" class="emerge form-control-sm" id="cargo" name="cargo" required value="<?php echo $cargor; ?>"> 
              </div>
            </div>

           
            </div>
        </div>

        

            
      
      </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
       <button type="submit" class="btn btn-outline-success">Aceptar</button>
       <button type="submit" class="btn btn-outline-danger">Rechazar</button>
     </div>
     </form>
   </div>
 </div>
 <!-- FIN DE MODAL DE INSERCCION -->



      <script>
        function detener(){
          const form= document.getElementById("envio");

          form.addEventListener("submit", function(event){
            console.log(event);
            event.preventDefault();
          }
          )
          //windows.location.href='../../Servidor/

          
        }


        //AQUI TENGO LA VALIDACION PARA QUE SE DETENGA EL ENVIO, AHORA QUIERO HACER LA INSERCION
      </script>



      <script>
        function eliminador(){

          alertify.confirm('Confirm Title', 'Confirm Message', function(){ alertify.success('Ok') }
                , function(){ alertify.error('Cancel')});


        }
      </script>




      <script>
      function envio(){
        alert("ENVIO EXITOSO");
      }
     
     </script>
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>