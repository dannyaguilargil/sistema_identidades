<?php

require 'database.php';

$con = new Database();
$pdo = $con->conectar();

$sede = $_POST["sede"]; // campo -> sede

$sql = "SELECT id, nombre FROM sede WHERE id LIKE ? OR nombre LIKE ? ORDER BY id ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->execute([$sede . '%', $sede . '%']);

$html = "";

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$html .= "<li onclick=\"mostrar('" . $row["id"] . "')\">" . $row["id"] . " - " . $row["nombre"] . "</li>";
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
