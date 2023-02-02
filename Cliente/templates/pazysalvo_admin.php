


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/pazysalvo_acceso.css">
    <link rel="icon" href="../imgs/escudito.ico">
    <title>Paz y salvo admin</title>
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
                  <li><a class="dropdown-item" href="#">Pendientes</a></li>
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




    
   
<div class="imagen">
            <img  src="../imgs/153.png"  alt="" style="width: 200px; text-align: center;">
        </div>


<div class="centrar">




<div class="centrar1 col-sm-6 col-md-6 col-lg-6 col-xl-6">
<div class="form-control form-contro" >
    <a class="btn btn-outline-success" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Solicitudes
    </a>
  


    
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
      
          
            <!-- AQUI DEBO CARGAR LOS DATOS ANTERIORES DEL MISMO USUARIO-->

            <div class="contt">

            <form  action="../../Servidor/pazysalvoregistrar_aprobado.php" method="POST">



            <div class="">
                
              <div class="">
                <label class="TT3" for="cedula">Cedula: </label> <br>
                <input type="text" class="form-control" name="cedula" id="cedula" required><br>
              </div>

            <!-- AQUI DEBO HACERLO CON AJAX PARA HCER LA BUSQUEDA AUTOMATICA Y SABER QUE USUARIO ES-->
           </div>

            <div class="textoI">
              
              <div class="">
                <label for="rfid">Entrega de tarjeta RFID</label> 
                <input type="checkbox" value="SI" name="rfid" id="rfid" selected required>
              </div>
             <br>
              <div class="">
                <label for="equipos">Entrega de equipos</label>
                <input type="checkbox" value="SI" name="equipos" id="equipos" selected required>
              </div>


              
              <button type="submit" class=" btn btn-danger bnn" onclick="envio()">Generar</button>
              </div>
              
              

      
          
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
      function generar(){
        swal("ENVIO EXITOSO!", "SE GENERARA CERTIFICADO!", "success");
      }
</script>

      <script>
      function envio(){
        alert("ENVIO EXITOSO");
      }
     </script>
<!---->


  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>