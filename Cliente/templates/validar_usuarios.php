<!-- VOY A PERMITIR PRIMERO REGISTRAR ESE USUARIO VALIDADO-->
<?php
session_start();
include '../../Servidor/conexion.php'; 
?>


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
    <link rel="icon" href="../imgs/escudito.ico">
    <title>Validar usuarios</title>
</head>
<body>
  
    <header class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand " href="validar_usuarios.php">Accesos</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="sistemas_admin_pendientes.php">Sistemas</a>
                  </li>
                  <li class="nav-item">
                    <a class=" nav-link" href="pazysalvo_admin.php" disabled>Paz y salvo</a>
                  </li>
                  <li class="nav-item">
                    <a class=" nav-link" href="perfil_admin.php" disabled>Mi perfil</a>
                  </li>
                  <li class="nav-item">
                    <a class=" nav-link" href="gestionar_usuarios.php" disabled>Gestion de usuarios</a>
                  </li>
                </ul>
              
              </div>

              
              
              <div class="user" style="color: white;">
                <?php $tomador=$_SESSION['nombre']?>
                Bienvenido <?php echo $_SESSION['nombre']; ?>
                <?//php echo $tomador; ?>
              </div>
              
              

              <div class="form-check form-switch">
                <label class="form-check-label" for="flexSwitchCheckChecked" style="color:white;"></label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
               
            </div>
            <a class="btn btn-light fas fa-sign-out-alt" href="../../Servidor/logout.php"></a>
            </div>
          

           
          </nav>
         
                    
    </header>


    
    <div class="imagen">
        <img  src="../imgs/logocompleto.png"  alt="" style="width: 200px; text-align: center;">
        
    </div>
<br>
    <center>
      <h5>Gestión de Accesos al sistema</h5>
    </center>
<br>



<?php
    $totalr = ''; 
  
    //CONSULTA PARA LA NOTIFICACIONES 
    //SELECT COUNT(*) FROM solicitud_sistema;
    $consulta3="SELECT COUNT(*) from solicitud_usuario;";
    $resultado3=mysqli_query($mysqli,$consulta3);
        if($resultado3){ while($row = $resultado3->fetch_array()){
           $totalr = $row['COUNT(*)'];
           }
     
         } 
  
  ?>



<div class="container notificador">
          <button type="button" class="btn btn-dark position-relative">
           En cola
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          <?php echo $totalr; ?>
          <span class="visually-hidden">unread messages</span>
          </span>
          </button>
</div>


