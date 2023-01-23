<?php

session_start();



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="icon" href="../imgs/escudito.ico">
    <title>Perfil</title>
</head>
<body>
    <header class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" >

            <div class="container-fluid">
              <a class="far fa-user-cog navbar-brand " href="perfil.php">Mi perfil</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="fas fa-phone-laptop nav-link" aria-current="page" href="sistemas_solicitud_usuario.php">Sistemas</a>
                  </li>
                  <li class="nav-item">
                    <a class="fas fa-id-card nav-link" href="pazysalvo.php" disabled>Paz y salvo</a>
                  
                  </li>
                </ul>
              </div>
            
              <div class="user">
              <?php $tomador=$_SESSION['nombre']?>
                <span class="typed"></span>  <?php echo $_SESSION['nombre'];?>
                <?//php echo $tomador; ?>
              </div>

              <!-- EJEMPLO DE MODO OSCURO -->
              <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch"  id="checkbox" onclick="setDarkMode();">
              <label class="fas fa-moon form-check-label" for="checkbox"></label>
              </div>
            
            <a class="btn btn-light fas fa-sign-out-alt" href="../../Servidor/logout.php"></a>
            </div>
          
          </nav>
         
                    
    </header>






            <!-- AQUI DEBO CARGAR LOS DATOS ANTERIORES DEL MISMO USUARIO-->


            <?php include '../../Servidor/conexion.php'; 
            //codigo php para carga datos del perfil y luego ser modificados
            
            $consulta="SELECT nombre,cargo,fechafinalcontrato,supervisor from usuarios_registrados WHERE nombre = '$tomador';";
            $resultado=mysqli_query($mysqli,$consulta);
                    if($resultado){ while($row = $resultado->fetch_array()){
                        $nombrer = $row['nombre'];
                        $cargor = $row['cargo'];
                        $fechafinalcontrator = $row['fechafinalcontrato'];
                       // $emair = $row['email'];
                        $supervisorr = $row['supervisor'];
                       
  
                      }
                
                    } 
            ?>
            
<br> <br> <br>


<div class="centrar">
  <div class="centrar1 col">
    <form action="../../Servidor/actualizar_usuario_perfil.php" method="POST"  id="formulario">
       <div class="container form-control" >



       


        <div class="imagen">
            <img  src="../imgs/logocompleto.png"  alt="" style="width: 200px; text-align: center;">
        </div>
       <br>

            <center><h6 class=""><b>Modificacion de datos del perfil</b></h6> </center>

<br>

        <div class="row">


            <div class="col">
              <div class="">
                <label for="nombre" class="">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Digite nombre" value="<?php echo $nombrer;?>"><br>
              </div>
            </div>
              
              <div class="col">
                <label for="cargo" class="">Cargo</label>
                <input type="text" class="form-control" name="cargo" id="cargo" placeholder="Digite cargo" value="<?php echo $cargor;?>"><br>
              </div>
                  


              <div class="col">
                <label for="supervisor" class="">Supervisor</label>
                <input type="text" class="form-control" name="supervisor" id="supervisor" placeholder="Supervisor" value="<?php echo $supervisorr;?>"><br>
              </div>


             
        </div>


          <div class="row">
              <div class="col">
                <label for="fechafinalcontrato" class="">Fecha final de contrato</label>
                <input type="date" class="form-control" name="fechafinalcontrato" id="fechafinalcontrato" value="<?php echo $fechafinalcontrator;?>"><br>
              </div>
              
             
          <!-- CAMBIOS EN LA VALIDACION DE LAS DOS CONTRASEÑAS -->
          <div class="col" id=grupo__password>
              <label class="" for="password">Cambio de contraseña</label>
              <div class="formulario__grupo-input">
                <input type="password" class="form-control formulario__input" name="password" id="password" placeholder="Digite contraseña nueva">
                <i class="formulario__validacion-estado fas fa-time-circle"></i>
              </div>
              <p class="formulario__input-error">La contraseña debe ser de 4 a 12 digitos</p> 
           </div>
           <!-- CAMBIOS EN LA VALIDACION DE LAS DOS CONTRASEÑAS -->




              <!-- CAMBIOS EN LA VALIDACION DE LAS DOS CONTRASEÑAS -->
              <div class="col" id=grupo__password2>
                <label for="password2" class="">Cambio de contraseña</label>
                <div class="formulario__grupo-input">
                <input type="password" class="form-control formulario__input" name="password2" id="password2" placeholder="Repetir contraseña nueva">
                <i class="formulario__validacion-estado fas fa-time-circle"></i>
                </div>
                <p class="formulario__input-error">Ambas contraseñas deben ser iguales</p> 
              </div>
              
                    <!--CAMBIOS EN LA VALIDACION DE LAS DOS CONTRASEÑAS -->
              
              </div>
           
         

            <br>
            <center><button type="submit" class="formulario__btn text-center btn btn-success" onclick="envio()">Modificar</button></center>
          
        </div>
    </form>
  </div>
</div>

        



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

<!---->

  <script src="../js/formulario.js"></script>
  <!--
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
      -->
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
  <script src="../js/main.js"></script>
  <script src="../js/repetirdiv.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>