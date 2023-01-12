<?php

include 'conexion.php';

$nombre = $_POST["nombre"];
$cargo = $_POST["cargo"];
$fechafinalcontrato = $_POST["fechafinalcontrato"];
$supervisor = $_POST["supervisor"];
$password = $_POST["password"];

//para datos string 
//update repuestos SET nombre='casco' where id = 18;
//UPDATE usuarios_registrados SET nombre='DANNY STIVEENS AGUILAR GIL',cargo='TECNICO CONTROL DE ACCESO Y SMS',fechafinalcontrato='31/12/2022',supervisor='LUCAS LIENDO RAMIREZ' WHERE nombre='DANNY';
$sql="UPDATE usuarios_registrados SET nombre='$nombre',cargo='$cargo',fechafinalcontrato='$fechafinalcontrato',supervisor='$supervisor',password='$password' WHERE nombre = '$nombre';";


$resultado=$mysqli ->query($sql);

if($resultado>0){
   // header("Location:../Vista/vuelos.html");
//alerta de que se agrego el registro
//echo '<script type ="text/JavaScript">';  
//echo 'alert("REGISTRO AGEGADO")';  
//echo '</script>';  
//header("Location:../Cliente/templates/perfil.php");
header("Location:logout.php");

//exit();

}else{
    echo 'EROOR AL ACTUALIZAR REPUESTO';
}
?>

