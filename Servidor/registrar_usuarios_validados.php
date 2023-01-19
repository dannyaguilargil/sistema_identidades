<?php

include 'conexion.php';

$nombre = $_POST["nombre"];
$cedula = $_POST["cedula"];
$cargo = $_POST["cargo"];
$fechafinalcontrato = $_POST["fechafinalcontrato"];
$supervisor = $_POST["supervisor"];
$email = $_POST["email"];
$rol = $_POST["administrador"];

//if(isset($POST['registro'])){

$sql="INSERT INTO usuarios_registrados(nombre,cedula,cargo,fechafinalcontrato,supervisor,email,rol,password) VALUES('$nombre',$cedula,'$cargo','$fechafinalcontrato','$supervisor','$email','$rol',cedula)";
$resultado=$mysqli ->query($sql);

if($resultado>0){

  $sql2="DELETE FROM solicitud_usuario WHERE cedula = $cedula;";
   $resultado=$mysqli ->query($sql2);
    //ELIMINARLO DEL STANDBY

 header("Location:../Cliente/templates/validar_usuarios.php");
//echo '<script type ="text/JavaScript">';  
//echo 'alert("REGISTRO AGEGADO")';  
//echo '</script>';  
//}
}
//exit();




else{
    echo 'EROOR AL AGREGAR REGISTRO';
}

?>