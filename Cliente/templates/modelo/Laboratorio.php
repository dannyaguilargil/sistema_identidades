<?php
//CAMBIARE LA GESTION DE SUPERVISOR CON LA SOLICITUDES DE SISTEMA Y ESA SOLICTUD 
include_once 'conexion.php';
class Laboratorio{
    var $laboratorios;
    public function __construct(){
        $this->acceso = Conexion::conectar();
    }
    function mostrar(){ ///voy hacerlo solo que muestre
        $sql="SELECT * FROM solicitud_sistema"; //cambie el nombre de la tabla
        $resultado = $this->acceso->query($sql);
        $this->laboratorios = $resultado->fetch_all(MYSQLI_ASSOC);
        return $this->laboratorios;
    }

    function editar($id,$nombre,$segundonombre,$primerapellido,$segundoapellido,$tipodocumento,$cedula,$lugarexpedicion,$sexo,$telefono,$celular,$direccion,$cargo,$supervisor,$correo,$ubicacion_laboral,$dependencia,$tiposolicitud,$aplicativo,$observaciones,$observaciones_supervisor){
        //EN VES DE HACER UPDATE HACER INSERT INTO AL SISTEMA VALIDADO SUPERVISOR
       // $sql="UPDATE sistema_validado_supervisor SET nombre='$nombre',segundonombre='$segundonombre',primerapellido='$primerapellido',segundoapellido='$segundoapellido',observaciones_supervisor='$observaciones_supervisor' where id='$id'";
       // $resultado = $this->acceso->query($sql);

        $sql="INSERT INTO sistema_validado_supervisor (id,nombre,segundonombre,primerapellido,segundoapellido,tipodocumento,cedula,lugarexpedicion,sexo,telefono,celular,direccion,cargo,supervisor,correo,ubicacion_laboral,dependencia,tiposolicitud,aplicativo,observaciones,observaciones_supervisor) VALUES ($id,'$nombre','$segundonombre','$primerapellido','$segundoapellido','$tipodocumento',$cedula,'$lugarexpedicion','$sexo',$telefono,$celular,'$direccion','$cargo','$supervisor','$correo','$ubicacion_laboral','$dependencia','$tiposolicitud','$aplicativo','$observaciones','$observaciones_supervisor')";
        $resultado = $this->acceso->query($sql);

       // $sql="INSERT INTO usuarios_registrados (nombre,segundonombre,primerapellido,segundoapellido,tipodocumento,cedula,supervisor,email,cargo,password) VALUES ('$nombre','$segundonombre','$primerapellido','$segundoapellido','$tipodocumento',$cedula,'$supervisor','$email','$cargo',cedula)";
     //   $resultado = $this->acceso->query($sql);


         //VAMOS A ELIMINARLO NORMAL CON PHP
        include '../../../Servidor/conexion.php';
        $sql2="DELETE FROM solicitud_sistema WHERE id ='$id'";
       $resultado2=$mysqli ->query($sql2);
    }
    function eliminar($id){
        $sql="DELETE FROM solicitud_sistema where id='$id'";
        $resultado = $this->acceso->query($sql);
    }
    

}