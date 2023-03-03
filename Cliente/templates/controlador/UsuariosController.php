<?php
include '../modelo/usuario.php';
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
if($_POST['funcion']=="editar"){
   $cedula = $_POST['cedula'];
   $nombre = $_POST['nombre'];
   $segundonombre = $_POST['segundonombre'];
   $primerapellido = $_POST['primerapellido'];
   $segundoapellido = $_POST['segundoapellido'];
   $rol = $_POST['rol'];
   $email = $_POST['email'];
   //$observaciones_supervisor = $_POST['observaciones_supervisor'];
   $laboratorio->editar($cedula,$nombre,$segundonombre,$primerapellido,$segundoapellido,$rol,$email);
   
}
if($_POST['funcion']=="eliminar"){
    $cedula = $_POST['cedula'];
    $laboratorio->eliminar($cedula);
    
 }

