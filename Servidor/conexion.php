<?php

$localhost = 'localhost';
$usuario = 'danny';
$password = 'danny';
$bd = 'sistema_nuevo';

//archivo mysqli configurado
$mysqli = new mysqli($localhost, $usuario, $password, $bd);

if(!$mysqli) {
        echo "ERROR AL CONECTAR A LA BASE DE DATOS";
}
else{
       // echo "CONECTADO A LA BASE DE DATOS";
}