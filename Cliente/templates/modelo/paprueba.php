<?php
//AQUI VA LA GESTION DE PAZ Y SALVOS APROBADOS PARA CAMBIAR EL ESTADO O PERMISOS Y "FECHAFINALCONTRATO"
include_once 'conexion.php';
class Laboratorio{
    var $laboratorios;
    public function __construct(){
        $this->acceso = Conexion::conectar();
    }
    function mostrar(){ ///voy hacerlo solo que muestre
        $sql="SELECT pazysalvo_aprobar.nombre,pazysalvo_aprobar.segundonombre,pazysalvo_aprobar.primerapellido,pazysalvo_aprobar.segundoapellido,pazysalvo_aprobar.cedula,sistema_validado_admin.tiposolicitud,sistema_validado_admin.aplicativo,usuarios_registrados.fechafinalcontrato,pazysalvo_aprobar.revocar_permisos,pazysalvo_aprobar.rfid from pazysalvo_aprobar
        INNER JOIN sistema_validado_admin ON pazysalvo_aprobar.cedula=sistema_validado_admin.cedula
        INNER JOIN usuarios_registrados ON sistema_validado_admin.cedula=usuarios_registrados.cedula;";
      
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