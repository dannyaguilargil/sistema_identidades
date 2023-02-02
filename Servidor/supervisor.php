<?php

//include 'conexion.php';
$mysqli = new mysqli("localhost", "danny", "danny", "sistema_nuevo");

$supervisor = $_GET['q'];

$resultado = $mysqli->query("SELECT * FROM supervisor WHERE nombre LIKE '%$supervisor%'");

$datos = array();

while ($row=$resultado->fetch_assoc()){

  $datos[] = $row['nombre'];
}

echo json_encode($datos);