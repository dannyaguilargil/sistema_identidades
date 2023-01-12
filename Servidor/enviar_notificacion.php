<?php
session_start();
// AQUI QUIERO GENERAR EL ENVIO DE CORREO POR PHP CON PHP MAILER
//PRIMERAMENTE LO CONFIGURO LOCAL Y DESPUES DESDE EL HOSTING
// VALIDAR TAMBIEN POR SMS


//DATOS QUEE RECIBO PARA MODIFICARLO EN EL SISTEMA

include 'conexion.php';
ini_set("default_charset", "UTF-8");
$nombre = $_POST["nombre"];
$emailreceptor = $_POST["emailreceptor"];
$usuario = $_POST["usuario"];
$password = $_POST["password"];
$mensaje = $_POST["mensaje"];

$body = "Hola: " .$nombre. "<br><br>Aplicativo: <b>" .$mensaje."</b>" . "<br>Usuario: " .$usuario. "<br>Contrasena: " ."<b>".$password."</b>";



//PRUEBA REALIZADA DESDE LOCALHOST, FUNCIONAL
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PhpMailer/src/Exception.php';
require 'PhpMailer/src/PHPMailer.php';
require 'PhpMailer/src/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';
    
    //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'danny.aguilar.gil.2@gmail.com';                     //SMTP username // ESTE SIEMPRE VA A SER EL MISMO
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('danny.aguilar.gil.2@gmail.com','IMSALUD');           //DESDE DONDE SE ENVIA VA A SER EL MISMO
    $mail->addAddress($emailreceptor,$nombre);     //Add a recipient
   // $mail->addAddress('ellen@example.com');               //Name is optional
  
/*
    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    */

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'ALERTA DEL SISTEMA DE ACCESOS';
    $mail->Body    = $body;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
   ?>  <center> <?php echo 'MENSAJE SE ENVIO CORRECTAMENTE'; ?> </center> <?php 
  echo'<script>
        alert("EL MENSAJE SE ENVIO CORRECTAMENTE")
        window.history.go(-1); 
        </script>';


} catch (Exception $e) {
   ?>  <center><?php echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; ?> </center> <?php
}
?>