<form action="../../Servidor/registrar_usuarios_validados.php" method="POST" class="container form-control" id="form">
           

            <?php $nombrer='';
                  $segundonombrer='';
                  $primerapellidor='';
                  $segundoapellidor='';
                  $cargor='';
                  $emailr='';
                  $supervisorr='';
                  $cedular='';
                  $tipodocumentor='';

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
                        $segundonombrer = $row['segundonombre'];
                        $primerapellidor = $row['primerapellido'];
                        $segundoapellidor = $row['segundoapellido'];
                        $cargor = $row['cargo'];
                        $emailr = $row['email'];
                        $supervisorr = $row['supervisor'];
                        $cedular = $row['cedula'];
                        $tipodocumentor = $row['tipodocumento'];
                 
                        
                        //$aux= $nombrer;
                        ?>
                    
                    <?php
                    //muestro resultados de validacion de usuario
                  }
                    
                  } ?>

                  <?php if($nombrer==''){
                  ?><center style="color: red;"> <b> <?php echo "No hay solicitudes actuales"; }?> </b>
              </center> 


                      <!-- TRAERME LOS DATOS CON DIVS PARA EVITAR ERROR DE CONSULTA Y VALIDADOR-->
                      <!--   -->
                      <br>
                   
                      <div class="row">

                      <div class="col">
                      <label class=""><b>Primer nombre:</b></label> <br>
                      <input type="text" name="nombre" id="nombre" class="emerge" value="<?php echo $nombrer?>">
                      </div>

                      <div class="col">
                      <label class=""><b>Segundo Nombre:</b></label> <br>
                      <input type="text" name="segundonombre" id="segundonombre" class="emerge" value="<?php echo $segundonombrer?>">
                      </div>

                      <div class="col">
                      <label class=""><b>Primer apellido:</b></label> <br>
                      <input type="text" name="primerapellido" id="primerapellido" class="emerge" value="<?php  echo $primerapellidor?>">
                      </div>


                      <div class="col">
                      <label class=""><b>Segundo apellido:</b></label> <br>
                      <input type="text" name="segundoapellido" id="segundoapellido" class="emerge" value="<?php  echo $segundoapellidor?>">
                      </div>



                      <div class="col">
                      <label class=""><b>Cargo /N° contrato:</b></label> <br>
                      <input type="text" name="cargo" id="cargo" class="emerge" value="<?php echo $cargor?>">
                      </div>


                      <div class="col">
                        <br>
                      <button type="submit" class="fa-sharp fa-solid fa-check btn btn-success" name="registro" id="registro"  onclick="envio();"></button>
                      
                      </div>


                      
                      </div>

                      <br>
                      <div class="row">
                    

                      <div class="col">
                      <label class=""><b>Email:</b></label> <br>
                      <input type="text" name="email" id="email" class="emerge" value="<?php echo $emailr?>">
                      </div>

                      <div class="col">
                      <label class=""><b>Supervisor:</b></label> <br>
                      <input type="text" name="supervisor" id="supervisor" class="emerge" value="<?php echo $supervisorr?>">
                      </div>


                      <div class="col">
                      <label class=""><b>Cedula:</b></label> <br>
                      <input type="number" name="cedula" id="cedula" class="emerge" value="<?php echo $cedular?>">
                      </div>
                      <div class="col">
                      <label class=""><b>Tipo de documento:</b></label> <br>
                      <input type="text" name="tipodocumento" id="tipodocumento" class="emerge" value="<?php echo $tipodocumentor?>">
                      </div>


                      <div class="col">
                        <br>
                      <button type="submit" class="fa-sharp fa-solid fa-x btn btn-danger" name="eliminar" id="eliminar" onclick="envio();"></button>
                      </div>
                      </div>

                    
                    
                    
             


                     <br> <br>
                    </div>
                   
                    
                    <?php 
                      ?> 

                   </div>
                   
                  </div>
                    </form>
         
       



      <script>
        function detenerr(){
          const form= document.getElementById("envio");

          form.addEventListener("submit", function(event){
            console.log(event);
            event.preventDefault();
            alert("EN DESAROLLO ")
          }
          )
         // window.location="../../Servidor/eliminar_usuarios_validadosjs.php";


          
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
          console.log("se ejecuto envio alerta 1");
          const nombre = document.getElementById("nombre");
         // const form = document.getElementById("form")
        //  const tipodocumento = document.getElement("tipodocumento")
        //  const cedula = document.getElementById("cedula")
        //  const lugarexpedicion = document.getElementById("lugarexpedicion")
        //  const sexo = document.getElementById("sexo")
       // const telefono = document.getElementById("telefono")
       // const celular = document.getElementById("celular")
      //  const direccion = document.getElementById("direccion")
        //  const cargo = document.getElementById("cargo")
        //  const supervisor = document.getElementById("supervisor")
        //  const correo = document.getElementById("correo")
       // const ubicacion_laboral = document.getElementById("ubicacion_laboral")
        //  const tiposolicitud = document.getElementById("tiposolicitud")
        //  const aplicativo = document.getElementById("aplicativo")
       // const observaciones = document.getElementById("observaciones")

          form.addEventListener("submit", e=>{
         
            if(nombre.value.length<3){
              console.log("entro al condicional")
              e.preventDefault()
              swal("NO ENVIADO!", "NO HAY USUARIOS PENDIENTES!", "error");
             
            }
            else{
              alert("ENVIADO CORRECTAMENTE");
              
            }
          });
      
        

        
      }


     </script>

      
      <script>
      function envio2(){
        alert("SE ELIMINARA AL USUARIO");
      }

     </script>
      
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
       <script src="https://kit.fontawesome.com/9ea064c718.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>