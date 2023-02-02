<?php

include 'conexion.php';


$nombre = $_POST["nombre"];
$segundonombre = $_POST["segundonombre"];
$primerapellido = $_POST["primerapellido"];
$segundoapellido = $_POST["segundoapellido"];
$cargo = $_POST["cargo"];
$fechafinalcontrato = $_POST["fechafinalcontrato"]; 
$cedula = $_POST["cedula"];
$supervisor = $_POST["supervisor"];
$email = $_POST["email"];
$rol = $_POST["rol"];



/*
$nombre = $_POST["nombre"];
$cedula = $_POST["cedula"];
$cargo = $_POST["cargo"];
$fechafinalcontrato = $_POST["fechafinalcontrato"]; 
$supervisor = $_POST["supervisor"];
$email = $_POST["email"];
$rol = $_POST["rol"];
*/

$sql="INSERT INTO usuarios_registrados(nombre,segundonombre,primerapellido,segundoapellido,cargo,fechafinalcontrato,cedula,supervisor,email,rol,password) VALUES('$nombre','$segundonombre','$primerapellido','$segundoapellido','$cargo','$fechafinalcontrato','$cedula','$supervisor','$email','$rol',$cedula)";

//$sql="INSERT INTO usuarios_registrados(nombre,cedula) VALUES('$nombre',$cedula)";

$resultado=$mysqli ->query($sql);

if($resultado>0){
   // header("Location:../Vista/vuelos.html");

header("Location:../Cliente/templates/usuarios.php");
//echo '<script type ="text/JavaScript">';  
//echo 'alert("REGISTRO AGEGADO")';  
//echo '</script>';  


//exit();

}else{
    echo 'EROOR AL AGREGAR REGISTRO';
}
?>