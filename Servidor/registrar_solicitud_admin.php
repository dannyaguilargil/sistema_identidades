<?php

include 'conexion.php';

// DEBO CARGAR LOS DATOS PREVIOS DEL USUARIO Y POSTERIOR A ESO HACER EL REGISTRO DEL SISTEMA
$nombre = $_POST["nombre"];
$cedula = $_POST["cedula"]; 
$cargo = $_POST["cargo"];
$tiposolicitud = $_POST["tiposolicitud"];
$aplicativo = $_POST["aplicativo"];
$observaciones = $_POST["observaciones"];
//$observaciones_supervisor = $_POST["observaciones_supervisor"];
//$fechafinalcontrato = $_POST["fechafinalcontrato"];
//$supervisor = $_POST["supervisor"];

$sql="INSERT INTO sistema_validado_admin(nombre,cedula,cargo,tiposolicitud,aplicativo,observaciones) VALUES('$nombre',$cedula,'$cargo','$tiposolicitud','$aplicativo','$observaciones')";

$resultado=$mysqli ->query($sql);

if($resultado>0){
   // header("Location:../Vista/vuelos.html");

    //ELIMINA LA SOLICITUD
    $sql2="DELETE FROM sistema_validado_supervisor WHERE cedula = $cedula;";
    $resultado2=$mysqli ->query($sql2);
    //

echo header("Location:../Cliente/templates/sistemas_admin_pendientes.php");


//exit();

}else{
    echo 'EROOR AL AGREGAR REGISTRO';
}
?>