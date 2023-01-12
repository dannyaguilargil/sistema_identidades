    <?php

include 'conexion.php';

// DEBO CARGAR LOS DATOS PREVIOS DEL USUARIO Y POSTERIOR A ESO HACER EL REGISTRO DEL SISTEMA
$nombre = $_POST["nombre"];
$cedula = $_POST["cedula"]; 
$revocar_permisos = $_POST["revocar_permisos"]; 


$sql="INSERT INTO pazysalvo_solicitud VALUES('$nombre',$cedula,'$revocar_permisos')";

$resultado=$mysqli ->query($sql);

if($resultado>0){
   // header("Location:../Vista/vuelos.html");
    $sql2="INSERT INTO pazysalvo_aprobar(nombre,cedula,revocar_permisos) VALUES('$nombre',$cedula,'$revocar_permisos')";

    $resultado2=$mysqli ->query($sql2);

echo header("Location:../Cliente/templates/sistemas_solicitud_usuario.php");


//exit();

}else{
    echo 'EROOR AL AGREGAR REGISTRO';
}
?>