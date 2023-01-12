<?php

include 'conexion.php';

// DEBO CARGAR LOS DATOS PREVIOS DEL USUARIO Y POSTERIOR A ESO HACER EL REGISTRO DEL SISTEMA
$nombre = $_POST["nombre"];
$tipodocumento = $_POST["tipodocumento"];
$cedula = $_POST["cedula"]; 
$lugarexpedicion = $_POST["lugarexpedicion"];
$sexo = $_POST["sexo"];
$telefono = $_POST["telefono"];
$celular = $_POST["celular"];
$direccion = $_POST["direccion"];
$cargo = $_POST["cargo"];
$supervisor = $_POST["supervisor"];
$correo = $_POST["correo"];
$ubicacion_laboral = $_POST["ubicacion_laboral"];
$tiposolicitud = $_POST["tiposolicitud"];
$aplicativo = $_POST["aplicativo"];
$observaciones = $_POST["observaciones"];

$sql="INSERT INTO solicitud_sistema (nombre,tipodocumento,cedula,lugarexpedicion,sexo,telefono,celular,direccion,cargo,supervisor,correo,ubicacion_laboral,tiposolicitud,aplicativo,observaciones) VALUES('$nombre','$tipodocumento',$cedula,'$lugarexpedicion','$sexo',$telefono,$celular,'$direccion','$cargo','$supervisor','$correo','$ubicacion_laboral','$tiposolicitud','$aplicativo','$observaciones')";

$resultado=$mysqli ->query($sql);

if($resultado>0){
   // header("Location:../Vista/vuelos.html");

echo header("Location:../Cliente/templates/sistemas_solicitud_usuario.php");


//exit();

}else{
    echo 'EROOR AL AGREGAR REGISTRO';
}
?>