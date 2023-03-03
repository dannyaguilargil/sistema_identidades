<?php
include_once 'conexion.php';
class Laboratorio{
    var $laboratorios;
    public function __construct(){
        $this->acceso = Conexion::conectar();
    }
    function mostrar(){ ///voy hacerlo solo que muestre
        $sql="SELECT * FROM usuarios_registrados"; //cambie el nombre de la tabla
        $resultado = $this->acceso->query($sql);
        $this->laboratorios = $resultado->fetch_all(MYSQLI_ASSOC);
        return $this->laboratorios;
    }

    function editar($cedula,$nombre,$segundonombre){
        $sql="UPDATE usuarios_registrados SET nombre='$nombre',segundonombre='$segundonombre' where cedula='$cedula'";
        $resultado = $this->acceso->query($sql);
    }
    function eliminar($cedula){
        $sql="DELETE FROM usuarios_registrados where cedula='$cedula'";
        $resultado = $this->acceso->query($sql);
    }
    

}