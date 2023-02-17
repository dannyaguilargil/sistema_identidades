<?php

include 'conexion.php';

// DEBO CARGAR LOS DATOS PREVIOS DEL USUARIO Y POSTERIOR A ESO HACER EL REGISTRO DEL SISTEMA
$nombre = $_POST["nombre"];
$segundonombre = $_POST["segundonombre"];
$primerapellido = $_POST["primerapellido"];
$segundoapellido = $_POST["segundoapellido"];
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
$dependencia = $_POST["dependencia"];
$tiposolicitud = $_POST["tiposolicitud"];
$aplicativo = $_POST["aplicativo"];
$observaciones = $_POST["observaciones"];
//AGREGAR OPCION DE LA FIRMA

$sql="INSERT INTO solicitud_sistema (nombre,segundonombre,primerapellido,segundoapellido,tipodocumento,cedula,lugarexpedicion,sexo,telefono,celular,direccion,cargo,supervisor,correo,ubicacion_laboral,dependencia,tiposolicitud,aplicativo,observaciones) VALUES('$nombre','$segundonombre','$primerapellido','$segundoapellido','$tipodocumento',$cedula,'$lugarexpedicion','$sexo',$telefono,$celular,'$direccion','$cargo','$supervisor','$correo','$ubicacion_laboral','$dependencia','$tiposolicitud','$aplicativo','$observaciones')";
$resultado=$mysqli ->query($sql);

$sql2="INSERT INTO sistema_validado_supervisor (nombre,segundonombre,primerapellido,segundoapellido,tipodocumento,cedula,lugarexpedicion,sexo,telefono,celular,direccion,cargo,supervisor,correo,ubicacion_laboral,dependencia,tiposolicitud,aplicativo,observaciones) VALUES('$nombre','$segundonombre','$primerapellido','$segundoapellido','$tipodocumento',$cedula,'$lugarexpedicion','$sexo',$telefono,$celular,'$direccion','$cargo','$supervisor','$correo','$ubicacion_laboral','$dependencia','$tiposolicitud','$aplicativo','$observaciones')";
$resultado2=$mysqli ->query($sql2);
//AQUI DECIDO HACER INSERCCION EN SUPERVISOR TAMBIEN PARA EVITAR EL INSERT INTO



//

if($resultado>0){
 
echo header("Location:../Cliente/templates/sistemas_solicitud_usuario.php");


//exit();

}else{
    echo 'EROOR AL AGREGAR REGISTRO';
}
?>