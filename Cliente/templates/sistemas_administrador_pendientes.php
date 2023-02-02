<?php
session_start();
include '../../Servidor/conexion.php'; 


$tomador=$_SESSION['nombre'];
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
  
//VALIDACION DEL ROL Y NOMBRE DE USUARIO POR SEGURIDAD DE ACCESOS NO AUTORIZADOS




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
    <link rel="stylesheet" href="../css/sistemas_supervisor.css">
    <link rel="icon" href="../imgs/escudito.ico">
    <title>Sistemas pendientes Supervisor</title>
</head>
<body>
  
    <header class="">


    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

        
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           
            
           
            
              <li class="nav-item dropdown">
                <a class="fas fa-phone-laptop nav-link dropdown-toggle btn-lg" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Sistemas 
                </a>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="sistemas_solicitud_supervisor.php">Solicitud</a></li>
                  <li><a class="dropdown-item" href="sistemas_administrador_pendientes.php">Administrador pendientes</a></li>
                  <li><a class="dropdown-item" href="sistemas_supervisor.php">Supervisor</a></li>    


                  <li><hr class="dropdown-divider">
                
                  <li><a class="dropdown-item" href="sistemas_admin_aprobados.php">Aprobados</a></li>
                  <li><a class="dropdown-item" href="sistemas_solicitud_supervisor.php">Notificar sistema</a></li>

                
                
                 </li>
                            
                </ul> 
              </li>


              <li class="nav-item dropdown">
                <a class="fas fa-id-card nav-link dropdown-toggle btn-lg" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Paz y salvos
                </a>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="pazysalvo_aprobados.php">Aprobados</a></li>
                  <li><a class="dropdown-item" href="sistemas_administrador_pendientes.php">Pendientes</a></li>
                  
                 
                </ul> 
              </li>



              <li class="nav-item dropdown">
                <a class="fas fa-users nav-link dropdown-toggle btn-lg" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Usuarios
                </a>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="gestionar_usuarios.php">Aprobados</a></li>
                  <li><a class="dropdown-item" href="usuario_pendientes.php">Pendientes</a></li>
                  <li><hr class="dropdown-divider">
                  <a class="far fa-user-cog nav-link" href="perfil.php" disabled>Mi perfil</a>

                </li>
                 
                </ul> 
              </li>

                    
                
            </ul>
         

        <!--Boton de busqueda AJAX -->
            <form  class="d-flex" action="" method="post">
                        <li class="fas fa-search" for="campo"></li>
                        <!--  <input class="form-control me-2"   type="text" name="campo" id="campo"> -->
                        <input class="form-control me-2"   type="text" name="campo" id="campo" placeholder="Busqueda" aria-label="Search">
                        <a class="btn btn-ougligth-success fas fa-sign-out-alt" href="../../Servidor/logout.php"></a>            </form>
        <!--Boton de busqueda AJAX -->
          


          </div>
        </div>
      </nav>
      <!--NAVBAR-->
                    
    </header>

    <?php 
    
    //CONSULTA DE LA SOLICITUD DEL SUPERVISOR
    $nombre = "";
    $nombrer = '';
    $segundonombrer = '';
    $primerapellidor = '';
    $segundoapellidor = '';
    $tipodocumentor = '';
    $lugarexpedicionr = '';
    $sexor = '';
    $telefonor = '';
    $celularr = '';
    $direccionr = '';
    $supervisorr = '';
    $correor = '';
    $ubicacion_laboralr = '';
    $dependenciar = '';
    //$observacionessupervisorr = '';
    $cedular = 0;
    $cargor = '';
    $tiposolicitudr = '';
    $aplicativor = '';
    $observacionesr = '';
    $idr = 0;
  
   $consulta="SELECT * from solicitud_sistema";
   $resultado=mysqli_query($mysqli,$consulta);
       if($resultado){ while($row = $resultado->fetch_array()){
          $nombrer = $row['nombre'];
          $segundonombrer = $row['segundonombre'];
          $primerapellidor = $row['primerapellido'];
          $segundoapellidor = $row['segundoapellido'];
          $tipodocumentor = $row['tipodocumento'];
          $cedular = $row['cedula'];
          $lugarexpedicionr = $row['lugarexpedicion'];
          $sexor = $row['sexo'];
          $telefonor = $row['telefono'];
          $celularr = $row['celular'];
          $direccionr = $row['direccion'];
          $cargor = $row['cargo'];
          $supervisorr = $row['supervisor'];
          $correor = $row['correo'];
          $ubicacion_laboralr = $row['ubicacion_laboral'];
          $dependenciar = $row['dependencia'];
         
          $tiposolicitudr = $row['tiposolicitud'];
          $aplicativor = $row['aplicativo'];
          $observacionesr = $row['observaciones'];
         // $observaciones_supervisorr = $row['observaciones_supervisor'];
          $idr = $row['id'];
          }
    
        } 
    ?>

   <!-- SEGUNDA CONSULTA DE PHP SOLO PARA TRERME LA FECHA FINAL DE CONTRATO DEL USUARIO SOLICITANTE-->
  <?php
  include '../../Servidor/conexion.php';
  $fechafinalcontrator = ''; 
  
  $consulta2="SELECT fechafinalcontrato from usuarios_registrados WHERE cedula = $cedular;";
  $resultado2=mysqli_query($mysqli,$consulta2);
      if($resultado2){ while($row = $resultado2->fetch_array()){
         $fechafinalcontrator = $row['fechafinalcontrato'];
         }
   
       } 
  
       $totalr = ''; 
  
    //CONSULTA PARA LA NOTIFICACIONES 
    //SELECT COUNT(*) FROM solicitud_sistema;
    $consulta3="SELECT COUNT(*) from solicitud_sistema;";
    $resultado3=mysqli_query($mysqli,$consulta3);
        if($resultado3){ while($row = $resultado3->fetch_array()){
           $totalr = $row['COUNT(*)'];
           }
     
         } 

  ?>


