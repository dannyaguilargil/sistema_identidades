<?php // AQUI QUIERO HACER INSERT INTO Y DELETE
include '../modelo/usuario_pendientes.php';
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
   $tipodocumento = $_POST['tipodocumento']; // 

   $lugarexpedicion = $_POST['lugarexpedicion']; // sirve hasta segundo apellido por ahora
   $cedula = $_POST['cedula']; // 

   $cargo = $_POST['cargo']; // 
   $supervisor = $_POST['supervisor']; // 
   $email = $_POST['email']; // 

  // $observaciones_supervisor = $_POST['observaciones_supervisor']; // agregado
   $laboratorio->editar($nombre,$segundonombre,$primerapellido,$segundoapellido,$tipodocumento,$cedula,$supervisor,$email,$cargo);
   
}
if($_POST['funcion']=="eliminar"){
   //CAMBIARE A LA OPCION DE ELIMINAr EL USUARIO
   // $id = $_POST['id'];
    $cedula = $_POST['cedula'];
    $laboratorio->eliminar($cedula);
    
 }

