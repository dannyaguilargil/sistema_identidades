<?php

include 'conexion.php';


$nombre = $_POST['nombre'];
echo $nombre;

$sql="INSERT INTO usuarios_registrados (nombre) VALUES('$nombre')";

$resultado=$mysqli ->query($sql);

if($resultado>0){
    echo 'REGISTRO AGREGADO';
}else{
    echo 'EROOR AL AGREGAR REGISTRO';
}
?>