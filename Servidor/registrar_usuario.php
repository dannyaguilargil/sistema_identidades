<?php

include 'conexion.php';


$nombre = $_POST["nombre"];
$cargo = $_POST["cargo"];
$fechafinalcontrato = $_POST["fechafinalcontrato"]; 
$cedula = $_POST["cedula"];
$supervisor = $_POST["supervisor"];
$email = $_POST["email"];
$administrador = $_POST["administrador"];


/*
$nombre = $_POST["nombre"];
$cedula = $_POST["cedula"];
$cargo = $_POST["cargo"];
$fechafinalcontrato = $_POST["fechafinalcontrato"]; 
$supervisor = $_POST["supervisor"];
$email = $_POST["email"];
$rol = $_POST["rol"];
*/

$sql="INSERT INTO usuarios_registrados VALUES('$nombre','$cargo','$fechafinalcontrato','$cedula','$supervisor','$email','$administrador',cedula)";

$resultado=$mysqli ->query($sql);

if($resultado>0){
   // header("Location:../Vista/vuelos.html");

header("Location:../Cliente/templates/gestionar_usuarios.php");
//echo '<script type ="text/JavaScript">';  
//echo 'alert("REGISTRO AGEGADO")';  
//echo '</script>';  


//exit();

}else{
    echo 'EROOR AL AGREGAR REGISTRO';
}
?>