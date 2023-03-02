<?php
//QUEDA PENDIENTE LA GESTION DEL ADMINISTRADOR
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
 // agregare cargo y observaciones
    function editar($id,$nombre,$segundonombre,$primerapellido,$segundoapellido,$tipodocumento,$lugarexpedicion,$cedula,$aplicativo,$tiposolicitud,$cargo,$observaciones){
        //$sql="UPDATE sistema_validado_supervisor SET nombre='$nombre',segundonombre='$segundonombre',primerapellido='$primerapellido',segundoapellido='$segundoapellido',observaciones_supervisor='$observaciones_supervisor' where id='$id'";
        $sql="INSERT INTO sistema_validado_admin (nombre,segundonombre,primerapellido,segundoapellido,tipodocumento,lugarexpedicion,cedula,aplicativo,tiposolicitud,cargo,observaciones) VALUES ('$nombre','$segundonombre','$primerapellido','$segundoapellido','$tipodocumento','$lugarexpedicion',$cedula,'$aplicativo','$tiposolicitud','$cargo','$observaciones')";
        $resultado = $this->acceso->query($sql);

            //VAMOS A ELIMINARLO NORMAL CON PHP
        //    include '../../../Servidor/conexion.php';
        //    $sql2="DELETE FROM sistema_validado_supervisor WHERE id ='$id'";
        //    $resultado2=$mysqli ->query($sql2);
        $sql="DELETE FROM sistema_validado_supervisor where id='$id'";
        $resultado = $this->acceso->query($sql);

    }
    function eliminar($id){
        $sql="DELETE FROM sistema_validado_supervisor where id='$id'";
        $resultado = $this->acceso->query($sql);
    }
    

}