<?php
include_once 'conexion.php';
class Laboratorio{
    var $laboratorios;
    public function __construct(){
        $this->acceso = Conexion::conectar();
    }
    function mostrar(){ ///voy hacerlo solo que muestre
        $sql="SELECT * FROM sistema_validado_supervisor"; //cambie el nombre de la tabla
        $resultado = $this->acceso->query($sql);
        $this->laboratorios = $resultado->fetch_all(MYSQLI_ASSOC);
        return $this->laboratorios;
    }
 // voy a cambiar el update por un insert into
    function editar($id,$nombre){
        //$sql="UPDATE sistema_validado_supervisor SET nombre='$nombre',segundonombre='$segundonombre',primerapellido='$primerapellido',segundoapellido='$segundoapellido',observaciones_supervisor='$observaciones_supervisor' where id='$id'";
        $sql="INSERT INTO sistema_validado_admin (id,nombre) VALUES ($id,'$nombre')";
        $resultado = $this->acceso->query($sql);
    }
    function eliminar($id){
        $sql="DELETE FROM sistema_validado_supervisor where id='$id'";
        $resultado = $this->acceso->query($sql);
    }
    

}