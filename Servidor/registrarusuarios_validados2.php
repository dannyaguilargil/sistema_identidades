<?php

include 'conexion.php';

$nombre='';
//$segundonombre='';
$primerapellido='';
//$segundoapellido='';
$cargo='';
//$email='';
//$supervisor='';
$tipodocumento='';
$cedula='';


////////////////////////////////VLIDACION DE LOS SUBMIT
if (isset($_POST['registro'])) {
$nombre = $_REQUEST["nombre"];
//$segundonombre = $_REQUEST["segundonombre"];
$primerapellido = $_REQUEST["primerapellido"];
//$segundoapellido = $_REQUEST["segundoapellido"];
$cargo = $_REQUEST["cargo"];
//$email = $_REQUEST["email"];
//$supervisor = $_REQUEST["supervisor"];
$tipodocumento = $_REQUEST["tipodocumento"];
$cedula = $_REQUEST["cedula"];

//$email = $_REQUEST["email"];
//$rol = $_REQUEST["rol"];

//$sql="INSERT INTO usuarios_registrados (nombre,segundonombre,primerapellido,segundoapellido,cargo,email,supervisor,cedula,tipodocumento,password) VALUES('$nombre','$segundonombre','$primerapellido','$segundoapellido','$cargo','$email,','$supervisor',$cedula,'$tipodocumento',cedula)";
$sql="INSERT INTO usuarios_registrados (nombre,primerapellido,cargo,tipodocumento,cedula,password) VALUES('$nombre','$primerapellido','$cargo','$tipodocumento',$cedula,cedula)";
$resultado=$mysqli ->query($sql);

$sql2="DELETE FROM solicitud_usuario WHERE cedula = $cedula;";
$resultado=$mysqli ->query($sql2);
}//AQUI AGREGA AL USUARIO Y LO ELIMINA DEL STANDBY

elseif (isset($_POST['eliminar'])) {
$cedula = $_REQUEST["cedula"];
$sql2="DELETE FROM solicitud_usuario WHERE cedula = $cedula;";
$resultado=$mysqli ->query($sql2);

}
if($resultado>0){


header("Location:../Cliente/templates/validar_usuarios.php");
//echo '<script type ="text/JavaScript">';  
//echo 'alert("REGISTRO AGEGADO")';  
//echo '</script>';  
//}


}
//exit();

else{
   echo 'EROOR AL AGREGAR REGISTRO';
}

?>