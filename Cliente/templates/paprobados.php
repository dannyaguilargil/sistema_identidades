<?php

// PAZ Y SALVOS APROBADOS CON EL NUEVO INNER JOIN 
//HACER UN UPDATE CON PAGINACION PARA CAMBIAR LOS ESTADOS Y VISUALIZAR LOS PDFS
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/pazysalvo_aprobados.css">
    <link rel="icon" href="../imgs/escudito.ico">
    <title>Paz y salvos aprobados</title>
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
            <a class="far fa-user-cog navbar-brand " href="perfil.php">Mi perfil</a>
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
    <img  src="../imgs/logocompleto.png"  alt="" style="width: 150px; text-align: center;height: 50px">
    </div>

    <center>
      <h6>Paz y salvos aprobados</h6>
    </center>

    <div class="centrar">
        
        <div class="centrar1 col-sm-10 col-md-10 col-lg-10 col-xl-10">
            <div class="container form-control form-control" >
            <div class="row">
                

      
           
            <table class="table table-hover table-bordered">
            <form action="">   

                    <tr class="tre">
                    <th>NOMBRE</th>
                    <th>CEDULA</th>
                    <th>RFID</th>
                  <!--  <th>EQUIPOS</th> -->
                    <th>PERMISOS</th>
              
                    <th>TIPO</th>
                    <th>APLICATIVO</th>
                    <th>FECHA FINAL DE CONTRATO</th>
                    </tr>


            <!-- CONSULTA CON INNER JOIN-->
            <!-- SELECT * from pazysalvo_aprobar INNER JOIN sistema_validado_admin ON pazysalvo_aprobar.cedula=sistema_validado_admin.cedula;-->
            <?php
            $revocar_permisos = '';
            include '../../Servidor/conexion.php';
            $consulta="SELECT pazysalvo_aprobar.nombre,pazysalvo_aprobar.cedula,sistema_validado_admin.tiposolicitud,sistema_validado_admin.aplicativo,usuarios_registrados.fechafinalcontrato,pazysalvo_aprobar.revocar_permisos,pazysalvo_aprobar.rfid from pazysalvo_aprobar
            INNER JOIN sistema_validado_admin ON pazysalvo_aprobar.cedula=sistema_validado_admin.cedula
            INNER JOIN usuarios_registrados ON sistema_validado_admin.cedula=usuarios_registrados.cedula;";

            $resultado=mysqli_query($mysqli,$consulta);
                    if($resultado){ while($row = $resultado->fetch_array()){
                        $nombre = $row['nombre'];
                        $cedula = $row['cedula'];
                        $revocar_permisos = $row['revocar_permisos'];
                        $rfid = $row['rfid'];
                        //RFID,EQUIPOS,PERMISOS,PDF,FECHAFINALCONTRATO,ESTADO
                        $tiposolicitud = $row['tiposolicitud'];
                        $aplicativo = $row['aplicativo'];
                        $fechafinalcontrato = $row['fechafinalcontrato'];
                       
                        
                        //AQUI REALIZA LA SEGUDA CONSULTA
                        //CONDICIONAL PARA CAMBIAR EL PERMISO POR REVOCAR
                        if($revocar_permisos=='SI'){
                          $revocar_permisos='POR REVOCAR'
                        

                    ?>
 <tr>
                    <td><?php echo $nombre;?></td>
                    <td><?php echo $cedula; ?></td>
                    <td><?php echo $rfid; ?></td>
                    <td><span style="color:red;"><?php echo $revocar_permisos; ?> </span></td>
                <!--    <td> <a href="" class="btn btn-light fas fa-file-pdf"></a> </td> -->
                    <td><?php echo $tiposolicitud; ?></td>
                    <td><?php echo $aplicativo; ?></td>
                    <td><?php echo $fechafinalcontrato; ?></td>
                   
                    </tr>


<?php
                    }
                     } 
                    
                    
                    
                    }
                      ?>
               

               </form>   
            </table>
           

                    
              
         
          </div>
          </div>
          </div>
          </div>



      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>



<?php

//CONSULTAS DE INNNER JOIN

/*
SELECT pazysalvo_aprobar.nombre,pazysalvo_aprobar.cedula,sistema_validado_admin.tiposolicitud from pazysalvo_aprobar INNER JOIN sistema_validado_admin ON pazysalvo_aprobar.cedula=sistema_validado_admin.cedula
*/



/*
SELECT pazysalvo_aprobar.nombre,pazysalvo_aprobar.cedula,sistema_validado_admin.tiposolicitud,sistema_validado_admin.aplicativo from pazysalvo_aprobar INNER JOIN sistema_validado_admin ON pazysalvo_aprobar.cedula=sistema_validado_admin.cedula;

*/

//INNER JOIN CON TRES TABLAS
/*

SELECT pazysalvo_aprobar.nombre,pazysalvo_aprobar.cedula,sistema_validado_admin.tiposolicitud,sistema_validado_admin.aplicativo, usuarios_registrados.fechafinalcontrato from pazysalvo_aprobar INNER JOIN sistema_validado_admin ON pazysalvo_aprobar.cedula=sistema_validado_admin.cedula INNER JOIN usuarios_registrados ON sistema_validado_admin.cedula=usuarios_registrados.cedula;



SELECT pazysalvo_aprobar.nombre,pazysalvo_aprobar.cedula,sistema_validado_admin.tiposolicitud,sistema_validado_admin.aplicativo, usuarios_registrados.fechafinalcontrato from pazysalvo_aprobar INNER JOIN sistema_validado_admin ON pazysalvo_aprobar.cedula=sistema_validado_admin.cedula INNER JOIN usuarios_registrados ON sistema_validado_admin.cedula=usuarios_registrados.cedula;
*/
?>