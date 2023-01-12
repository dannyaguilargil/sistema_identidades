<?php
//VALIDAR SI EQUIPOS Y RFID ES IGUAL A SI
// ENTONCES SI ES IGUAL A SI EL HABILITA EL BOTON


include 'conexion.php';

$cedula = $_POST['cedula'];
$rfid = $_POST['rfid'];
$equipos = $_POST['equipos'];

$consulta = "SELECT * from pazysalvo_aprobar";

$resultado = mysqli_query($mysqli, $consulta);

if ($resultado) {
   while ($row = $resultado->fetch_array()) {
     $cedula = $row['cedula'];
     $rfid = $row['rfid'];
     $equipos = $row['equipos'];
  
     if ($email===$email_v and $pass==$pass_v){
       //header("Location:../cliente/vistas/login.html");
     
       header("Location:../cliente/vistas/tienda.html");

       //valida en cascada OJo
     }   
     elseif($email_v = 'admin@hotmail.com'){
       header("Location:../cliente/vistas/inicio.html");
     
     
     
     
     }else{
      // header("Location:../cliente/vistas/tienda.html");
     echo '<script type ="text/JavaScript">';  
     echo 'alert("ACCESO DENEGADO")';  
     echo '</script>';  

     //PENDIENTE CONTENTENER LA ALTERTA Y LUEGO LLEVARLA A LA VISTA

      header("Location:../cliente/vistas/login.html");
     }
   }


 }
