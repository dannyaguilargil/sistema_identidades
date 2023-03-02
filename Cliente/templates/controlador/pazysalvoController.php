<?php // AQUI QUIERO HACER INSERT INTO Y DELETE
include '../modelo/pazysalvo.php';
$laboratorio = new Laboratorio();
if($_POST['funcion']=="listar"){
    $laboratorio->mostrar();
    $json = array();
    foreach ($laboratorio->laboratorios as $data) {
       $json['data'][]=$data;
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

// EDITAR QUE ES INSERTAR
if($_POST['funcion']=="editar"){ // Voy a cambiarlo por insert into 
   //$id = $_POST['id'];
   $nombre = $_POST['nombre'];
   $segundonombre = $_POST['segundonombre'];
   $primerapellido = $_POST['primerapellido']; // 
   $segundoapellido = $_POST['segundoapellido']; // 
 //  $tipodocumento = $_POST['tipodocumento']; // 

  // $lugarexpedicion = $_POST['lugarexpedicion']; // sirve hasta segundo apellido por ahora
   $cedula = $_POST['cedula']; // 
   $rfid = $_POST['rfid']; // 
   $equipos = $_POST['equipos']; // 

   $laboratorio->editar($cedula,$rfid,$equipos);
   
}
//primero hare la opcion de eliminar esa solicitud de paz y salvo
if($_POST['funcion']=="eliminar"){
    $cedula = $_POST['cedula'];
    $laboratorio->eliminar($cedula);
    
 }

