<?php
include_once 'conexion.php';
class Laboratorio{
    var $laboratorios;
    public function __construct(){
        $this->acceso = Conexion::conectar();
    }
    function mostrar(){ ///voy hacerlo solo que muestre
        $sql="SELECT * FROM solicitud_usuario"; //cambie el nombre de la tabla
        $resultado = $this->acceso->query($sql);
        $this->laboratorios = $resultado->fetch_all(MYSQLI_ASSOC);
        return $this->laboratorios;
    }

    //EDITAR QUE ES INSERTAR
    function editar($nombre,$segundonombre,$primerapellido,$segundoapellido,$tipodocumento,$cedula,$supervisor,$email,$cargo,$rol){
        //function editar($nombre,$segundonombre){
        //CAMBIAR EL UPDATE POR UN INSERT INTO
        $sql="INSERT INTO usuarios_registrados (nombre,segundonombre,primerapellido,segundoapellido,tipodocumento,cedula,supervisor,email,cargo,password,rol) VALUES ('$nombre','$segundonombre','$primerapellido','$segundoapellido','$tipodocumento',$cedula,'$supervisor','$email','$cargo',cedula,'$rol')";
        $resultado = $this->acceso->query($sql);

        //VAMOS A ELIMINARLO NORMAL CON PHP
        include '../../../Servidor/conexion.php';
        $sql="DELETE FROM solicitud_usuario WHERE cedula = $cedula;";
        $resultado=$mysqli ->query($sql);


    }
    function eliminar($cedula){
        $sql="DELETE FROM solicitud_usuario where cedula='$cedula'";
        $resultado = $this->acceso->query($sql);
    }
    

}