<?php

include 'conexion.php';


$nombre = '';
$segundonombre = '';
$primerapellido = '';
$segundoapellido = '';
$cedula = '';
$cargo = '';
$tiposolicitud = '';
$aplicativo = '';
$observaciones = '';
$observaciones_supervisor = '';
$id_solicitud = '';

// DEBO CARGAR LOS DATOS PREVIOS DEL USUARIO Y POSTERIOR A ESO HACER EL REGISTRO DEL SISTEMA

if (isset($_POST['registro'])){
$nombre = $_REQUEST["nombre"];
$segundonombre = $_REQUEST["segundonombre"];
$primerapellido = $_REQUEST["primerapellido"];
$segundoapellido = $_REQUEST["segundoapellido"];
$cedula = $_REQUEST["cedula"]; 
$cargo = $_REQUEST["cargo"];
$tiposolicitud = $_REQUEST["tiposolicitud"];
$aplicativo = $_REQUEST["aplicativo"];
$observaciones = $_REQUEST["observaciones"];
$observaciones_supervisor = $_REQUEST["observaciones_supervisor"];
$id_solicitud = $_REQUEST["id_solicitud"];

$sql="INSERT INTO sistema_validado_supervisor(nombre,segundonombre,primerapellido,segundoapellido,cedula,cargo,tiposolicitud,aplicativo,observaciones,observaciones_supervisor,id_solicitud) VALUES('$nombre','$segundonombre','$primerapellido','$segundoapellido',$cedula,'$cargo','$tiposolicitud','$aplicativo','$observaciones','$observaciones_supervisor',$id_solicitud)";
$resultado=$mysqli ->query($sql);

$sql2="DELETE FROM solicitud_sistema WHERE cedula = $cedula;";
$resultado2=$mysqli ->query($sql2);
}    

elseif (isset($_POST['eliminar'])){
$id = $_REQUEST["id"];
$sql2="DELETE FROM solicitud_sistema WHERE id = $id;";
$resultado=$mysqli ->query($sql2);
}

if($resultado>0){

echo header("Location:../Cliente/templates/sistemas_supervisor.php");


//exit();

}else{
    echo 'EROOR AL AGREGAR REGISTRO';
}
?>