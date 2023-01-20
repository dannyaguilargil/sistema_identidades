<?php

include 'conexion.php';


$nombre = '';
$cedula = '';
$cargo = '';
$tiposolicitud = '';
$aplicativo = '';
$observaciones = '';
$id = 0;


// DEBO CARGAR LOS DATOS PREVIOS DEL USUARIO Y POSTERIOR A ESO HACER EL REGISTRO DEL SISTEMA
if (isset($_POST['registro'])){
$nombre = $_REQUEST["nombre"];
$cedula = $_REQUEST["cedula"]; 
$cargo = $_REQUEST["cargo"];
$tiposolicitud = $_REQUEST["tiposolicitud"];
$aplicativo = $_REQUEST["aplicativo"];
$observaciones = $_REQUEST["observaciones"];
//$observaciones_supervisor = $_POST["observaciones_supervisor"];
//$fechafinalcontrato = $_POST["fechafinalcontrato"];
//$supervisor = $_POST["supervisor"];

$sql="INSERT INTO sistema_validado_admin(nombre,cedula,cargo,tiposolicitud,aplicativo,observaciones) VALUES('$nombre',$cedula,'$cargo','$tiposolicitud','$aplicativo','$observaciones')";
$resultado=$mysqli ->query($sql);

$sql2="DELETE FROM sistema_validado_supervisor WHERE cedula = $cedula;";
$resultado2=$mysqli ->query($sql2);
}

elseif (isset($_POST['eliminar'])){
$id = $_REQUEST["id"];
$sql2="DELETE FROM sistema_validado_supervisor WHERE id = $id;";
$resultado=$mysqli ->query($sql2);
}

if($resultado>0){
   

echo header("Location:../Cliente/templates/notificar_sistema.php");


//exit();

}else{
    echo 'EROOR AL AGREGAR REGISTRO';
}
?>