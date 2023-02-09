<?php

include 'conexion.php';
//AGREGARE LA R PARA EVITAR DAÑOS EN LOS DATOS

$nombrer = '';
$segundonombrer = '';
$primerapellidor = '';
$segundoapellidor = '';
$cargor = '';
$fechafinalcontrator = '';
$tipodocumentor = '';
$cedular = '';
$supervisorr = '';
$emailr = '';
$rolr = '';


$nombrer = $_POST["nombrer"];
$segundonombrer = $_POST["segundonombrer"];
$primerapellidor = $_POST["primerapellidor"];
$segundoapellidor = $_POST["segundoapellidor"];
$cargor = $_POST["cargor"];
$fechafinalcontrator = $_POST["fechafinalcontrator"]; 
$tipodocumentor = $_POST["tipodocumentor"];
$cedular = $_POST["cedular"];
$supervisorr = $_POST["supervisorr"];
$emailr = $_POST["emailr"];
$rolr = $_POST["rolr"];



/*
$nombre = $_POST["nombre"];
$cedula = $_POST["cedula"];
$cargo = $_POST["cargo"];
$fechafinalcontrato = $_POST["fechafinalcontrato"]; 
$supervisor = $_POST["supervisor"];
$email = $_POST["email"];
$rol = $_POST["rol"];
*/

$sql="INSERT INTO usuarios_registrados(nombre,segundonombre,primerapellido,segundoapellido,cargo,fechafinalcontrato,tipodocumento,cedula,supervisor,email,rol,password) VALUES('$nombrer','$segundonombrer','$primerapellidor','$segundoapellidor','$cargor','$fechafinalcontrator','$tipodocumentor',$cedular,'$supervisorr','$emailr','$rolr',$cedular)";

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