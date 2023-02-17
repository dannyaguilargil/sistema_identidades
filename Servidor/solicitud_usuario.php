<?php

include 'conexion.php';




$nombre = $_POST["nombre"];
$segundonombre = $_POST["segundonombre"];
$primerapellido = $_POST["primerapellido"];
$segundoapellido = $_POST["segundoapellido"];
$cargo = $_POST["cargo"];
$email = $_POST["email"];
$supervisor = $_POST["supervisor"];
$cedula = $_POST["cedula"];
$tipodocumento = $_POST["tipodocumento"];

$sql="INSERT INTO solicitud_usuario (nombre,segundonombre,primerapellido,segundoapellido,cargo,email,supervisor,cedula,tipodocumento) VALUES('$nombre','$segundonombre','$primerapellido','$segundoapellido','$cargo','$email','$supervisor',$cedula,'$tipodocumento')";

$resultado=$mysqli ->query($sql);

if($resultado>0){
   // header("Location:../Vista/vuelos.html");

  // echo '<script type ="text/JavaScript">';  
  // echo 'alert("SE ENVIO LA SOLICITUD DE USUARIO")';  
  // echo '</script>';  
 // $aux=1;
  // if ($aux>0){
  //  header("Location:../Cliente/templates/gestion_usuarios.php");
  // }
   //echo '<script>window.location.href='../Cliente/templates/gestion_usuarios.php'; </script>';
   //exit();

   //////////SI LO DEJO SOLO SIENDO USER GENERA ERROR EN EL CHECKBOX VALIDAR ESO
   header("Location:../Cliente/templates/login_acceso.php");
   //// OTRA FORMA ENVIANDO LA ALERTA DESDE AQUI

}else{
    echo 'EROOR AL AGREGAR REGISTRO';
}
