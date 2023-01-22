


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/pazysalvo_acceso.css">
    <title>Datos de Usuario</title>
</head>
<body>
<header class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

            <div class="container-fluid">

           <!-- <li class="nav-item dropdown"> -->
          <a class="fas fa-phone-laptop nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="color=green;background:white;">
            Sistemas
          </a>
          <ul class="dropdown-menu">
            <li><a class="fas fa-hospital-user dropdown-item" href="#" style="">Sistemas aprobados</a></li>
            <li><a class="far fa-user-md-chat dropdown-item" href="sistemas_admin_pendientes.php">Sistemas pendientes</a></li>
            <li><a class="fal fa-user-shield dropdown-item" href="#">Revisar permisos</a></li>
            <li><a class="fas fa-comment-medical dropdown-item" href="#">Notificar sistema aprobado</a></li>
            <li><a class="fas fa-user-hard-hat dropdown-item" href="sistemas_supervisor_admin.php">Opcion de supervisor</a></li>
          </ul>
      <!--  </li> -->



              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="perfil_admin.php">Mi perfil</a>
                  </li>
                 

                  <li class="nav-item">
                    <a class="nav-link" href="validar_usuarios.php" disabled>Accesos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="gestion_usuario.php" disabled>Gestion de usuarios</a>
                  </li>
                </ul>
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
    <p>
    <a class="btn btn-warning" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Solicitudes
    </a>
    <a href="pazysalvo_aprobados.php" class="btn btn-success">Ver aprobados</a>
    </p>


    
<div class="collapse" id="collapseExample">
  <div class="card card-body">
  <!-- AQUI VA CONTENIDO PHP-->
  <?php
include '../../Servidor/conexion.php'; 
$nombre='';
$cedula='';

$consulta="SELECT * from pazysalvo_solicitud;";
$resultado=mysqli_query($mysqli,$consulta);
if($resultado){ while($row = $resultado->fetch_array()){
 $nombre = $row['nombre'];
 $cedula = $row['cedula'];


echo $nombre, " "; 
echo $cedula; ?> <br> <?php
}
} 


?>

   <!-- AQUI VAN LAS SOLICITUDES DE LOS PAZ Y SALVOS SOLICITUDES -->


  </div>
</div>
            <!-- AQUI VA UN POPUP QUE SE DESLIZA PARA VER QUIEN SOLICITO PAZ Y SALVO-->
            <!-- Y CON ESA CEDULA SE LE APRUEBA  -->
<br>
      
            <h5 class="TT2">Generar paz y salvo</h5> 
            <!-- AQUI DEBO CARGAR LOS DATOS ANTERIORES DEL MISMO USUARIO-->

            <div class="contt">

            <form  action="../../Servidor/pazysalvoregistrar_aprobado.php" method="POST">



            <div class="textoI">
                
              <div class="textoI1">
                <label class="TT3" for="cedula">Cedula: </label>
                <input type="text" class="form-control" name="cedula" id="cedula"><br>
              </div>

            <!-- AQUI DEBO HACERLO CON AJAX PARA HCER LA BUSQUEDA AUTOMATICA Y SABER QUE USUARIO ES-->
           </div>

            <div class="textoI">
              
              <div class="textoI1">
                <label for="rfid">Entrega de tarjeta RFID</label>
                <input type="checkbox" value="SI" name="rfid" id="rfid" selected required>
              </div>
             
              <div class="textoI1">
                <label for="equipos">Entrega de equipos en buen estado</label>
                <input type="checkbox" value="SI" name="equipos" id="equipos" selected required>
              </div>
              </div>
              
              <button type="submit" class="text-center btn btn-danger bnn" onclick="moddatos()">Generar</button>
              

      
          
              <!--

                EL CUADRO DEBE IR MAS PEQUEÑO POR QUE ES SOLO ACCESO

              -->
              </form>
           
              </div>
              </div>

              </div>



        <!--SI AL USUARIO SE LE VALIDA UN PERMISO DE UNA APP ESE PERMISO DE LA APP DEBE REGISTRARSE EN LA BASE DATOS -->



      <script>
        function pazysalvo(){
          
        }
      </script>



      <script>
      function envio(){
        alert("ENVIO EXITOSO");
      }
     </script>
<!---->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>