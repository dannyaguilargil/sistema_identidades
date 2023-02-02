<?php // AQUI QUIERO HACER INSERT INTO Y DELETE
include '../modelo/Administra.php';
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
   $id = $_POST['id'];
   $nombre = $_POST['nombre'];
   $segundonombre = $_POST['segundonombre'];
  // $primerapellido = $_POST['primerapellido']; // agregado
  // $segundoapellido = $_POST['segundoapellido']; // agregado
  // $observaciones_supervisor = $_POST['observaciones_supervisor']; // agregado
   $laboratorio->editar($id,$nombre,$segundonombre);
   
}
if($_POST['funcion']=="eliminar"){
    $id = $_POST['id'];
    $laboratorio->eliminar($id);
    
 }

