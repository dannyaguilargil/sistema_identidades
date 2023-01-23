<?php

session_start();
$tomador='';

//ESTE FORMULARIO TIENE LOS DATOS DE SISTEMAS APROBADOS, CON LA FECHA FINAL DE CONTRATO Y ESTADO
// SI EL USUARIO SOLICITO EL PAZ Y SALVO EL ESTADO DEBE CAMBIAR A REVOCAR
// SI EL ADMIN LE GENERO PAZ Y SALVO EL POR REVOCAR PENDIENTE
// Y EN ESTA OPCION DEBE PODER CAMBIARSE A INACTIVO 
// ESTADO CADUCADO ES SI EL PERMISO QUE SE LE ASIGNO ES INFERIOR AL DEL SISTEMA CREADO
include '../../Servidor/conexion.php'; 
$tomador=$_SESSION['nombre'];
//$_SESSION['rol']='rol'
$rolex=$_SESSION['rol'];

//VALIDACION DEL ROL Y NOMBRE DE USUARIO POR SEGURIDAD POR FORMULARIO CON EL FIN DE ACCESOS NO AUTORIZADOS
$totalr = ''; 
$consulta3="SELECT COUNT(*) FROM usuarios_registrados WHERE nombre='$tomador';";
$resultado3=mysqli_query($mysqli,$consulta3);
   if($resultado3){ while($row = $resultado3->fetch_array()){
      $totalr = $row['COUNT(*)'];
      }
    } 
if($totalr<1){
  header("Location: ../../index.php");
}
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
    <link rel="stylesheet" href="../css/gestion_usuarios.css">
    <link rel="icon" href="../imgs/escudito.ico">
    <title>Gestion de permisos</title>
</head>
<body>
<header class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

            <div class="container-fluid">

           <!-- <li class="nav-item dropdown"> -->
          <a class="fas fa-phone-laptop nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="background: white; color:black;">
            Sistemas
          </a>
          <ul class="dropdown-menu">
            <li><a class="fas fa-hospital-user dropdown-item" href="sistemas_admin_aprobados.php" style="">Sistemas aprobados</a></li>
            <li><a class="far fa-user-md-chat dropdown-item" href="sistemas_admin_pendientes.php">Sistemas pendientes</a></li>
            <li><a class="fal fa-user-shield dropdown-item" href="permisos.php">Revisar permisos</a></li>
            <li><a class="fas fa-comment-medical dropdown-item" href="notificar_sistema.php">Notificar sistema aprobado</a></li>
            <li><a class="fas fa-user-hard-hat dropdown-item" href="sistemas_supervisor_admin.php">Opcion de supervisor</a></li>
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
              ADMIN! <?php echo $_SESSION['nombre']; ?>
             <?php $tomador=$_SESSION['nombre'] ?>
              </div>
          


              <button type="button" class="fas fa-user-times modals btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal3" data-bs-whatever="@getbootstrap"></button> 

             
              <div class="form-check form-switch">
                <label class="form-check-label" for="flexSwitchCheckChecked" style="color: white;"></label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"> 
               </div>
               <a class="btn btn-light fas fa-sign-out-alt" href="../../Servidor/logout.php"></a>
            </div>

              
          </nav>
         
          
                    
<!-- Modal de eliminar -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel"><b>Cambiar estado</b></h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
     <form action="../../Servidor/cambiar_estado.php" method="POST">
         
       <div class="mb-1">
           <label for="id" class="col-form-label">Cedula</label>
           <input type="number" class="form-control-sm" id="cedula" name="cedula" required>
      </div>

      
       
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <button type="submit" class="btn btn-danger">Cambiar estado</button>
     </div>
     </form>
   </div>
 </div>
</div>

</div>

    </header>


    
    <div class="imagen">
    <img  src="../imgs/logocompleto.png"  alt="" style="width: 150px; text-align: center;height: 50px">
    </div>


    <div class="centrar">
        
        <div class="centrar1 col-sm-10 col-md-10 col-lg-10 col-xl-10">
            <div class="container form-control form-control" >
            <div class="row">
                

      
           
            <table class="table table-light table-striped">
            <form action="">   

                    <tr class="tre">
                    <th>NOMBRE</th>
                    <th>CEDULA</th>
                    <th>PERMISO</th>
                    <th>APLICATIVO</th>
                    <th>FECHA FINAL DE CONTRATO</th>
                    <th>ESTADO</th>
                    </tr>


            <!-- CONSULTA CON INNER JOIN-->
            <!-- SELECT * from pazysalvo_aprobar INNER JOIN sistema_validado_admin ON pazysalvo_aprobar.cedula=sistema_validado_admin.cedula;-->
            <?php
            $revocar_permisos = '';
            include '../../Servidor/conexion.php';
            $consulta="SELECT pazysalvo_aprobar.nombre,pazysalvo_aprobar.cedula,sistema_validado_admin.tiposolicitud,sistema_validado_admin.aplicativo,usuarios_registrados.fechafinalcontrato,pazysalvo_aprobar.revocar_permisos from pazysalvo_aprobar
            INNER JOIN sistema_validado_admin ON pazysalvo_aprobar.cedula=sistema_validado_admin.cedula
            INNER JOIN usuarios_registrados ON sistema_validado_admin.cedula=usuarios_registrados.cedula;";

            $resultado=mysqli_query($mysqli,$consulta);
                    if($resultado){ while($row = $resultado->fetch_array()){
                        $nombre = $row['nombre'];
                        $cedula = $row['cedula'];
                        $tiposolicitud = $row['tiposolicitud'];
                        $aplicativo = $row['aplicativo'];
                        $fechafinalcontrato = $row['fechafinalcontrato'];
                        $revocar_permisos = $row['revocar_permisos'];
                        
                        //AQUI REALIZA LA SEGUDA CONSULTA
                        //CONDICIONAL PARA CAMBIAR EL PERMISO POR REVOCAR
                        if($revocar_permisos=='SI'){
                          $revocar_permisos='POR REVOCAR'
                        

                    ?>
 <tr>
                    <td><?php echo $nombre;?></td>
                    <td><?php echo $cedula; ?></td>
                    <td><?php echo $tiposolicitud; ?></td>
                    <td><?php echo $aplicativo; ?></td>
                    <td><?php echo $fechafinalcontrato; ?></td>
                    <td><span style="color:red;"><?php echo $revocar_permisos; ?> </span></td>
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