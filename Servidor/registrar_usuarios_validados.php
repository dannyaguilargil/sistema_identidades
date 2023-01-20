<?php

include 'conexion.php';

$nombre = '';
$cedula = '';
$cargo = '';
$fechafinalcontrato = '';
$supervisor = '';
//$email = '';
$rol = '';
////////////////////////////////VLIDACION DE LOS SUBMIT
if (isset($_POST['registro'])) {
$nombre = $_REQUEST["nombre"];
$cedula = $_REQUEST["cedula"];
$cargo = $_REQUEST["cargo"];
$fechafinalcontrato = $_REQUEST["fechafinalcontrato"];
$supervisor = $_REQUEST["supervisor"];
$rol = $_REQUEST["rol"];
//$email = $_REQUEST["email"];
//$rol = $_REQUEST["rol"];

$sql="INSERT INTO usuarios_registrados(nombre,cedula,cargo,fechafinalcontrato,supervisor,rol,password) VALUES('$nombre',$cedula,'$cargo','$fechafinalcontrato','$supervisor','$rol',cedula)";
$resultado=$mysqli ->query($sql);

$sql2="DELETE FROM solicitud_usuario WHERE cedula = $cedula;";
$resultado=$mysqli ->query($sql2);
}//AQUI AGREGA AL USUARIO Y LO ELIMINA DEL STANDBY

elseif (isset($_POST['eliminar'])) {
$cedula = $_REQUEST["cedula"];
$sql2="DELETE FROM solicitud_usuario WHERE cedula = $cedula;";
$resultado=$mysqli ->query($sql2);

}
if($resultado>0){


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