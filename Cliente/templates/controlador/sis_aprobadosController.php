<?php // REALIZA REGISTRO EN sistema_validado_admin con la informacion del usuario
      // Y Notifica al usuario por el correo con las credenciales creadas
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
   $primerapellido = $_POST['primerapellido']; // 
   $segundoapellido = $_POST['segundoapellido']; // 
   $tipodocumento = $_POST['tipodocumento']; // 

   $lugarexpedicion = $_POST['lugarexpedicion']; // sirve hasta segundo apellido por ahora
   $cedula = $_POST['cedula']; // 

   $aplicativo = $_POST['aplicativo']; // 
   $tiposolicitud = $_POST['tiposolicitud']; // 

   $cargo = $_POST['cargo']; // 
   $observaciones = $_POST['observaciones']; // 

   $perfil = $_POST['perfil']; // 
   $password = $_POST['password']; // 

  // $observaciones_supervisor = $_POST['observaciones_supervisor']; // agregado
   $laboratorio->editar($id,$nombre,$segundonombre,$primerapellido,$segundoapellido,$tipodocumento,$lugarexpedicion,$cedula,$aplicativo,$tiposolicitud,$cargo,$observaciones,$perfil,$password);
   
}
if($_POST['funcion']=="eliminar"){
    $id = $_POST['id'];
    $laboratorio->eliminar($id);
    
 }