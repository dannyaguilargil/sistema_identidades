<?php
session_start();

?>


<!DOCTYPE html>
<!--SOLICITUD_USUARIO A LA BASE DE DATOS-->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/solicitud_usuario.css">
    <link rel="icon" href="imgs/logoimsaludrecortado.ico">
    <title>Solicitar sistema</title>
</head>
<body>
  
    <header class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="container-fluid">
              <a class="navbar-brand " href="login.html">Sistemas</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="repuestos.html">Mi perfil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pazysalvo.html" disabled>Paz y salvo</a>
                  </li>
                </ul>
              </div>
            

            


              <div class="user">
                <?php $tomador=$_SESSION['nombre']?>
                Bienvenido <?php echo $_SESSION['nombre']; ?>
                <?//php echo $tomador; ?>
              </div>

          
              <div class="form-check form-switch">
                <label class="form-check-label" for="flexSwitchCheckChecked">Modo oscuro</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"> 
               </div>
            
            <a class="btn btn-light fas fa-user" href="../"></a>
            </div>
          
          </nav>
         
                    
    </header>

    <div class="imagen">
        <img  src="../imgs/logoimsaludrecortado.png"  alt="" style="width: 200px; text-align: center;">
    </div>

<div class="centrar">
        <div class="centrar1 col-sm-10 col-md-10 col-lg-10 col-xl-10">
            <div class="container form-control form-control" >
            <h5 class="centrar">Solicitud de sistemas</h5>


            <form action="../../Servidor/registrar_solicitud_sistema.php" method="POST">


                <!--
                  CONSULTAS PARA EL FORMULARIO 
                  $resultado = $conn->query($sql);
                  $num_rows = $resultado->num_rows;


                  -->
                <?php include '../../Servidor/conexion.php'; 
                //CODIGO PHP DE CONSULTAS
                //PRIMERO HAGO LA VALIDACION CON LA CEDULA
                $consulta="SELECT nombre from solicitud_usuario;";
                $resultado=mysqli_query($mysqli,$consulta);
                        if($resultado){ while($row = $resultado->fetch_array()){
                            $nombrer = $row['nombre'];
                          
                           
                           
                           
                           
                        
                            ?> <input type="text" name="nombre" id="nombre" class="emerge" value="<?php echo $nombrer;?>">


<?php
                          }
                    
                        } 
                ?>
                    
          


                <div class="row">
                <div class="col">
                <label for="nombre" class="emerge">Nombre completo:</label> <br>
                <input type="text" name="nombre" id="nombre" class="emerge" value="<?php echo $nombrer?>">
                </div>
                
             

                <div class="col">
                <button class="btn btn-success" onclick="envio();">Solicitar</button>
                </div>

            </form>



          </div>
          </div>
        </div>
</div>


     <script>
      function envio(){
        alert("ENVIO EXITOSO");
      }
     
     </script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>