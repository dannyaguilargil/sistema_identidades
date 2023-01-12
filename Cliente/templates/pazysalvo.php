
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
    <link rel="stylesheet" href="../css/pazysalvo.css">
    <title>Datos de Usuario</title>
</head>
<body>
    <header class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" >

            <div class="container-fluid">
              <a class="navbar-brand " href="login.html">Generar paz y salvo</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="sistemas_solicitud_usuario.php">Sistemas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="perfil.php" disabled>Mi perfil</a>
                  </li>
                </ul>
              </div>
            

              <div class="user">
                <?php $tomador=$_SESSION['nombre']?>
               <!--  Bienvenido  --><?php //echo $_SESSION['nombre']; ?>
                <?//php echo $tomador; ?>
              </div>



          
              <div class="form-check form-switch">
                <label class="form-check-label" for="flexSwitchCheckChecked">Modo oscuro</label>
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
        
            <h6 class="TT2">Generar paz y salvo</h6> 
            <!-- AQUI DEBO CARGAR LOS DATOS ANTERIORES DEL MISMO USUARIO-->

            <form action="../../Servidor/pazysalvoregistrar_solicitud.php" method="POST">


<!--
  CONSULTAS PARA EL FORMULARIO 
  $resultado = $conn->query($sql);
  $num_rows = $resultado->num_rows;


  -->
<?php include '../../Servidor/conexion.php'; 
//CODIGO PHP DE CONSULTAS
//PRIMERO HAGO LA VALIDACION CON LA CEDULA
$consulta="SELECT nombre,cedula from usuarios_registrados WHERE nombre = '$tomador';";
$resultado=mysqli_query($mysqli,$consulta);
        if($resultado){ while($row = $resultado->fetch_array()){
            $nombrer = $row['nombre'];
            $cedular = $row['cedula'];
          
          }
    
        } 
?>
            <div class="contt">

            <div class="textoI">
              <div class="textoI1">
                <label for="nombre" class="TT3">Nombre: </label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombrer?>"><br>
              </div>
              
              <div class="textoI1">
                <label  for="cedula"  class="TT3">Cedula: </label>
                <input type="text" class="form-control" name="cedula" id="cedula" value="<?php echo $cedular ?>"><br>
              </div>

           </div>



            <div class="textoI">

            <div class="textoI1">
                <label for="revocar_permisos">Revocar permisos</label>
                <input class="check" name="revocar_permisos" id="revocar_permisos" type="checkbox" value="SI" required>
              </div>
              
              <div class="textoI1">
                <label for="">Entrega de tarjeta RFID</label>
                <input class="check"  type="checkbox" value="" disabled>
              </div>
             
              <div class="textoI1">
                <label for="">Entrega de equipos en buen estado</label>
                <input class="check" type="checkbox" value="" disabled>
              </div>


            </div>


            
          </div>

              <!--BOTON QUE APARECE SOLO SI EL PAZ Y SALVO ESTA APROBADO -->

              <?php
              $rfid='';
              // CODIGO PHP PARA HACER LA CONSULTA Y REVISAR SI LOS EQUIPOS Y RFID FUERON GENERADOS
              $consulta="SELECT * from pazysalvo_aprobar WHERE nombre = '$tomador';";
              $resultado=mysqli_query($mysqli,$consulta);
              if($resultado){ while($row = $resultado->fetch_array()){
               $rfid = $row['rfid'];
               $equipos = $row['equipos'];

          }
    
        } 


              if($rfid=='SI'){
                ?> <a target="_blank" href="https://docs.google.com/document/d/1yp0Fu8mMA876BwtjqOdXLxIuyVPXAFLB/edit?usp=sharing&ouid=105725441180783245508&rtpof=true&sd=true" class="btn btn-warning">Descargar</a><?php
              }
              else{
                ?><button type="submit"  class="text-left btn btn-success" onclick="envio()">Solicitar</button> <?php
              }
             
?>





              

              <!--

              AQUI VA EL CODIGO JAVASCRIPT PARA REALIZAR LA VALIDACION DEL PAZ Y SALVO Y GENERAR EL BOTON
              -->
              <?php 
                



            ?>


      </form>
           
            </div>
        </div>

      </div>

        <!--SI AL USUARIO SE LE VALIDA UN PERMISO DE UNA APP ESE PERMISO DE LA APP DEBE REGISTRARSE EN LA BASE DATOS -->








<!---->
<script>
      function envio(){
        alert("PAZ Y SALVO SOLICITADO");
      }
     </script>


      <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
      <script src="../js/main.js"></script>
      <script src="../js/repetirdiv.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>