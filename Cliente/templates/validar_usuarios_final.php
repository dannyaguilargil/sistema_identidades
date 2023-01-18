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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/valida_usuarios2.css">
    <link rel="icon" href="imgs/logoimsaludrecortado.ico">
    <title>Iniciar Sesion</title>
</head>
<body>
  
    <header class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand " href="gestion_usuario.php">Usuarios</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="sistemas_admin.php">Sistemas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pazysalvo_acceso.php" disabled>Paz y salvo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="perfil.html" disabled>Mi perfil</a>
                  </li>
                </ul>
              
              </div>


              
              <div class="user" style="color: white;">
                <?php $tomador=$_SESSION['nombre']?>
                Bienvenido <?php echo $_SESSION['nombre']; ?>
                <?//php echo $tomador; ?>
              </div>
             
              <div class="form-check form-switch">
                <label class="form-check-label" for="flexSwitchCheckChecked" style="color:white;">Modo oscuro</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                
            </div>
            <a class="btn btn-light fas fa-sign-out-alt" href="../../Servidor/logout.php"></a>
            </div>
          
          </nav>
         
                    
    </header>


    
    <div class="imagen">
        <img  src="../imgs/logoimsaludrecortado.png"  alt="" style="width: 200px; text-align: center;">
    </div>


<br>
<form action="../../Servidor/registrar_usuarios_validados.php" method="POST" class="container form-control" id="envio">
           

            <?php $nombrer='';
                  $cedular='';
                  $cargor='';
                  $fechafinalcontrator='';
                  $supervisorr='';
                  $emailr='';
                  $rolr='';


            ?>

                  
                    <div class="row">
                    <div class="col">
                    <div class="container">




            <?php
            include '../../Servidor/conexion.php';
            $consulta="SELECT * from solicitud_usuario";
            $resultado=mysqli_query($mysqli,$consulta);
                    if($resultado){ while($row = $resultado->fetch_array()){
                        $nombrer = $row['nombre'];
                        
                        $cedular = $row['cedula'];
                        $cargor = $row['cargo'];
                        $fechafinalcontrator = $row['fechafinalcontrato'];
                        $supervisorr = $row['supervisor'];
                        $emailr = $row['email'];
                        $rolr = $row['rol'];
                        
                        $aux= $nombrer;
                        ?>


                  

                    <input type="text" name="nombre" id="nombre" class="emerge" value="<?php echo $nombrer?>">
                    <input type="text" name="cedula" id="cedula" class="emerge" value="<?php echo $cedular?>">
                    <input type="text" name="cargo" id="cargo" class="emerge" value="<?php  echo $cargor?>">
                    <input type="text" name="fechafinalcontrato" id="fechafinalcontrato" class="emerge" value="<?php echo $fechafinalcontrator?>">
                    <input type="text" name="supervisor" id="supervisor" class="emerge" value="<?php echo $supervisorr?>">
                    <input type="text" name="email" id="email" class="emerge" value="<?php echo $emailr?>">
                    <input type="text" name="administrador" id="administrador" class="emerge" value="<?php echo $rolr?>">
                    
                    <button type="submit" class="fa-sharp fa-solid fa-check btn btn-success" id="registro"  onclick="envio();"></button>
                    <button  class="fa-sharp fa-solid fa-x btn btn-danger" id="registro" onclick="detener();"></button>
                     <br> <br>
                    
                   
                   


                    
                    <?php
                  }
                    
                  } ?>

</div>

                      <!-- TRAERME LOS DATOS CON DIVS PARA EVITAR ERROR DE CONSULTA Y VALIDADOR-->
                      <!--   -->
                      </div>
                  </div>
                    </form>
         
       
                    <?php if($nombrer==''){
                  ?><center style="color: grey;"> <b> <?php echo "No hay solicitudes actuales"; }?> </b>
                  </center> 


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
       <script src="https://kit.fontawesome.com/9ea064c718.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>