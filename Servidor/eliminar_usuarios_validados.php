<?php

include 'conexion.php';


$cedula = $_POST["cedula"];

$sql2="DELETE FROM solicitud_usuario WHERE cedula = $cedula;";
$resultado=$mysqli ->query($sql2);


if($resultado>0){

    header("Location:../Cliente/templates/validar_usuarios.php");
//echo '<script type ="text/JavaScript">';  
//echo 'alert("REGISTRO AGEGADO")';  
//echo '</script>';  


//exit();

}else{
    echo 'EROOR AL AGREGAR REGISTRO';
}
?>