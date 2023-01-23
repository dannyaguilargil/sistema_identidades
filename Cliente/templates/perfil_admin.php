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
    <link rel="stylesheet" href="../css/perfil_admin.css">
    <link rel="icon" href="../imgs/escudito.ico">
    <title>Perfil administrador</title>
</head>
<body>
<header class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

            <div class="container-fluid">

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
                    <a class="fas fa-users nav-link" href="gestionar_usuarios.php" disabled>Gestion de usuarios</a>
                  </li>
                  <li class="nav-item">
                    <a class="far fa-user-md-chat nav-link" href="sistemas_admin_pendientes.php" disabled>Sistema pendientes</a>
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



    
   



<div class="centrar">


 

        <div class="centrar1 col-sm-6 col-md-6 col-lg-6 col-xl-6">

         
            <div class="form-control form-contro" >

        <div class="imagen">
            <img  src="../imgs/logoimsaludrecortado.png"  alt="" style="width: 200px; text-align: center;">
        </div>
        <br>
            <center><h6 class=""><b>Modificacion de datos del perfil</b></h6> </center>
            <!-- AQUI DEBO CARGAR LOS DATOS ANTERIORES DEL MISMO USUARIO-->

            <form action="../../Servidor/actualizar_usuario_perfil.php" method="POST">

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
            







            <div class="contt">

            <div class="textoI">
              <div class="textoI1">
                <label for="nombre" class="TT3">Nombre: </label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Digite nombre" value="<?php echo $nombrer;?>"><br>
              </div>
              
             
              
              <div class="textoI1">
                <label for="cargo" class="TT3">Cargo: </label>
                <input type="text" class="form-control" name="cargo" id="cargo" placeholder="Digite cargo" value="<?php echo $cargor;?>"><br>
              </div>


              <div class="textoI1">
                <label class="TT3">Contraseña anterior:</label>
                <input type="password" class="form-control" name="telefono" id="telefono1" placeholder="Digite actual"><br>
              </div>

           </div>

            <div class="textoI">
              <div class="textoI1">
                <label for="fechafinalcontrato" class="TT3">Fecha final de contrato </label>
                <input type="date" class="form-control" name="fechafinalcontrato" id="fechafinalcontrato" value="<?php echo $fechafinalcontrator;?>"><br>
              </div>
              
              <div class="textoI1">
                <label for="supervisor" class="TT3">Supervisor: </label>
                <input type="text" class="form-control" name="supervisor" id="supervisor" placeholder="Supervisor" value="<?php echo $supervisorr;?>"><br>
              </div>
              
              <div class="textoI1">
                <label for="password" class="TT3">Contraseña nueva:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Digite nueva">
                
              </div>
              
        
              

            </div>
          </div>

            
          <center><button type="submit" class="text-center btn btn-success" onclick="envio()">Modificar</button></center>
              
            
            </div>
            </form>
        </div>

      </div>

        



      <script>
      function envio(){
        alert("ENVIO EXITOSO");
      }
     
     </script>


    <script src="../js/añadirnodo2.js"></script>



<!---->





</body>
</html>