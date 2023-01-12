<?php

include 'conexion.php';

$cedula = $_POST["cedula"];


$sql="UPDATE pazysalvo_aprobar SET revocar_permisos='INACTIVO' WHERE cedula = $cedula;";


$resultado=$mysqli ->query($sql);

if($resultado>0){
   // header("Location:../Vista/vuelos.html");
//alerta de que se agrego el registro
//echo '<script type ="text/JavaScript">';  
//echo 'alert("REGISTRO AGEGADO")';  
//echo '</script>';  
header("Location:../Cliente/templates/permisos.php");

//exit();

}else{
    echo 'EROOR AL ACTUALIZAR PERMISO';
}
?>
