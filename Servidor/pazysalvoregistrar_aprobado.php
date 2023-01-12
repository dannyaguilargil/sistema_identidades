<?php

// hacerle update a paz y salvo aprobado con si 
//UPDATE pazysalvo_aprobar SET rfid='SI',equipos='SI' where cedula=1090492324
include 'conexion.php';

$cedula = $_POST["cedula"];
$rfid = $_POST["rfid"];
$equipos = $_POST["equipos"];


$sql="UPDATE pazysalvo_aprobar SET rfid='$rfid',equipos='$equipos' WHERE cedula = $cedula;";
$resultado=$mysqli ->query($sql);

if($resultado>0){
    $sql2="DELETE FROM pazysalvo_solicitud WHERE cedula = $cedula;";
    $resultado=$mysqli ->query($sql2);

header("Location:../Cliente/templates/pazysalvo_admin.php");

//exit();

}else{
    echo 'EROOR AL ACTUALIZAR PAZ Y SALVO';
}
?>

