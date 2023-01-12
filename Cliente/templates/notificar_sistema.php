<?php
session_start();
// AQUI QUIERO GENERAR EL ENVIO DE CORREO POR PHP CON PHP MAILER
//PRIMERAMENTE LO CONFIGURO LOCAL Y DESPUES DESDE EL HOSTING
// VALIDAR TAMBIEN POR SMS
/*

//PRUEBA REALIZADA DESDE LOCALHOST, FUNCIONAL
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../Servidor/PhpMailer/src/Exception.php';
require '../../Servidor/PhpMailer/src/PHPMailer.php';
require '../../Servidor/PhpMailer/src/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';
    
    //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'danny.aguilar.gil.2@gmail.com';                     //SMTP username
    $mail->Password   = 'gyokmwnnvdjlkhvb';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('danny.aguilar.gil.2@gmail.com','IMSALUD');           //DESDE DONDE SE ENVIA
    $mail->addAddress('danny.aguilar.gil@gmail.com','DANNY');     //Add a recipient
   // $mail->addAddress('ellen@example.com');               //Name is optional
  
/*
    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'ALERTA DEL SISTEMA DE ACCESOS';
    $mail->Body    = 'CORREO DE PRUEBA DEL SISTEMA <b>ACCES!</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'MENSAJE SE ENVIO CORRECTAMENTE'; 
} catch (Exception $e) {
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
}
*/
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
    <link rel="stylesheet" href="../css/notificar_sistema.css">
    <link rel="icon" href="imgs/logoimsaludrecortado.ico">
    <title>Notificar sistema</title>
</head>
<body>
  
<header class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

            <div class="container-fluid">

           <!-- <li class="nav-item dropdown"> -->
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="color=green;background:white;">
            Sistemas
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#" style="">Sistemas aprobados</a></li>
            <li><a class="dropdown-item" href="sistemas_admin_pendientes.php">Sistemas pendientes</a></li>
            <li><a class="dropdown-item" href="permisos.php">Revisar permisos</a></li>
            <li><a class="dropdown-item" href="notificar_sistema.php">Notificar sistema aprobado</a></li>
            <li><a class="dropdown-item" href="sistemas_supervisor_admin.php">Opcion de supervisor</a></li>
          </ul>
      <!--  </li> -->





              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="perfil_admin.php">Mi perfil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pazysalvo.php" disabled>Paz y salvo</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="validar_usuarios.php" disabled>Accesos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="gestion_usuario.php" disabled>Gestion de usuarios</a>
                  </li>
                </ul>
              </div>
            

            


              <div class="user" style="color: white">
              ACCESO! <?php echo $_SESSION['nombre']; ?>
             <?php $tomador=$_SESSION['nombre'] ?>
              </div>

          
              <div class="form-check form-switch">
                <label class="form-check-label" for="flexSwitchCheckChecked" style="color: white;">Modo oscuro</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"> 
               </div>
            
               <a class="btn btn-light fas fa-sign-out-alt" href="../../Servidor/logout.php"></a>
            </div>
          
          </nav>
         
                    
    </header>

    <div class="imagen">
    <img  src="../imgs/logocompleto.png"  alt="" style="width: 130px; text-align: center;height: 50px">
    </div>

<div class="centrar">
        <div class="centrar1 col-sm-10 col-md-10 col-lg-10 col-xl-10">
            <div class="container form-control form-control" >
            <h5 class="centrar">Notificar sistema</h5>


            <!-- LA IDEA ES QUE SE PUEDA NOTIFICAR DESDE AQUI SOLO COLOCANDO CEDULA-->
            <!-- CARGA LOS DATOS DEL USUARIO-->
            <!-- SE DEBE PONER USUARIO Y CONTRASEÑA DEL APLICATIVO-->

            <form action="../../Servidor/enviar_notificacion.php" method="POST">


                <!--
                  CONSULTAS PARA EL FORMULARIO 
                  $resultado = $conn->query($sql);
                  $num_rows = $resultado->num_rows;


                  -->
                <?php include '../../Servidor/conexion.php'; 
                //CODIGO PHP DE CONSULTAS
                //PRIMERO HAGO LA VALIDACION CON LA CEDULA
                $consulta="SELECT nombre,cedula,cargo,email,supervisor from usuarios_registrados WHERE nombre = '$tomador';";
                $resultado=mysqli_query($mysqli,$consulta);
                        if($resultado){ while($row = $resultado->fetch_array()){
                            $nombrer = $row['nombre'];
                            $cedular = $row['cedula'];
                            $cargor = $row['cargo'];
                            $emair = $row['email'];
                            $supervisorr = $row['supervisor'];
              
                          }
                    
                        } 
                ?>

                <!-- SEGUNDA CONSULTA DE PHP SOLO PARA TRERME LA FECHA FINAL DE CONTRATO -->

                <fieldset><b>Informacion del colaborador</b></fieldset> 
                <div class="row">
                <div class="col">
                <label for="nombre" class="emerge">Nombre:</label> <br>
                <input type="text" name="nombre" id="nombre" class="emerge">
                </div>
                

                <div class="col">
                <label for="cedula" class="emerge">Correo receptor:</label> <br>
                <input type="email" name="emailreceptor" id="emailreceptor" class="emerge" value="SISTEMAS.ACCESO@IMSALUD.GOV.CO"> 
                </div>



                <div class="col">
                <label for="celular" class="emerge"> Correo Emisor:</label><br>
                <input type="text" name="emailemisor" id="emailemisor" class="emerge" value="DANNY.AGUILAR.GIL.2@GMAIL.COM" required>
                </div>
                </div>
            
                <!-- ESTOS DATOS SON PARA GENERAR EL EMAIL-->
                 <!-- AL COLOCAR LA CEDULA DEBEN CARGAR EL CORREO Y NOMBRE-->

             
                <hr>
                <h6><b>Informacion a notificar</b></h6> 
                <div class="row">
                <div class="col">
                <label for="tiposolicitud" class="emerge">Usuario</label> <br>
                <input type="text" name="usuario" id="usuario">
                </div>

                <div class="col">
                <label for="">Contrasena</label> <br>
                 <input type="text" name="password" id="password">       
                 </div>
               
                <div class="col">
                <label for="observaciones" class="emerge">Mensaje</label> <br>
                <textarea name="mensaje" id="mensaje" cols="2" rows="2" class="obs emerge" style="color: green;" placeholder="Ingrese aplicativo, y ruta" required></textarea>
                </div>

                <br> <br> <br>
                <div class="row">
                <div class="col">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Usuario acepta terminos y condiciones
                    </label>
                  </div>
                </div>

                <div class="col">
                <button class="btn btn-warning">Notificar</button>
                </div>


                <div class="col">
                
                </div>
                </div>

            </form>



          </div>
          </div>
        </div>
</div>






     <script>
      function envio(){
        alert("ENVIO EXITOSO");
      }
     </script>


      <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
      <script src="../js/main.js"></script>
      <script src="../js/repetirdiv.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>