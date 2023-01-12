<?php

include 'conexion.php';


$cedula = $_POST["cedula"];
//DELETE FROM repuestos WHERE id = 26; 

$sql="DELETE FROM usuarios_registrados WHERE cedula = $cedula;";

$resultado=$mysqli ->query($sql);

if($resultado>0){
   // header("Location:../Vista/vuelos.html");
//alerta de que se agrego el registro


header("Location:../Cliente/templates/gestion_usuario.php");
echo '<script type ="text/JavaScript">';  
echo 'alert("REGISTRO ELIMINADO")';  
echo '</script>';  
//exit();

}else{
    echo 'EROOR AL ELIMINAR REPUESTO';
}
?>