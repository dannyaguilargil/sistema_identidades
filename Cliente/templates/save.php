<?php
	include '../../conexion.php';
	$nombre=$_POST['nombre'];
	$cedula=$_POST['cedula'];
	$sql = "INSERT INTO usuarios_registrados ('nombre','cedula') 
	VALUES ('$nombre','$cedula')";
	if (mysqli_query($mysqli, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($mysqli);
?>
 