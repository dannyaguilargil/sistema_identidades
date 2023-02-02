<?php
class Conexion{
    public static function conectar(){
        $conexion = new mysqli('localhost','danny','danny','sistema_nuevo'); //cambie el nombre de la bd
        $conexion->set_charset('utf8');
        return $conexion;
    }
}