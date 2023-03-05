<?php
//AQUI VA LO SQL DE PAZ Y SALVOS
include_once 'conexion.php';
class Laboratorio{
    var $laboratorios;
    public function __construct(){
        $this->acceso = Conexion::conectar();
    }
    function mostrar(){ ///voy hacerlo solo que muestre
        $sql="SELECT * FROM pazysalvo_solicitud"; //cambie el nombre de la tabla
        $resultado = $this->acceso->query($sql);
        $this->laboratorios = $resultado->fetch_all(MYSQLI_ASSOC);
        return $this->laboratorios;
    }
 // voy a actualizar la aprobacion del paz y salvo
    function editar($cedula,$rfid,$equipos){
        //$sql="UPDATE sistema_validado_supervisor SET nombre='$nombre',segundonombre='$segundonombre',primerapellido='$primerapellido',segundoapellido='$segundoapellido',observaciones_supervisor='$observaciones_supervisor' where id='$id'";
        $sql="UPDATE pazysalvo_aprobar SET rfid='$rfid',equipos='$equipos',revocar_permisos='SI' WHERE cedula = $cedula;";        $resultado = $this->acceso->query($sql);
        $resultado = $this->acceso->query($sql);

        $sql2="DELETE FROM pazysalvo_solicitud where cedula='$cedula'";
        $resultado2 = $this->acceso->query($sql2);
        /*

        $sql="UPDATE pazysalvo_aprobar SET rfid='$rfid',equipos='$equipos',revocar_permisos='SI' WHERE cedula = $cedula;";
        $resultado=$mysqli ->query($sql);

        */

    }//quiero eliminar el paz y salvo aprobar 
    function eliminar($cedula){
        $sql="DELETE FROM pazysalvo_solicitud where cedula='$cedula'";
        $resultado = $this->acceso->query($sql);

        $sql="DELETE FROM pazysalvo_aprobar where cedula='$cedula'";
        $resultado = $this->acceso->query($sql);


    }
    

}