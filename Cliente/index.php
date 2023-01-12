<?php
session_start();
include '../Servidor/conexion.php';
if(isset($_POST['login'])){
    $nombre = trim($_POST['nombre']);
    $password = trim($_POST['password']); // trim elimina espacios en blancos

    $select = mysqli_query($mysqli, "SELECT nombre,password,rol FROM usuarios_registrados WHERE nombre = '$nombre' AND password = '$password'");
    $num_row = mysqli_num_rows($select);
    $row = mysqli_fetch_array($select);
    
        

    if($num_row == 1){
        $_SESSION['nombre']=$row['nombre'];
        $_SESSION['rol']=$row['rol'];
        //header("Location: index2.php");


        if (isset($_SESSION['rol'])){

            switch ($_SESSION['rol']) {
                
                case "":		
                header("Location: templates/sistemas_solicitud_usuario.php");
                break;
        
                case "SUPERVISOR":		
                header("Location: templates/sistemas_supervisor.php");
                break;
                
                case "ADMINISTRADOR":		
                header("Location: templates/sistemas_admin_pendientes.php");
                break;
                
                case "ACCESO":		
                header("Location: templates/pazysalvo_acceso.php");
                break;

            } 

            }else{

                //HACE FALTA HACER LA VALIDACION Y NOTIFICAR SI EL USUARIO ESTA MAL Y SI NO ES ADMIN
                // SACARLO DE LOS PERMISOS DEL FORMULARIO
                echo '<script type ="text/JavaScript">';
                echo 'alert("ACCESO DENEGADO")';
                echo '</script>';
                
            }
 
    
}           
}




/*PHP VIEJO
 if(isset($_POST['login'])){
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    $select = mysqli_query($mysqli, "SELECT * FROM usuarios_registrados WHERE nombre = '$nombre' AND password = '$password'");
    $row = mysqli_fetch_array($select);
    

if(is_array($row)){
    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['password'] = $row['password'];

}else{
    echo '<script type ="text/JavaScript">';
    echo 'alert("ACCESO DENEGADO")';
    echo '</script>';
    
}if(isset($_SESSION["nombre"])){
    header("location:templates/sistemas_solicitud_usuario.php");
}
}

*/

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/index2.css">
    <link rel="icon" href="imgs/logoimsaludrecortado.ico">
    <title>Iniciar Sesion</title>
</head>
<body">
 

<div class="centrar">
       
            <div class="imagen">
            <img  src="imgs/logocompleto.png"  alt="" style="width: 170px; text-align: center;height: 70px">
            </div> 
            <!-- <h3 class="text-center">Iniciar sesion</h3> -->
                <br> 
            <div class="textoI">
            <form action="index.php" method="post">
            <label class="TT" for="nombre">Usuario</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required><br>
            <label class="TT" form="password">Contraseña</label>
            <input type="password" class="form-control" name="password" id="password" required><br>
            



            
            <div class="boton">
            <input type="submit" class="text-center btn btn-success" name="login" value="login">
            </div> <br>
            <p><a  class="TT1" href="templates/login_acceso.php" id="" style="color: grey;">Solicitar usuario</a></p>
            </form>
            
          
          </div>
        </div>
</div>



<div class="izquierdo">
    
    <img class="izquierdoimg" src="imgs/izquierdo.gif" alt="">
</div>


<div class="escudo">
    
    <img class="escudoverde" src="imgs/escudo.gif" alt="">
</div>





<footer >
        
<div class="container ultimo">

<img class="fondo" src="imgs/footer.png" alt="" srcset="">

</div>
            
        
</footer>
</body>
</html>

