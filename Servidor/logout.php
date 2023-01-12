<?php

session_start();
if(session_destroy()){
    header("Location: ../Cliente/index.php");
   
}
 //no cierra la sesion
?>