<div class="imagen">
    <img  src="../imgs/logocompleto.png"  alt="" style="width: 120px; text-align: center;height: 50px">
</div>

<center>
            <h5 class="centrar">Sistemas pendientes del supervisor</h5>
            </center>

    <div class="centrar">
        <div class="centrar1 col-sm-10 col-md-10 col-lg-10 col-xl-10">

        <div class="row py-2">
                <div class="col">
                    <table class="table table-light table-striped" name="tabla" name="tabla">
                        <thead>
                            <th>VER</th>
                            <th>ID</th>
                            <th>PRIMER NOMBRE</th>
                            <th>PRIMER APELLIDO</th>
                            <th>SEGUNDO APELLIDO</th>
                            <th>CEDULA</th>
                            <th>UBICACION LABORAL</th>
                            <th>TIPO DE SOLICITUD</th>
                           
                        </thead>

                        
                        <tbody id="content">

                        </tbody>
                    </table>
                </div>
        </div>


<?php // RECORRER EL CONYENIDO DEL ARRAY 

?>

<!-- ESTA BUENO PERO POR AHORA SOLO TOMA EL ULTIMO DIGITO -->

<!-- FIN DE MODALES --> 
<!--Modal de inserccion -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel"><b>Informacion general del colaborador</b></h5>
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

          <div class="row">
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Lugar de expedicion:</b></label>
                <input type="text" class="emerge form-control-sm" id="lugarexpedicion" name="lugarexpedicion" required value="<?php echo $lugarexpedicionr; ?>"> 
              </div>
            </div>
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Sexo:</b></label> 
                <input type="text" class="emerge form-control-sm" id="nombre" name="nombre" required value="<?php echo $sexor; ?>"> 
              </div>
            </div>
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label">Telefono:</label> 
                <input type="text" class="emerge form-control-sm" id="nombre" name="nombre" required value="<?php echo $telefonor; ?>"> 
              </div>
          </div>
      </div>

        <div class="row">
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Celular:</b></label> 
                <input type="text" class="emerge form-control-sm" id="nombre" name="nombre" required value="<?php echo $celularr; ?>"> 
              </div>
            </div>
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Direccion:</b></label> 
                <input type="text" class="emerge form-control-sm" id="nombre" name="nombre" required value="<?php echo $direccionr; ?>"> 
              </div>
            </div>
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Cargo:</b></label> 
                <input type="text" class="emerge form-control-sm" id="nombre" name="nombre" required value="<?php echo $cargor; ?>"> 
              </div>
          </div>
        </div>


        <div class="row">
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Supervisor:</b></label> 
                <input type="text" class="emerge form-control-sm" id="nombre" name="nombre" required value="<?php echo $supervisorr; ?>"> 
              </div>
            </div>
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Correo:</b></label> 
                <input type="text" class="emerge form-control-sm" id="nombre" name="nombre" required value="<?php echo $correor; ?>"> 
              </div>
            </div>
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Ubicacion laboral:</b></label> 
                <input type="text" class="emerge form-control-sm" id="nombre" name="nombre" required value="<?php echo $ubicacion_laboralr; ?>"> 
              </div>
          </div>
