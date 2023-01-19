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
                    <a class="nav-link" aria-current="page" href="perfil.php">Mi perfil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pazysalvo.php" disabled>Paz y salvo</a>
                  </li>
                </ul>
              </div>
            

            


              <div class="user">
                <?php $tomador=$_SESSION['nombre']?>
                <!-- ANIMACION DEL TEXTO-->
                <span class="typed"></span>  <?php echo $_SESSION['nombre'];?>
                <?//php echo $tomador; ?>
              </div>

          

              <!--ANTIGUO EJEMPLO DE MODO OSCURO -->
              <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch"  id="checkbox" onclick="setDarkMode();">
              <label class="form-check-label" for="checkbox"></label>
                 
               </div>
               



       
            <a class="btn btn-light fas fa-sign-out-alt" href="../../Servidor/logout.php"></a>
            </div>
          
          </nav>
         
                    
    </header>

    <div class="imagen">
    <img  src="../imgs/logocompleto.png"  alt="" style="width: 130px; text-align: center;height: 50px">
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
                $consulta="SELECT nombre,cedula,cargo,email,supervisor from usuarios_registrados WHERE nombre = '$tomador';";
                $resultado=mysqli_query($mysqli,$consulta);
                        if($resultado){ while($row = $resultado->fetch_array()){
                            $nombrer = $row['nombre'];
                            $cedular = $row['cedula'];
                            $cargor = $row['cargo'];
                            $emair = $row['email'];
                            $supervisorr = $row['supervisor'];
              
                          }
                    
                        } 
                ?>

                <!-- SEGUNDA CONSULTA DE PHP SOLO PARA TRERME LA FECHA FINAL DE CONTRATO -->








                <fieldset><b>Informacion general del colaborador</b></fieldset> 
                <div class="row">
                <div class="col">
                <label for="nombre" class="emerge">Nombre completo:</label> <br>
                <input type="text" name="nombre" id="nombre" class="emerge" value="<?php echo $nombrer?>">
                </div>
                
                <div class="col">
                <label for="" class="emerge">Tipo de documento:</label> <br>
                <select name="tipodocumento" id="tipodocumento" class="emerge">
                  <option value="CC" class="emerge" selected>CC</option>
                  <option value="CE" class="emerge">CE</option>
                  <option value="PASAPORTE" class="emerge">PASAPORTE</option>
                  <option value="RESIDENCIA" class="emerge">RESIDENCIA</option>
                </select>
                </div>



                <div class="col">
                <label for="cedula" class="emerge">Cedula:</label> <br>
                <input type="number" name="cedula" id="cedula" class="emerge" value="<?php echo $cedular?>"> 
                </div>
                </div>
            
                <div class="row">
                <div class="col">
                <label for="lugarexpedicion" class="emerge">Lugar  de expedicion:</label> <br>
                <input type="text" name="lugarexpedicion" id="lugarexpedicion" class="emerge" required>
                </div>

                <div class="col">
                <label for="sexo" class="emerge">Sexo:</label> <br>
                <select name="sexo" id="sexo" class="emerge">
                  <option value="M" class="emerge">M</option>
                  <option value="F" selected class="emerge">F</option>
                </select> 
                </div>

                <div class="col">
                <label for="telefono" class="emerge">Telefono fijo:</label> <br>
                <input type="text" name="telefono" id="telefono" class="emerge" required> 
                </div>
                </div>

                <div class="row">
                <div class="col">
                <label for="celular" class="emerge"> Celular:</label><br>
                <input type="text" name="celular" id="celular" class="emerge" required>
                </div>

                <div class="col">
                <label for="direccion" class="emerge">Direccion:</label> <br>
                <input type="text" id="direccion" name="direccion" class="emerge" required>
                </div>

                <div class="col">
                <label for="cargo" class="emerge">Cargo:</label> <br>
                <input type="text" name="cargo" id="cargo" class="emerge" value="<?php echo $cargor ?>">  
                </div>
                </div>

                <div class="row">
                <div class="col">
                <label for="supervisor" class="emerge">Supervisor:</label> <br>
                <input type="text" name="supervisor" id="supervisor" class="emerge" value="<?php echo $supervisorr?>">
                </div>

                <div class="col">
                <label for="correo" class="emerge">Correo:</label> <br>
                <input type="email" name="correo" id="correo" class="emerge" value="<?php echo $emair?>"> 
                </div>

                <div class="col">
                <label for="ubicacion_laboral" class="emerge">Ubicacion laboral:</label><br>
                <input type="text" name="ubicacion_laboral" id="ubicacion_laboral" class="emerge"> 
                </div>
               </div>
                
             
                <hr>
                <h6><b>Sistema de informacion requerido</b></h6> 
                <div class="row">
                <div class="col">
                <label for="tiposolicitud" class="emerge">Tipo de solicitud</label> <br>
                <select name="tiposolicitud" id="tiposolicitud" class="emerge">
                  <option value="CREAR" class="emerge">CREAR</option>
                  <option value="ACTUALIZAR" selected class="emerge">ACTUALIZAR</option>
                  <option value="ELIMINAR" class="emerge">ELIMINAR</option>
                  <option value="CONSULTAS" class="emerge">CONSULTAS</option>
                  <option value="TODOS" class="emerge">TODO LOS ANTERIORES</option>
                </select>
                </div>

                <div class="col">
                <label for="">Aplicativo</label> <br>
                <select name="aplicativo" id="aplicativo" class="emerge">
                  <option value="ALDEAMO SMS" class="emerge">ALDEAMO SMS</option>
                  <option value="ALMERA" class="emerge">ALMERA</option>
                  <option value="EMAIL" class="emerge">EMAIL</option>
                  <option value="KUBAPP" class="emerge" selected>KUBAPP</option>
                  <option value="HIKCENTRAL" class="emerge">HIKCENTRAL</option>
                  <option value="NUBE" class="emerge">NUBE</option>
                  <option value="ORTHANC" class="emerge">ORTHANC</option>
                  <option value="MESA DE AYUDA" class="emerge">MESA DE AYUDA</option>
                  <option value="AULA VIRTUAL" class="emerge">AULA VIRTUAL</option>
                  <option value="TNS" class="emerge">TNS</option>
                  <option value="KUBAPP" class="emerge">OTRO</option>
                </select> 
                 </div>
               
                <div class="col">
                <label for="observaciones" class="emerge">Observaciones</label> <br>
                <input type="text" name="observaciones" id="observaciones" class="obs emerge"> 
                </div>

                <br> <br> <br>
                <div class="row">
                <div class="col">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Acepto tratamiento de datos
                    </label>
                  </div>
                </div>

                <div class="col">
                <button class="btn btn-success" onclick="envio();">Solicitar</button>
                </div>


                <div class="col">
                
                </div>
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


      <script>
        //setDarkMode
        console.log("se ejecuto script")
        if(localStorage.getItem('theme') == 'dark'){
          setDarkMode();

            if(document.getElementById('checkbox').checked){
              localStorage.setItem('checkbox', true)
            }
        }


        function setDarkMode(){
          console.log("se ejecuto script 2")
          let isDark = document.body.classList.toggle('darkmode');


          if(isDark){
            setDarkMode.checked = true;
            localStorage.setItem('theme', 'dark');
            document.getElementById('checkbox').setAttribute('checked', 'checked');
          }
          else{
            setDarkMode.checked = true;
            localStorage.removeItem('theme', 'dark');
          }
        }
      </script>

      <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
      <script src="../js/main.js"></script>
      <script src="../js/repetirdiv.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>