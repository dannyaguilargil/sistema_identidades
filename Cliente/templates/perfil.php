<?php
//MISMO PERFIL PERO CON LA GESTION DE LOS PERMISOS ASIGNADOS
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
  
//VALIDACION DEL ROL Y NOMBRE DE USUARIO POR SEGURIDAD



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
                    <a class="fas fa-id-card nav-link" href="paz_salvo.php" disabled>Paz y salvo</a>
                  
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
            


<div class="imagen">
            <img  src="../imgs/153.png"  alt="" style="width: 200px; text-align: center;">
        </div>
<br>
<div class="container">
  <div class="row">
  <div class="col">
    <form action="../../Servidor/actualizar_usuario_perfil.php" method="POST"  id="formulario">
       <div class="container form-control" >
       <center><h6 class=""><b>Modificacion de datos del perfil</b></h6> </center>


       <br>

    
<!-- parte derecha de modficar datos de perfil --->
        <div class="row">

      

            
            
               
    
                  
              <div class="col">
                <input type="hidden" class="form-control" name="nombre" id="nombre" placeholder="Digite nombre" value="<?php echo $nombrer;?>">
                <label for="cargo" class="">Cargo o N° del contrato</label>
                <input type="text text-center" class="form-control" name="cargo" id="cargo" placeholder="Digite cargo" value="<?php echo $cargor;?>"><br>
              </div>
                  
              <div class="col">
                <label for="fechafinalcontrato" class="">Fecha final de contrato</label>
                <input type="date" class="form-control" name="fechafinalcontrato" id="fechafinalcontrato" value="<?php echo $fechafinalcontrator;?>"><br>
              </div>

<!--
              <div class="col">
                <label for="supervisor" class="">Supervisor</label>
                <input type="text" class="form-control" name="supervisor" id="supervisor" placeholder="Supervisor" value="<?php echo $supervisorr;?>"><br>
              </div>

                  -->
             
        </div>


          <div class="row">
             
              
             
          <!-- CAMBIOS EN LA VALIDACION DE LAS DOS CONTRASEÑAS -->
          <div class="col" id=grupo__password>
              <label class="" for="password">Cambio de contraseña</label>
              <div class="formulario__grupo-input">
                <input type="password" class="form-control formulario__input" name="password" id="password" placeholder="Digite contraseña nueva" required>
                <i class="formulario__validacion-estado fas fa-time-circle"></i>
              </div>
              <p class="formulario__input-error">La contraseña debe ser de 4 a 12 digitos</p> 
           </div>
           <!-- CAMBIOS EN LA VALIDACION DE LAS DOS CONTRASEÑAS -->




              <!-- CAMBIOS EN LA VALIDACION DE LAS DOS CONTRASEÑAS -->
              <div class="col" id=grupo__password2>
                <label for="password2" class="">Cambio de contraseña</label>
                <div class="formulario__grupo-input">
                <input type="password" class="form-control formulario__input" name="password2" id="password2" placeholder="Repetir contraseña nueva" required>
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




  <div class="col">
       <div class="container form-control" >
       <center><h6 class=""><b>Gestion de permisos asignados</b></h6> </center>

      <!--
<center style="color:red;"> <b class="fal fa-frown-open"> <?php  //echo "ERROR DE CREDENCIALES"; ?></center></b> 

                  -->

        <div class="row">
<?php
        $totalr2 = '';  //cCONSULTA PARA NOTIFICAR SI NO TIENE SISTEMAS ASIGNADOS
            $consulta4="SELECT COUNT(*) FROM sistema_validado_admin WHERE nombre='$tomador';";
            $resultado4=mysqli_query($mysqli,$consulta4);
               if($resultado4){ while($row = $resultado4->fetch_array()){
                  $totalr2 = $row['COUNT(*)'];
                  }
                } 
                   //cCONSULTA PARA NOTIFICAR SI NO TIENE SISTEMAS ASIGNADOS  

                   if($totalr2<1){
                    ?><center style="color:red;"> <b class="fal fa-frown-open"> <?php  echo "NO TIENE SISTEMAS APROBADOS"; ?></center></b> 
                   <?php }
?>
    
  <table class="table caption-top">
  <caption>Sistemas aprobados</caption>
  <tr class="tre">
                    <th>APLICATIVO</th>
                    <th>PERMISO</th> <!-- -->
                    <th>PERFIL</th>
                  <!--  <th>EQUIPOS</th> -->
                    <th>VENCIMIENTO</th>
                    <th>ACCION</th>
    </tr>

  <!-- LOGICA PHP PARA LA GESTION DE LOS PERMISOS-->
  <?php
           /* $consulta="SELECT pazysalvo_aprobar.nombre,pazysalvo_aprobar.cedula,sistema_validado_admin.tiposolicitud,sistema_validado_admin.aplicativo,usuarios_registrados.fechafinalcontrato,pazysalvo_aprobar.revocar_permisos from pazysalvo_aprobar
            INNER JOIN sistema_validado_admin ON pazysalvo_aprobar.cedula=sistema_validado_admin.cedula
            INNER JOIN usuarios_registrados ON sistema_validado_admin.cedula=usuarios_registrados.cedula;";*/

            //cambiarlo por el nombre completo
            ////pendiente perfil,fechafinalcontrato
            //select aplicativo,tiposolicitud
            $consulta3="SELECT * FROM sistema_validado_admin WHERE nombre='$tomador';";
            $resultado3=mysqli_query($mysqli,$consulta3);

            if($resultado3){ while($row = $resultado3->fetch_array()){
                $aplicativo = $row['aplicativo']; //aqui va aplicativo
                $tiposolicitud = $row['tiposolicitud'];
                
                
              //CONSULTA PARA TRAER LOS APLICATIVOS QUE TIENE YA ASIGNADO 
?>
              <?php //consulta para no mostrar tabla y decir que no tiene perfiles asignados
         
          
              
              
              
              ?>
              <td><?php echo $aplicativo;?></td>
              <td><?php echo $tiposolicitud; ?></td>
              <td><?php echo 'USUARI0'; ?></td>
              <td><?php echo '31 DE JUNIO 2022'; ?></td>
              <td> <a class="btn btn-success"  href="sistemas_solicitud_usuario.php">RENOVAR</a>  </td>

            </tr>

<?php
            }
          }
        
          
            ?>




   
</table>
             
          
        
        </div>
         
   
  </div>
  </div>
  
</div>


<!--
<footer >
        
        <center>
       <div class="container ultimo">
       Todo los derechos reservados E.S.E IMSALUD &copy / SISTEMAS
       
       </div>
       </center>        
               
 </footer>
                  -->


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