</div>

<hr>
          <div class="row">
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Dependencia:</b></label> 
                <input type="text" class="emerge form-control-sm" id="nombre" name="nombre" required value="<?php echo $dependenciar; ?>"> 
              </div>
            </div>
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Tipo de solicitud:</b></label> 
                <input type="text" class="emerge form-control-sm" id="nombre" name="nombre" required value="<?php echo $tiposolicitudr; ?>">
              </div>
            </div>
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Aplicativo:</b></label> 
                <input type="text" class="emerge form-control-sm" id="nombre" name="nombre" required value="<?php echo $aplicativor; ?>"> 
              </div>
          </div>
      </div>

        <div class="row">
            <div class="col">
              <div class="mb-1">
                <label for="nombre" class="emerge col-form-label"><b>Observaciones del solicitante</b></label> 
                <input type="text" class="emerge form-control-sm" id="nombre" name="nombre" required value="<?php echo $observacionesr; ?>"> 
          </div>
            </div>
            <div class="col">
              <div class="mb-1">
                <label for="nombre" style="color: green;" class="emerge col-form-label"><b>Observaciones supervisor:</b></label> 
                <input type="text" class="obs emerge form-control-sm" id="nombre" name="nombre" required placeholder="Digite observaciones obligatorio"> 
              </div>
            </div>
      </div>
       <div class="row">
            <div class="col">
              <div class="mb-1">
                <label for="nombre" style="" class="emerge col-form-label"><b>Firma:</b></label> 
                <input type="text" class="emerge form-control-sm" id="nombre" name="nombre" required value="Firma si lo requiere"> 
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


<!-- EJEMPLO DEL LLAMADO DEL BOTON -->
<!--SCRIPT PARA RECORRER EL ARRAY DE LA TABLA  -->

<script>
        /* Llamando a la función getData() */
        getData()

        /* Escuchar un evento keyup en el campo de entrada y luego llamar a la función getData. */
        document.getElementById("campo").addEventListener("keyup", getData)

        /* Peticion AJAX */
        function getData() {
            let input = document.getElementById("campo").value
            let content = document.getElementById("content")
            let url = "../../Servidor/recolecta_supervisor.php"
            let formaData = new FormData()
            formaData.append('campo', input)

            fetch(url, {
                    method: "POST",
                    body: formaData
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = data
                }).catch(err => console.log(err))
        }
    </script>

<?php 
//CODIGO PHP PARA RECORRER LA TABLA Y SABER EL CONTENIDO
//$num_rows = 0;
//echo $row["nombre"]; ?>

<script>
  //SCRIPT PARA RECORRER LA TABLA Y SABER EL CONTENIDO
  var x = document.getElementById("tabla").rows[0].cells.length;
</script>


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


      <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
      <script src="../js/main3.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>