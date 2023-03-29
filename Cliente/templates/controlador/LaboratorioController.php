<?php
include '../modelo/Laboratorio.php';
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
   $id = $_POST['id'];
   $nombre = $_POST['nombre'];
   $segundonombre = $_POST['segundonombre'];
   $primerapellido = $_POST['primerapellido']; 
   $segundoapellido = $_POST['segundoapellido'];
   $tipodocumento = $_POST['tipodocumento'];
   $cedula = $_POST['cedula']; 
   $lugarexpedicion = $_POST['lugarexpedicion']; 
   $sexo = $_POST['sexo']; 
   $telefono = $_POST['telefono']; 
   $celular = $_POST['celular']; 
   $direccion = $_POST['direccion'];
   $cargo = $_POST['cargo']; 
   $supervisor = $_POST['supervisor']; 
   $correo = $_POST['correo']; 
   $ubicacion_laboral = $_POST['ubicacion_laboral']; 
   $dependencia = $_POST['dependencia']; 
   $tiposolicitud = $_POST['tiposolicitud']; // 
   $aplicativo = $_POST['aplicativo']; //
   $observaciones = $_POST['observaciones']; //
   $observaciones_supervisor = $_POST['observaciones_supervisor'];

   
   $laboratorio->editar($id,$nombre,$segundonombre,$primerapellido,$segundoapellido,$tipodocumento,$cedula,$lugarexpedicion,$sexo,$telefono,$celular,$direccion,$cargo,$supervisor,$correo,$ubicacion_laboral,$dependencia,$tiposolicitud,$aplicativo,$observaciones,$observaciones_supervisor);
   
}
if($_POST['funcion']=="eliminar"){
    $id = $_POST['id'];
    $laboratorio->eliminar($id);
    
 }

